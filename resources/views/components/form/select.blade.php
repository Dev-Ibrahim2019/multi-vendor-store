@props(['label' => false, 'name', 'options', 'selected' => false, 'id' => ''])

@if ($label)
    <label for="{{ $id }}">{{ $label }}</label>
@endif
<select name="{{ $name }}"
    {{ $attributes->class(['form-control', 'form-select', 'is-invalid' => $errors->has($name)]) }}>
    @foreach ($options as $value => $text)
        <option value="{{ $value }}" @selected($value == $selected)>{{ $text }}</option>
    @endforeach
</select>
