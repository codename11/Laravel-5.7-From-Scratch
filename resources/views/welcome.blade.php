@extends("layout")

@section("title", "Home")

@section("content")

    <h1>My first website!!!</h1>
    <p>Sed in tempus nulla, non luctus enim. Nunc vitae augue id elit vulputate convallis. In eget dolor auctor, vehicula velit a, tincidunt odio. Sed scelerisque gravida dolor, quis tincidunt turpis sollicitudin eget. Aliquam eu eleifend metus, non dictum lorem. Mauris purus lacus, convallis in porttitor et, rhoncus sit amet ex. Proin mollis, odio ac rutrum dignissim, eros tortor rutrum purus, id faucibus metus quam vel ante. Sed lacinia enim nec sem fermentum, et vulputate velit condimentum.</p>
    
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item list-group-item-action">{{$task}}</li>
        @endforeach
    </ul>
    
@endsection
