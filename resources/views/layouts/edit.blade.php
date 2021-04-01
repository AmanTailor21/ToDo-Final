<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <input type="button" class="btn btn-info" value="ADD TASK">
</div>
<div class="card m-3 shadow-sm" style="height: 700px;">
    <div class="row">
        <div class="col-lg-6" style="height:700px;overflow-y: scroll;">


                <div class="row">
                    <div class="col-lg-1 m-3">
                        <input type="checkbox">
                    </div>
                    <div class="col-lg-8">
                        <b><a  style="color: #1a202c;"></a></b>
                        <p></p>
                    </div>
                    <div class="col-lg-2 m-3">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                </div>
                <hr>


            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <b>Hello Title</b>
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-1 m-3">
                    <input type="checkbox">
                </div>
                <div class="col-lg-8">
                    <p>Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.</p>
                </div>
                <div class="col-lg-2 m-3">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-lg-6">
            <div class="container-fluid shadow-sm">
                <div class="row">
                    <div class="col m-3">
                        <input type="checkbox">
                        <label> Mark as Done</label>
                    </div>
                </div>
            </div>
            <form class="m-3" method="post" action="/store">
                @csrf
                @method("put")
                <div class="form-group">
                    <label>Add Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    @error('title') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" placeholder="Start Date">
                        @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col">
                        <label>Due Date</label>
                        <input type="date" name="due_date" class="form-control" placeholder="Due Date">
                        @error('due_date') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Add Notes</label>
                    <textarea placeholder="Notes..." name="notes" class="form-control"></textarea>
                    @error('notes') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div>
                    <input type="submit" class="btn btn-info" value="SAVE">
                </div>
            </form>
            {{session('msg')}}
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

