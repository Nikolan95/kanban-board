<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nikola's task board</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/plugins/dragula/dragula.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="projects/projects-index.html" class="logo">
                    <span>
                        <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="assets/images/logo.png" alt="logo-large" class="logo-lg">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="../assets/images/users/user-4.jpg" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->username }} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        <div class="page-wrapper">
            <!-- Left Sidenav -->
            <div class="left-sidenav">
                <div class="main-icon-menu">
                    <nav class="nav">
                        <a href="#MetricaProject" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Projects">
                            <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path class="svg-primary" d="M256 32C132.288 32 32 132.288 32 256s100.288 224 224 224 224-100.288 224-224S379.712 32 256 32zm135.765 359.765C355.5 428.028 307.285 448 256 448s-99.5-19.972-135.765-56.235C83.972 355.5 64 307.285 64 256s19.972-99.5 56.235-135.765C156.5 83.972 204.715 64 256 64s99.5 19.972 135.765 56.235C428.028 156.5 448 204.715 448 256s-19.972 99.5-56.235 135.765z"/>
                                <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"/>
                            </svg>
                        </a><!--end MetricaProject-->
                    </nav><!--end nav-->
                </div><!--end main-icon-menu-->

                <div class="main-menu-inner">
                    <div class="menu-body slimscroll">
                        <div id="MetricaProject" class="main-icon-menu-pane">
                            <div class="title-box">
                                <h6 class="menu-title">Projects</h6>        
                            </div>
                            <ul class="nav">
                                <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}"><i class="dripicons-view-thumb"></i>Dashboard</a></li>
                            </ul>
                        </div><!-- end  Project-->
                    </div><!--end menu-body-->
                </div><!-- end main-menu-inner-->
            </div>
            <!-- end left-sidenav-->

            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tasks</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Projects</a></li>
                                        <li class="breadcrumb-item active">tasks</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Tasks Board</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        @if(isset($boardsAndTasks) && !$boardsAndTasks->isEmpty())
                                            @php
                                                $counter = 1;
                                                $boardOrders = [];   
                                                $boardIds = [];
                                            @endphp
                                            @foreach($boardsAndTasks as $board)
                                                <div class="col-md-3">
                                                    <div class="bg-light p-4">
                                                        <div class="dropdown d-inline-block float-right mt-n2">
                                                            <a class="nav-link dropdown-toggle arrow-none" id="drop" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v font-18 text-muted"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop">
                                                                <a class="dropdown-item" href="#">Create Project</a>
                                                                <a class="dropdown-item" href="#">Open Project</a>
                                                                <a class="dropdown-item" href="#">Tasks Details</a>
                                                            </div>
                                                        </div>
                                                        <h4 class="header-title pb-1 mb-3 mt-0">{{ $board->column_name }}</h4>
                                                        @php
                                                            $counter++;
                                                            $boardOrders[] = $board->order;
                                                            $boardIds[] = $board->id;
                                                        @endphp
                                                        <div id="boardOder{{ $board->id }}" class="pb-1 kanban-container" data-id="{{ $board->id }}">
                                                            @if(!$board->tasks->isEmpty())
                                                                @foreach($board->tasks as $task)
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
                                                                    @php
                                                                        $counter ++;
                                                                    @endphp
                                                                @endforeach
                                                            @endif
                                                        </div><!--end project-list-left-->
                                                        <button type="button" class="btn btn-block btn-outline-info create-task" data-id="{{ $board->id }}" >Add Task</button>
                                                    </div><!--end /div-->
                                                </div><!--end col-->
                                            @endforeach
                                        @endif
                                    </div><!--end row-->                                
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->

                </div><!-- container -->
                @include('includes.modals')
                <footer class="footer text-center text-sm-left">
                    &copy; 2019 Metrica <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/dragula/dragula.js"></script>
        {{-- <script src="assets/pages/jquery.projects_kanabn.init.js"></script> --}}


        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            var iconTochange;
            let boardOrders = <?php echo json_encode($boardOrders, JSON_FORCE_OBJECT) ?>;
            let boardIds = <?php echo json_encode($boardIds, JSON_FORCE_OBJECT) ?>;
            var createModal = new bootstrap.Modal(document.getElementById('create-task-modal'));

            const elements = [];

            for (const key in boardIds) {
                const value = boardIds[key];
                const element = document.getElementById("boardOder" + value);
                elements.push(element);
            }
            
            dragula([document.getElementById("dragula-left"), 
            document.getElementById("dragula-right")]);
            var drake = dragula(elements);

            drake.on('drop', function (el, target, source, sibling) {

                var cardId = el.getAttribute('data-task-id');
                var columnId = target.getAttribute('data-id');
                var oldColumnId = source.getAttribute('data-id');

                let siblingCardId = null;
                if (sibling !== null) {  
                    siblingCardId = sibling.getAttribute('data-task-id');
                } 

                var xhr = new XMLHttpRequest();

                xhr.open('POST', '/move-task', true);

                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                         
                        } else {
                           
                        }
                    }
                };

                var data = {
                    taksId: cardId,
                    columnId: columnId,
                    oldColumnId: oldColumnId,
                    siblingCardId, siblingCardId
                };

                var jsonData = JSON.stringify(data);

                xhr.send(jsonData);
            });

      

            function updateModalContent(modal, task) {
                modal.querySelector("#modalTitle").textContent = task.title;
                modal.querySelector("#main-text").textContent = task.description;
                modal.querySelector("#color-label").style.color = "#"+task.color_mark;
                var checkListContainer = modal.querySelector("#checklists");
                var commentContainer = modal.querySelector("#comments");
                if (task.check_lists.length > 0) {
                    checkListContainer.innerHTML = '<hr><h5 class="modal-title mt-0">Taks Checklist</h5><br>';

                    task.check_lists.forEach(function(item) {

                        var newItem = document.createElement('div');

                        if(item.completed){
                            newItem.innerHTML = '<div class="form-check">'+
                            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>'+
                            '<label class="form-check-label" for="flexCheckDefault">'+
                            item.title +
                            '</label>'+
                            '</div>'
                        }
                        else{
                            newItem.innerHTML = '<div class="form-check">'+
                            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">'+
                            '<label class="form-check-label" for="flexCheckDefault">'+
                            item.title +
                            '</label>'+
                            '</div>'
                        }
                        

                        checkListContainer.appendChild(newItem);
                    });
                } else {
                    checkListContainer.innerHTML = '';
                }
                if (task.comments.length > 0){
                    commentContainer.innerHTML = '<hr><h5 class="modal-title mt-0">Comments</h5><br>';
                    task.comments.forEach(function(item) {

                        var newItem = document.createElement('div');

                        newItem.innerHTML = '<div class="media">'+
                        '<a class="">'+
                            '<img src="../assets/images/users/user-1.jpg" alt="user" class="rounded-circle thumb-md">'+
                        '</a>'+                                             
                        '<div class="media-body align-self-center ml-3">'+
                            '<p class="font-14 font-weight-bold mb-0">'+item.user.username+'</p>'+
                            '<p class="mb-0 font-12 text-muted">'+item.body+'</p>'+
                        '</div>'+
                    '</div><br>'
                        commentContainer.appendChild(newItem);
                    });
                }
                else{
                    commentContainer.innerHTML = '';
                }
            }

            document.addEventListener("DOMContentLoaded", function () {
                for (const key in boardIds) {
                    const value = boardIds[key];
                    const containerId = "boardOder" + value;
                    const container = document.getElementById(containerId);

                    if (container) {
                        container.addEventListener("dblclick", function (event) {
                            const card = event.target.closest(".card");
                            if (card) {
                                const cardId = card.getAttribute("data-task-id");
                                const modalId = "bigModal";
                                const myModal = new bootstrap.Modal(document.getElementById(modalId));

                                const xhr = new XMLHttpRequest();
                                xhr.open("GET", "/task/" + cardId, true);

                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                        const jsonData = JSON.parse(xhr.responseText);
                                        updateModalContent(myModal._element, jsonData.task);
                                        myModal.show();
                                    }
                                };

                                xhr.send();
                            }
                        });
                    }
                }
            });

            var boardButtons = document.querySelectorAll('.create-task');

            boardButtons.forEach(function (boardButton) {
                boardButton.addEventListener("click", function () {

                    var boardId = boardButton.getAttribute("data-id");
                    var modalId = "create-task-modal";
                    var myModal = new bootstrap.Modal(document.getElementById(modalId));
                    document.getElementById('create-check-lists').innerHTML = '';
                    document.getElementById('task-column-id').value = boardId;

                    myModal.show();
                    
                });
            });


            document.addEventListener('DOMContentLoaded', function() {
                var colorPicker = document.getElementById('task-color-mark');

                colorPicker.addEventListener('input', function() {
                    var selectedColor = colorPicker.value;
                    document.getElementById('task-color-mark-input').value = selectedColor;
                });
            });

            var modalBody = document.getElementById('create-check-lists');
            var addInputBtn = document.getElementById('addCheckList');
            var inputCounter = 1;

            addInputBtn.addEventListener('click', function () {

                var container = document.createElement('div');
                container.className = 'd-flex';

                // Create a new input element
                var newInput = document.createElement('input');
                var newInputError = document.createElement('small')
                newInput.type = 'text';
                newInput.className = 'form-control';
                newInput.id = 'check-list-value'+inputCounter;
                newInput.name = 'checklist['+inputCounter+']title'
                newInput.placeholder = 'Checklist text';
                newInputError.id = 'error-container-checklist.' + inputCounter;
                newInputError.className = 'text-danger';

                // Create a button to delete the input
                var deleteButton = document.createElement('button');
                deleteButton.type = 'button';
                deleteButton.className = 'btn btn-danger btn-sm ml-2'; // Adjusted styling
                deleteButton.innerHTML = 'Delete';
                deleteButton.addEventListener('click', function () {
                    // Remove the container (which includes the input and delete button)
                    modalBody.removeChild(container);
                });

                container.appendChild(newInput);
                container.appendChild(newInputError);
                container.appendChild(deleteButton);

                modalBody.appendChild(container);

                inputCounter++;
            });

            document.getElementById('create-task-form').addEventListener('submit', function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/store-task', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('boardOder'+response.boardId).innerHTML += response.html;
                        var closeButton = document.querySelector('#create-task-modal .close');
                        if (closeButton) {
                            closeButton.click();
                        }
                    } else {
                        var jsonObject = JSON.parse(xhr.responseText);
                        var errors = jsonObject.errors;
                        for (var errorType in errors) {
                            if (errors.hasOwnProperty(errorType)) {
                                var errorMessages = errors[errorType];

                                var errorContainer = document.getElementById('error-container-' + errorType);
                                if (errorContainer) {
                                    errorContainer.innerHTML = errorMessages.join('<br>');
                                }
                            }
                        }
                    }
                };

                xhr.onerror = function() {
                    console.error('Network error occurred');
                };

                xhr.send(formData);
            });

        

        </script>
        

    </body>
</html>