@props([
    'type' => 'text',
    'label' => false,
    'name',
    'id' => '',
    'value' => '',
])
@if($label)
<label for="{{ $id }}">{{ $label }}</label>
@endif
<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ old($name, $value) }}"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has('name')]) }} />
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
