function go_to_index(controller) {
    window.location.href = '/admin/' + controller;
}



function active_item(_active, _id, _table_name, _input) {
    
    id = _id
    table_name = _table_name
    active = _active
    input = $( _input )

    axios.post('/admin/toggle-status', {
        id: id,
        table_name: table_name,
        active: active
    })
    .then(response => {
        if (response.data.success) {
            console.log(response.data.message);
            
            if(active == 0) {
                $('#toggle'+id).addClass('bi bi-toggle-off')
                $('#toggle'+id).removeClass('bi bi-toggle-on')
                x = 1
            }

            if(active == 1) {
                $('#toggle'+id).removeClass('bi bi-toggle-off')
                $('#toggle'+id).addClass('bi bi-toggle-on')
                x = 0
            }

            input.attr('onclick', function(i, v, c){
                return 'active_item('+ x +', '+ id +', "'+ table_name +'", this)';
            });
        }
    })
    .catch(error => {
        if (error.response) {
            console.log('Erro: ' + error.response.data.message);
        }
    });

}

function delete_item(_id, _table_name) {
    id      = _id
    table_name  = _table_name

    if (confirm('Você tem certeza que deseja excluir este item?')){
        axios.post('/admin/' + table_name + '/' + id + '/delete', {
            id: id,
        })
        .then(response => {
            if (response.data.success) {
                console.log(response.data.message);
                location.reload(true);
            }
        })
        .catch(error => {
            if (error.response) {
                console.log('Erro: ' + error.response.data.message);
            }
        });
    }
}

function confirm_password(input1, input2) {

    var pass_1 = $('#' + input1).val();
    var pass_2 = $('#' + input2).val();
    var pass_confirm = $('#pass_confirm');
    var btn_confirm = $('#SALVAR')

    if(pass_1 === pass_2) {
        pass_confirm.removeClass('d-none');
        pass_confirm.removeClass('text-danger');
        pass_confirm.addClass('text-success');
        pass_confirm.empty();
        pass_confirm.append('Senha confirmada!');
        btn_confirm.attr("disabled", false)
    } else {
        pass_confirm.removeClass('d-none');
        pass_confirm.removeClass('text-success');
        pass_confirm.addClass('text-danger');
        pass_confirm.empty();
        pass_confirm.append('Senha não confirmada!');
        btn_confirm.attr("disabled", true)
    }
}

function password_change(_id) {
    id   = _id
    pass = $('#user_pass_' + id).val()

    if (confirm('Você tem certeza que deseja alterar a senha deste usuário?')){

        let dados = {
          user_id:  id,
          user_pass:pass
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/admin/users/change-password/',
            type: "POST",
            data: dados,
            success: function(data){
                notification_div(1)

                setInterval(function() {
                    location.reload(true);
                }, 5000);
            },
            error: function (erro) {
                console.error('Erro:', erro);
            }
        });
    }
}

function notification_div(_type) {

    let alert = $('#alert')
    let alert_bi = $('#alert_bi')
    let message = $('#message')

    switch (_type) {
        case 1:
            alert.addClass('alert-success')
            alert.removeClass('d-none')
            alert_bi.addClass('bi-check-circle-fill')
            message.append('Informações salvas com sucesso!');
            break;
        case 99:
            alert.addClass('alert-danger')
            alert.removeClass('d-none')
            alert_bi.addClass('bi-check-circle-fill')
            message.append('Código incorreto. Verique seu e-mail ou reenvie um novo código!');
            break;
        default:
            break;
    }
}
