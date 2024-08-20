<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9ecef;">
                <h5 class="modal-title" id="passwordModalLabel">パスワード変更</h5>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'member.password.update', 'method' => 'PUT']) !!}
                <div class="mb-3">
                    {!! Form::label('newPassword', '新しいパスワード', ['class' => 'form-label']) !!}
                    {!! Form::password('newPassword', ['class' => 'form-control']) !!}
                    @error('newPassword')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    {!! Form::label('newPassword_confirmation', '新しいパスワード（確認）', ['class' => 'form-label']) !!}
                    {!! Form::password('newPassword_confirmation', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="ms-3 mb-3">
                {!! Form::submit('更新する', ['class' => 'btn btn-success rounded-pill']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
