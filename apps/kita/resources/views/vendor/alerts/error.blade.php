@if (session('error'))
    <div class="alert alert-danger">
        <p class="fw-bold fs-3 mb-0">Error!</p>{!! session('error') !!}
    </div>
@endif
