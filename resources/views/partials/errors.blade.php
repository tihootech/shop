@if ($errors->any())
    <div class="alert alert-danger my-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="mt-2">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
