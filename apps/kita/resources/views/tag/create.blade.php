{{-- @extends('layouts.admin')
@section('content')
<!-- あとでここに入れ直してnavバーつける -->
@endsection--}}

@include('partials.head')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h2 class="my-5">タグ管理 - 新規登録</h2>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                    <div class="form-group mb-3">
                        {!! Form::label('tag', 'タグ名') !!}
                        {!! Form::text('tag', old('tag'), ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
