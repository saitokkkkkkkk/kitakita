@if(session('success'))
    <div id="success-alert" class="alert alert-success" role="alert">
        {!! session('success') !!}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
@endif
