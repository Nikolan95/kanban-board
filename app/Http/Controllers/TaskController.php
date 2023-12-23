<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use App\Models\Task;
use App\Models\TaskColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function index()
    {
        $boardsAndTasks = TaskColumn::with('tasks')->with(['tasks.comments', 'tasks.checkLists', 'tasks.createdUser', 'tasks.assingedUser'])->get();

        return view('dashboard')->with('boardsAndTasks', $boardsAndTasks);
    }

    public function getTask($id)
    {
        $task = Task::where('id', $id)->with(['checkLists', 'comments', 'comments.user'])->first();

        return response()->json(['success' => true, 'message' => 'Data received successfully', 'task' => $task]);
    }

    public function moveTasks(Request $request)
    {
        $request->validate([
            'taksId' => 'required',
            'oldColumnId' => 'required',
            'columnId' => 'required',
            'siblingCardId' => 'nullable'
        ]);

        $jsonData = $request->json()->all();

        $taskId = $jsonData['taksId'];
        $columnId = $jsonData['columnId'];
        $oldColumnId = $jsonData['oldColumnId'];
        $siblingCardId = $jsonData['siblingCardId'];

      
        $task = Task::where('id', $taskId)->first();
        if($task){
            if(is_null($siblingCardId)){
                $currentHighestPriority = Task::where('task_column_id', $columnId)->get()->max('priority');
                if($columnId == $oldColumnId){
                    $task->update([
                        'task_column_id' => $columnId,
                        'priority' => $currentHighestPriority
                    ]);
                }
                else{
                    $task->update([
                        'task_column_id' => $columnId,
                        'priority' => $currentHighestPriority + 1
                    ]);
                }   
                $oldColumnTasks = Task::where('task_column_id', $oldColumnId)->where('id', '!=', $taskId)->orderBy('priority', 'asc')->get();
                $newColumnTasks = Task::where('task_column_id', $columnId)->orderBy('priority', 'asc')->get();
                $counter = 0;
                foreach($oldColumnTasks as $oldColumnTask){
                    $oldColumnTask->priority = $counter;
                    $oldColumnTask->save();
                    $counter++;
                }
            }
            else{
                $siblingPriotiry = Task::where('id', $siblingCardId)->pluck('priority')->first();

                $task->update([
                    'task_column_id' => $columnId,
                    'priority' => $siblingPriotiry
                ]);

                $newColumnTasks = Task::where('task_column_id', $columnId)->orderBy('priority', 'asc')->get();
            
                if($oldColumnId != $columnId){
                    $counter = 0;
                    foreach($newColumnTasks as $newColumnTask){
                        if($newColumnTask->id == $task->id){
                            $counter++;
                            continue;
                        }
                        if($newColumnTask->priority == $task->priority && $oldColumnId > $columnId){
                            $counter++;   
                            $newColumnTask->priority = $counter;
                            $newColumnTask->save(); 
                            continue;
                        }
                        $newColumnTask->priority = $counter;
                        $newColumnTask->save();
                        $counter++;
                        
                    }
                }
                else{
                    $tasksHp = Task::where('task_column_id', $columnId)->where('id', '!=', $taskId)->where('priority', '>=', $siblingPriotiry)->orderBy('priority', 'asc')->get();
                    $tasksLp = Task::where('task_column_id', $columnId)->where('id', '!=', $taskId)->where('priority', '<=', $siblingPriotiry)->orderBy('priority', 'asc')->get();
                    $lpCounter = 0;
                    foreach($tasksLp as $key => $task){
                        $task->priority = $lpCounter;
                        $task->save();
                        $lpCounter++;   
                    }
                    $hpCounter = $siblingPriotiry + 1;
                    foreach($tasksHp as $task){
                        $task->priority = $hpCounter;
                        $task->save();
                        $hpCounter++;
                    }
                }

                if($oldColumnId != $columnId){
                    $oldColumnTasks = Task::where('task_column_id', $oldColumnId)->where('id', '!=', $taskId)->orderBy('priority', 'asc')->get();
                    $counter = 0;
                    foreach($oldColumnTasks as $oldColumnTask){
                        $oldColumnTask->priority = $counter;
                        $oldColumnTask->save();
                        $counter++;
                    }
                }

            }
        }

        return response()->json(['success' => true, 'message' => 'Data received successfully']);
    }

    public function store (Request $request)
    {
        try {
            $data = $request->validate([
                'task_column_id' => 'required|exists:task_column,id',
                'title' => 'required|min:3',
                'label' => 'required|min:3',
                'description' => 'required|min:3',
                'color_mark' => 'required|string',
                'checklist' => 'nullable|array',
                'checklist.*' => 'required'
            ]);

            $currentHighestPriority = Task::where('task_column_id', $data['task_column_id'])->get()->max('priority');
            $task  = Task::create([
                'task_column_id' => $data['task_column_id'],
                'created_user_id' => Auth::user()->id,
                'color_mark' => str_replace("#", "",$data['color_mark']),
                'title' => $data['title'],
                'label' => $data['label'],
                'description' => $data['description'],
                'priority' => $currentHighestPriority + 1
            ]);

            $checkLists = [];
            if(isset($data['checklist']) && !empty($data['checklist'])){
                foreach($data['checklist'] as $checklist){
                    $list = CheckList::create([
                        'task_id' => $task->id,
                        'title' => $checklist
                    ]);
                    $checkLists[] = $list;
                }
            }

            return response()->json([
                'html' => view('partials.card', compact('task'))->render(),
                'task' => $task,
                'boardId' => $data['task_column_id']
            ]);
        }
        catch(ValidationException $e){
            return response()->json(['errors' => $e->errors()], 422);
        }

    }
}
