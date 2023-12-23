<div class="card toggleModal" data-task-id="{{$task->id}}">
    <div class="card-body">
        <div class="dropdown d-inline-block float-right">
            <a class="nav-link dropdown-toggle mr-n2 mt-n2" id="drop" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fas fa-ellipsis-v text-muted"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
            </div>
        </div><!--end dropdown-->
        <i class="mdi mdi-circle-outline d-block mt-n2 font-18" style="color: #{{$task->color_mark}}"></i>
        <h5 class="my-1">{{ $task->title }} + {{ $task->priority }}</h5>
        <p class="text-muted mb-2">{{ $task->label }}</p>
        <div class="row justify-content-center">
            <div class="col-6 align-self-center">
                <ul class="list-inline mb-0">
                    @if(!$task->checkLists->isEmpty())                                                                  
                        <li class="list-item d-inline-block mr-2">
                            <a class="" href="#">
                                <i class="mdi mdi-format-list-bulleted text-muted"></i>
                                <span class="text-muted font-weight-bold">{{$task->checkLists->where("completed", true)->count()}}/{{ $task->checkLists->count() }}</span>
                            </a>
                        </li>
                    @endif
                    @if(isset($task->comments) && !$task->comments->isEmpty())   
                        <li class="list-item d-inline-block">
                            <a class="" href="#">
                                <i class="mdi mdi-comment-outline text-muted"></i>
                                <span class="text-muted font-weight-bold">{{ $task->comments->count() }}</span>
                            </a>                                                                               
                        </li>
                    @endif
                </ul>
            </div><!--end col-->
            <div class="col-6 align-self-center">
                <a class="float-right" href="#">
                    <img src="../assets/images/users/user-1.jpg" alt="user" class="thumb-xs rounded-circle">
                </a>
                <a class="float-right" href="#">
                    <img src="../assets/images/users/user-9.jpg" alt="user" class="thumb-xs rounded-circle">
                </a>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end card-body-->
</div><!--end card-->