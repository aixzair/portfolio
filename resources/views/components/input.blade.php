<div class="input-group my-2">
    <label class="input-group-text" for="{{ $nom }}">{{ $text }}</label>
    <input class="form-control" name="{{ $nom }}" type="{{ $type }}"
           value="{{ old($nom) }}" {{ $attributes }}>
</div>