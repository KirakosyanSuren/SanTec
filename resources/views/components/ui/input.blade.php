@props([
    'label' => null,
    'name' => null,
    'value' => null,
])

<div class="form-group">

    <label>
        {{ $label }}
    </label>

    <input
        name="{{ $name }}"
        @if($name !== 'password')
            value="{{ old($name, $value) }}"
        @endif
        {{ $attributes }}
    />

    @error($name)
        <p class="error-text">{{ $message }}</p>
    @enderror

</div>
