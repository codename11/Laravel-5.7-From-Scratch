@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/projects/create" class="btn btn-primary">Create Project</a>
                    <h3>Your blog posts</h3>
                    <!--Kreiranje tabele u dasboard-u 
                        gde se prikazuje postovi
                    trenutnog korisnika sa edit i delete dugmicima.-->                 
                    @if(count($projects) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->title}}</td>
                                    <td><a href="/projects/{{$project->id}}/edit" class="btn btn-info">Edit</a></td>
                                    <td>
                                        <!--Method 'spoofing' jer nema metoda 'delete'.-->
                                        {!!Form::open(["action" => ["ProjectsController@destroy", $project->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                        <!--Jednostruke viticaste zagrade za close.-->
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else 
                            <p>You have no posts</p>

                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
