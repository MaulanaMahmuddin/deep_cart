$(function () {
    var table = $('#datatable').DataTable({
        "dom":
            "<'row mt-4'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        pageLength: 10,
        processing: true,
        serverSide: true,
        language: {
            infoFiltered: '',
        },
        ajax: URL,
        columns: [
            { data: 'DT_RowIndex', name: 'id', searchable: false },
            { data: 'key', name: 'key' },
            { data: 'value', name: 'value' },
            { data: 'status', name: 'status' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    $('#formAddData').on('submit', function (e) {
        e.preventDefault();
        loading();
        $.ajax({
            url: URL_STORE,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function (data) {
                Swal.close();
                alertSuccess(data.message, data.url)
            },
            error: function (err) {
                Swal.close();
                alertError(err.message)
            }
        });
    });


    $('#formEditData').on('submit', function (e) {
        e.preventDefault();
        loading();
        $.ajax({
            url: URL_UPDATE,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function (data) {
                Swal.close();
                alertSuccess(data.message, data.url)
            },
            error: function (err) {
                Swal.close();
                alertError(err.message)
            }
        });
    });

});

function showModal(id) {
    let _token = $("input[name='_token']").val();
    $.post(URL_AJAX, { _token, id })
        .done(function (response) {
            const { data } = response;
            $('#id_setting').val(data.id)
            $('#key_edit').val(data.key)
            $('#value_edit').val(data.value)
            $('#modalEdit').modal('show');
        })
        .fail(function (err) {
            alertError(err.message);
        });
}
