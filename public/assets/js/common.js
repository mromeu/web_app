function newCommonItem() {
    id          = $('#id').val()
    input_name  = $('#name').val()
    input_code  = $('#code').val()
    table_name  = $('#table_name').val()

    let dados = {
        id:  id,
        name:input_name,
        code:input_code,
        table_name:table_name
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/admin/common/api/" + table_name,
        type: "POST",
        data: dados,
        success: function(data){
            console.log(data);
            listCommonItems(table_name)
            $('#id').val('')
            $('#name').val('')
            $('#code').val('')
        },
    });
}

function listCommonItems(table_name) {
    $('#items tbody').empty()
    $('.list-group > button').removeClass('active')
    $('#' + table_name).addClass('active')
    $('#table_name').val(table_name)

    jQuery.ajax({
        url: "/admin/common/api/"+table_name,
        dataType: "json",
        type: "GET",
        success: function(data){
            count = 0;
            $.each(data, function(i, item) {
                common_id = data[i]['id']
                common_name = data[i]['name']
                common_code = data[i]['code'] === null ? '' : data[i]['code']
                active = data[i]['active']
                count++

                if(active == 0) {
                    toogle = 'bi-toggle-off'
                } else {
                    toogle = 'bi-toggle-on'
                }

                $('#items > tbody:last-child').append(
                    '<tr><th>' + count +
                    '</th><td>' + common_name + ' [' + common_id + ']' +
                    '</td><td>' + common_code +
                    '</td><td>' + '<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#newCommonItem" onclick=editCommonItem("'+ common_id + '","' + encodeURIComponent(common_name) + '","' + encodeURIComponent(common_code) + '","' + encodeURIComponent(table_name) + '")' +
                    '><i class="bi bi-pencil"></i></button>'+
                    '' + '<button type="button" class="btn btn-sm btn-outline-secondary ms-2" onclick=activeCommonItem("' + toogle + '","'+ common_id +'","'+ encodeURIComponent(table_name) +'")><i id="toogle'+ common_id +'" class="bi '+ toogle +'"></i></button>'+
                    '<button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick=deleteCommonItem("'+ common_id +'","' + encodeURIComponent(table_name) + '")' +
                    '><i class="bi bi-trash"></i></button>'+
                    '</td></tr>'
                )
            });
        },
    });
}

function activeCommonItem(_toogle, _common_id, _table_name) {
    id   = _common_id
    table_name  = _table_name

    if(_toogle === 'bi-toggle-off') { active = 1 }
    if(_toogle === 'bi-toggle-on')  { active = 0 }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery.ajax({
        url: "/admin/common/api/" + table_name,
        dataType: "json",
        type: "PUT",
        data: { id: id, active: active, table_name: table_name },
        success: function(data){
            listCommonItems(table_name)
        },
    });
}

function deleteCommonItem(_common_id, _table_name) {
    let dados = {
        id:  _common_id,
        table_name:_table_name
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if (confirm('Você tem certeza que deseja excluir este item?')){
        $.ajax({
            url: "/admin/common/api/" + _table_name,
            dataType: "json",
            type: "DELETE",
            data: dados,
            success: function(data){
                listCommonItems(_table_name)
            },
        });
    }
}

function editCommonItem(common_id, common_name, common_code, table_name) {
    $('#id').val(common_id)
    $('#name').val(decodeURI(common_name))
    $('#code').val(decodeURI(common_code))
    $('#table_name').val(decodeURI(table_name))
}