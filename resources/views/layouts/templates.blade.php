<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset("/js/jquery.js") }}" type="text/javascript"></script>
    <script src="{{ asset("/js/style.js") }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"
            type="text/javascript"></script>
    <title>ToDo</title>
</head>
<body>
<div class="container-fluid shadow-sm pb-1">
    <div class="row">
        <div class="col-lg-1  mt-3">
            <h3>ToDo</h3>
        </div>
        <div class="col-lg-11">
            <div class="form-group">
                <input type="text" class="form-control m-1 mt-3" placeholder="Search...">
            </div>
        </div>
    </div>
</div>
<div class="m-3">
    @if(isset($todos))
        <form action="/">
            <input type="submit" class="btn btn-info" value="ADD TASK">
        </form>
    @else
        <div class="p-4"></div>
    @endif
</div>
<div class="card m-3 shadow-sm" style="height: 700px;">
    <div class="row">
        <div class="col-lg-6" id="subDiv" style="height:700px;overflow-y: scroll;">

            @foreach($todo as $task)
                <div class="row m-3 border-bottom">
                    <div class="col-lg-1 m-3">
                        <input type="checkbox">
                    </div>
                    <div class="col-lg-8">

                        @if($task->mark == 1)
                            <b><strike><a href="/edit/{{$task->id}}"
                                          style="color: #1a202c;">{{$task->title}}</a></strike></b>
                            <p><strike>{{$task->notes}}</strike></p>
                        @else
                            <b><a href="/edit/{{$task->id}}"
                                  style="color: #1a202c;">{{$task->title}}</a></b>
                            <p>{{$task->notes}}</p>
                        @endif
                    </div>
                    <div class="col-lg-2 m-3">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-6">


            <form method="post" action="{{ $action }}">
                @csrf

                <div class="container-fluid shadow-sm">
                    <div class="row">
                        <div class="col m-3">
                            <input type="checkbox"
                                   name="mark" {{ (!empty($todos) &&  $todos["mark"] == 1) ? 'checked' : '' }}>
                            <label> Mark as Done</label>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <div class="form-group">
                        <label>Add Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title"
                               value="{{ (!empty($todos)) ? $todos["title"] : '' }}">
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" placeholder="Start Date"
                                   value="{{ (!empty($todos)) ? $todos["start_date"] : '' }}">
                            @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                            <label>Due Date</label>
                            <input type="date" name="due_date" class="form-control" placeholder="Due Date"
                                   value="{{ (!empty($todos)) ? $todos["due_date"] : '' }}">
                            @error('due_date') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Add Notes</label>
                        <textarea placeholder="Notes..." name="notes"
                                  class="form-control">{{ (!empty($todos)) ? $todos["notes"] : '' }}</textarea>
                        @error('notes') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div>
                        @if(isset($todos))
                            <input type="submit" class="btn btn-info" value="UPDATE TASK">
                        @else
                            <input type="submit" class="btn btn-info" value="SAVE">
                        @endif
                    </div>
                </div>
            </form>
            {{session('msg')}}
        </div>
    </div>
</div>


</body>
</html>
