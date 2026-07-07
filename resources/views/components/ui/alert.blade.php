@if(session('success'))

    <div class="alert success-alert">

        <i class="fa-solid fa-circle-check"></i>

        <span>
            {{ session('success') }}
        </span>

    </div>

@endif
