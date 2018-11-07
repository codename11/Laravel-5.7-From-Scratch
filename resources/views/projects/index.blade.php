@extends("layout")

@section("title", "All Projects")

@section("content")
        
        <h1>Projects</h1>

        <ul class="list-group">
            @foreach($projects as $project)
                <li class="list-group-item">
                    <a style="text-decoration: none;" href="/projects/{{$project->id}}">{{$project->title}}</a>
                </li>
            @endforeach
        </ul>
        {{$projects->links()}}<!--Ovo je za paginaciju.-->
@endsection
