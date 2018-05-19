@if(count($errors)> 0)
    <div class="alert alert-danger" align="center"  width="40%">
        <strong>Greške:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li  style="list-style-type:none">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif