@if(count($errors->all()) > 0)

    <div class="alert alert-info" style="text-align:center;">
        <ul style="list-style:none;">
            @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif