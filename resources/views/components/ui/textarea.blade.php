@props([
    'label' => null,
    'name' => null,
    'value' => null,
])

<div class="form-group">

    <label>
        {{ $label }}
    </label>

    <textarea
        rows="6"
        name="{{ $name }}"
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="error-text">{{ $message }}</p>
    @enderror

</div>
