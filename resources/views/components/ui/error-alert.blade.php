@if($errors->any())

    <div class="alert error-alert">

        <i class="fa-solid fa-circle-xmark"></i>

        <span>
            {{ __('admin.messages.file_reselect_notice') }}
        </span>

    </div>

@endif
