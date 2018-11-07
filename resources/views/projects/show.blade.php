@extends("layout")

@section("title", "An Project")

@section("content")

    <h1 class="title">{{$project->title}}</h1>
    <div class="content">{!!$project->description!!}</div>

    @if(!Auth::guest())
        @if(Auth::user()->id == $project->user_id)
            
                <a href="/projects/{{$project->id}}/edit" class="btn btn-info" style="margin-bottom: 10px;">Edit</a>
        
            @endif
    @endif

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
                                <label class="form-check-label" for="completed" style="{{$task->completed ? "text-decoration:line-through;" : ""}}">
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

    <!--show.blade-u(ovom dokumentu-fajlu) 
    se prosledjuje $project parametar.
    Iz njega se vadi ajdi(id) i koristi se 
    u action atributu. Dugme za delete 
    je deo zasebne forme na istoj strani, 
    te i njegova forma ima prisupu toj promenljivoj.
    Kod njega se doduse radi spoofing za delete.-->
    @if(!Auth::guest())
        @if(Auth::user()->id == $project->user_id)
            <form method="POST" action="/projects/{{$project->id}}">
                {{method_field("DELETE")}}
                {{csrf_field()}}
                
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete Project</button>
                </div>
            </form>
        @endif
    @endif
    
    @if(!Auth::guest())
        @if(Auth::user()->id == $project->user_id)
        
        {{--Adding new task--}}
        <form method="POST" action="/projects/{{$project->id}}/tasks">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="description">New Task</label>
                <input type="text"  class="form-control" name="description" required>
                <button type="submit" class="btn btn-success" style="margin-top: 10px">Submit</button>
            </div>
        </form>

    @endif
    @endif

    @if($errors->any()>0)
        <div class="alert alert-danger" style="margin-top: 10px;">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </div>
    @endif
    
    <a href="/projects" class="btn btn-outline-info">
        &larr;Back
    </a>
@endsection