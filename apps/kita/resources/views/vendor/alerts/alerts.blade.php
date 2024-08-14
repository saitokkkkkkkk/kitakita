@if(session('success'))
    <div id="success-alert" class="alert alert-success" role="alert">
        <p class="fw-bold fs-3 mb-0">Success!</p>{!! session('success') !!}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <p class="fw-bold fs-3 mb-0">Error!</p>{!! session('error') !!}
    </div>
@endif
