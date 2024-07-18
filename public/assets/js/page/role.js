$(function () {
    var table = $('#datatable').DataTable({
        "dom": "<'row mt-4'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        processing: true,
        serverSide: true,
        language: {
            infoFiltered: '',
        },
        ajax: URL,
        columns: [{
                data: 'DT_RowIndex',
                name: 'id',
                searchable: false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'role_nama',
                name: 'role_nama'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

});

const setHakAkses = (url) => {
    showLoading();
    $.get(url)
        .done(function (res) {
            Swal.close();
            $('.modal-body').html(res)
            $('#modalHakAkses').modal('show')
        })
        .fail(function(err){
            console.log(err);
        })
}


