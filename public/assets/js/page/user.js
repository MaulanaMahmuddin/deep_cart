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
        processing: true,
        serverSide: true,
        language: {
            infoFiltered: '',
        },
        ajax: {
            url: URL,
            data: function (d) {
                d.status = $('#status').val();
                d.kategori = $('#kategori').val();
                d.kecamatan = $('#kecamatan').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id', searchable: false },
            { data: 'admin_nama', name: 'admin_nama' },
            { data: 'admin_username', name: 'admin_username' },
            { data: 'admin_email', name: 'admin_email' },
            { data: 'namaRole', name: 'namaRole', orderable: false },
            { data: 'status', name: 'status', orderable: false },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
    $('#status, #kategori, #kecamatan').change(function () {
        table.draw();
    });

});

$('#kategori').change(function () {
    const kategori = $('#kategori').val();
    if (kategori == 3) {
        $('#frame_kecamatan').show('slow');
    } else {
        $('#frame_kecamatan').hide('slow');
        $("#kecamatan").select2('destroy').val("").select2();
    }
});
