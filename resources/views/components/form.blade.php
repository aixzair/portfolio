@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($id) ? route($route, $id) : route($route) }}" method="POST">
    @csrf
    @if(isset($methode) && $methode === 'PUT')
        @method("PUT")
    @endif
    {{ $slot }}
</form>