@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: #000"> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
