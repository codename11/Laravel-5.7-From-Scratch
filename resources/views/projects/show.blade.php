@extends("layout")

@section("content")

    <h1 class="title">{{$project->title}}</h1>
    <div class="content">{{$project->description}}</div>
    <a href="/projects/{{$project->id}}/edit">Edit</a>

    @if($project->tasks->count())
        <div class="container">
            <ul class="list-group">
                @foreach($project->tasks as $task)
                    <li class="list-group-item">
                        <form method="POST" action="/tasks/{{$task->id}}">
                    <!--Je isto kao {{method_field("PUT")}}-->
                            @method("PUT")
                            {{ csrf_field() }}
                            <div class="form-group form-check">
                                <label class="form-check-label" for="completed" style="{{$task->completed ? "text-decoration:line-through" : ""}}">
                                    <input onChange="this.form.submit()" class="form-check-input" name="completed" type="checkbox" {{$task->completed ? "checked" : ""}}>
                                    {{$task->description}}
                                </label>
                            </div>
                            
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    {{--Adding new task--}}

    <form method="POST" action="/projects/{{$project->id}}/tasks">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="description">New Task</label>
            <input type="text"  class="form-control" name="description" required>
            <button type="submit" class="btn btn-success" style="margin-top: 10px">Submit</button>
        </div>
    </form>
    @if($errors->any()>0)
        <div class="alert alert-danger" style="margin-top: 10px;">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </div>
    @endif
    
    <br>
    <a href="/projects" class="btn btn-outline-info">
        &larr;Back
    </a>
@endsection