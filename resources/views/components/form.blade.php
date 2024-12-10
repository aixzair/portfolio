<form action="{{ isset($id) ? route($route, $id) : route($route) }}" method="POST">
    @csrf
    @if(isset($methode) && $methode === 'PUT')
        @method("PUT")
    @endif
    {{ $slot }}
</form>
