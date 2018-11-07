@extends("layout")

@section("title", "Create Project")

@section("content")
        
    <h1>Create a new Project</h1>
    
    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <?php /*Pregleda zasebno za title i description 
        da li ima gresaka. Ukoliko ih ima, dodeljume im klasu(crveni border).*/
            $errTitle = $errors->has('title') ? 'border-danger' : '';
            $errDesc = $errors->has('description') ? 'border-danger' : '';
        ?>
        <!-- https://laravel.com/docs/5.7/validation#available-validation-rules -->
        <div class="form-group">
            <label for="title">Title:</label>                                   <!--Ovo u 'value' atributu da prilikom neuspesne validacije zapamti staru vrednsot iz polja.-->
        <input class="form-control {{$errTitle}}" type="text" name="title" placeholder="Project title" required value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control {{$errDesc}}" name="description" placeholder="Project description" required>{{old('description')}}</textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create Project</button>
        </div>
    </form>
    <!--Objekat $errors je dostupan svuda.
    -->
    @if($errors->any()>0)
        <div class="alert alert-danger" style="margin-top: 10px;">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </div>
    @endif

@endsection