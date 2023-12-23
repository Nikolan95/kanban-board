<!-- sample modal content -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true" id="bigModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <i class="mdi mdi-circle-outline d-block mt-n2 font-18" style="color: #d63c3c; padding-top: 5px" id="color-label"></i>
                &nbsp;
                <h5 class="modal-title mt-0" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="main-text" id="main-text">

                </div>
                
                <div class="checklists" id="checklists" style="padding-top:20px !important">
                    
                </div>
                <div class="comments" id="comments">
                 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  


<!-- create task modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true" id="create-task-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalTitle">
                    Create new task
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ route('task.create') }}" method="POST" id="create-task-form">
                @csrf
                <div class="modal-body">
                    <div class="main-text">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="hidden" id="task-column-id" name="task_column_id"> 
                            <input type="text" class="form-control" id="task-title" name="title" placeholder="Enter task title">
                            <small id="error-container-title" class="text-danger">
                            </small>      
                        </div>

                        <div class="form-group">
                            <label for="label">Label</label>
                            <input type="text" class="form-control" id="task-label" name="label" placeholder="Enter task label">
                            <small id="error-container-label" class="text-danger">
                            </small>   
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="task-description" name="description" rows="3" placeholder="Describe your task"></textarea>
                            <small id="error-container-description" class="text-danger">
                            </small>   
                        </div>

                        <div class="form-group">
                            <label for="colorPicker">Color Picker</label>
                            <input type="color" class="form-control" id="task-color-mark">
                            <input type="hidden" id="task-color-mark-input" name="color_mark">
                            <small id="error-container-color" class="text-danger">
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary" id="addCheckList" data-toggle="modal" data-target="#myModal">
                        Add checklist field
                    </button>
                    <div class="checklists" id="create-check-lists" style="padding-top:20px !important">
                        
                    </div>
                    <div class="comments" id="comments">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitform" >Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  