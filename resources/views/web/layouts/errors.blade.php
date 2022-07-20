@if ($errors->any())
    <div class="alert alert-danger p-0 pt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
