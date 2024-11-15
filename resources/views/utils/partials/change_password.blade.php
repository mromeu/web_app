<div class="modal fade" id="passChange" tabindex="-1" aria-labelledby="passChangeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="passChangeLabel">Alterar senha</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-md-6">
                        <label for="user_pass_{{ $row->id }}" class="required">Nova senha</label>
                        <input type="password" name="user_pass_{{ $row->id }}" id="user_pass_{{ $row->id }}" class="form-control form-control-sm" value="" onblur="confirm_password('user_pass_{{ $row->id }}', 'user_pass_confirm_{{ $row->id }}')">
                    </div>
                    <div class="col-md-6">
                        <label for="user_pass_confirm_{{ $row->id }}" class="required">Confirmar nova senha</label>
                        <input type="password" name="user_pass_confirm_{{ $row->id }}" id="user_pass_confirm_{{ $row->id }}" class="form-control form-control-sm" value="" onblur="confirm_password('user_pass_{{ $row->id }}', 'user_pass_confirm_{{ $row->id }}')">
                    </div>
                    <p id="pass_confirm" class="col-md-12 text-center mt-4 d-none"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success" id="SALVAR" data-bs-dismiss="modal" onclick="password_change({{ $row->id }})">SALVAR</button>
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
