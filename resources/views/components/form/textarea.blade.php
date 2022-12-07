@props([
    'label' => false,
    'name',
    'id' => '',
    'value' => '',
])
@if ($label)
    <label for="{{ $id }}">{{ $label }}</label>
@endif
<textarea name="{{ $name }}" id="{{ $id }}"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>{{ old($name, $value) }}</textarea>
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
