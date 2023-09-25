<div class="toast-container position-absolute top-0 end-0 p-3">
    <div class="toast fade @if (Session::get('success') || Session::get('error')) show @else hide @endif" data-delay="4000" role="alert"
        aria-live="assertive" aria-atomic="true" id="alert-toast-bs">
        <div class="toast-header">
            <strong class="me-auto">
                @if (Session::get('success'))
                    Success
                @else
                    Error
                @endif
            </strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            @if ($message = Session::get('success'))
                {{ $message }}
                {{ session()->forget('success') }}
            @elseif ($message = Session::get('error'))
                {{ $message }}
                {{ session()->forget('error') }}
            @endif
        </div>
    </div>
</div>
