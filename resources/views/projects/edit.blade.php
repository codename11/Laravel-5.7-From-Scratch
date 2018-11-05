@extends("layout")

@section("content")
    <h1 class="title">Edit Project</h1>

<form method="POST" action="/projects/{{$project->id}}">
        {{method_field("PUT")}}
        {{csrf_field()}}

        <div class="form-group">
            <label class="label" for="title">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Project title" value="{{$project->title}}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" placeholder="Project description" required>{{$project->description}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Project</button>
           
    </form>
    <!--Edit.blade-u(ovom dokumentu-fajlu) 
    se prosledjuje $project parametar.
    Iz njega se vadi ajdi(id) i koristi se 
    u action atributu. Dugme za delete 
    je deo zasebne forme na istoj strani, 
    te i njegova forma ima prisupu toj promenljivoj.
    Kod njega se doduse radi spoofing za delete.-->
    <form method="POST" action="/projects/{{$project->id}}" style="margin-top: 10px;">
        {{method_field("DELETE")}}
        {{csrf_field()}}
        
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Delete Project</button>
        </div>
    </form>

@endsection