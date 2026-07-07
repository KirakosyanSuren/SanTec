@props([
    'id' => null,
    'label' => '',
    'name',
    'options' => collect(),
    'selected' => null,
    'multiple' => false,
    'multilanguage' => false,
    'showAllOption' => false,
])

<div class="form-group">

    <label>{{ $label }}</label>

    <div
        id="{{ $id }}"
        class="multi-select"
        data-name="{{ $name }}"
        data-multiple="{{ $multiple ? 'true' : 'false' }}"
        data-placeholder="{{ __('admin.common.show_all') }}"
    >

        <div class="multi-select-trigger">
            <div class="selected-items"></div>
            <i class="fa-solid fa-chevron-down"></i>
        </div>

        <div class="multi-select-dropdown">

            @if($showAllOption && !$multiple)
                <label class="multi-option">
                    <input
                        class="select_checkbox"
                        type="radio"
                        name="{{ $name }}"
                        value=""
                        @checked(empty($selected))
                    >
                    <span>{{ __('admin.common.show_all') }}</span>
                </label>
            @endif

            @foreach($options as $option)

                <label class="multi-option">

                    <input
                        class="select_checkbox"
                        type="{{ $multiple ? 'checkbox' : 'radio' }}"
                        name="{{ $multiple ? $name . '[]' : $name }}"
                        value="{{ $option->id }}"
                        @if($id === 'model_select')
                            data-slug="{{ $option->name }}"
                        @endif
                        @checked(
                            $multiple
                                ? in_array($option->id, (array) $selected)
                                : $selected == $option->id
                        )
                    >

                    <span>
                        @if($multilanguage)
                            <span>{{ $option->name[app()->getLocale()] }}</span>
                        @else
                            <span>{{ $option->name }}</span>
                        @endif
                </label>

            @endforeach

        </div>

    </div>

    @error($name)
        <p class="error-text">{{ $message }}</p>
    @enderror

</div>
