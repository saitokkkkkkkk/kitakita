@if (session('error'))
    <div id="error-alert" class="alert alert-danger">
        <p class="fw-bold fs-3 mb-0">Error!</p>{!! session('error') !!}
    </div>
@endif
