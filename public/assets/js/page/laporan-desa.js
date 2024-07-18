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
        processing : true,
        serverSide : true,
        language: {
            infoFiltered: '',
        },
        ajax: {
            url: URL,
            data: function (d){
                d.tahun = $('#tahun').val();
                d.kecamatan = $('#kecamatan').val();
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'namaKecamatan', name: 'namaKecamatan'},
            {data: 'namaDesa', name: 'namaDesa'},
            {data: 'belumSudahBayar', name: 'belumSudahBayar'},
            {data: 'jumlah', name: 'jumlah'},
            {data: 'totalBelumBayar', name: 'totalBelumBayar'},
            {data: 'totalSudahBayar', name: 'totalSudahBayar'},
            {data: 'totalBayar', name: 'totalBayar'},
        ]
    });
    $('#btnFilter').click(function(){
        table.draw();
        setButtonExcel();
    });
    $('#btnReset').click(function(){
        $("#tahun").select2('destroy').val(YEAR_NOW).select2();
        $("#kecamatan").select2('destroy').val('#').select2();
        setButtonExcel();
        table.draw();
    });

    $('#tahun, #kecamatan').change(function(){
        setButtonExcel();
    });
    
});

const setButtonExcel = () => {
    let tahun = $('#tahun').val();
    let kecamatan = $('#kecamatan').val().toString();
    $('#btnExcel').attr('href', URL_EXPORT + `?tahun=${tahun}&kec=${kecamatan}`)
}