$(function () {
    // form tambah data
    $('#formTambah').submit(function (e) {
        e.preventDefault();
        const URL = $('#formTambah').attr('action');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        loading();
        $.ajax({
            url: URL,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                Swal.close();
                alertSuccess(data.message, data.url)
            },
            error: function (err) {
                Swal.close();
                var errors = JSON.parse(err.responseText);
                alertError(errors.message)
            }
        });
    });

    // on tipe menu on form add => click
    $('#tipe').change(function (e) {
        if (this.value == 1) {
            $('#wrapperParentUrl').show()
            $('#parentUrl').prop('required', true)

            $('#wrapperKategoriMenu').hide()
            $('#kategoriMenu').prop('required', false)
        } else {
            $('#wrapperParentUrl').hide()
            $('#parentUrl').prop('required', false)

            $('#wrapperKategoriMenu').show()
            $('#kategoriMenu').prop('required', true)
        }
    })

    // on tipe menu on form edit => click
    $('#ubahTipe').change(function (e) {
        if (this.value == 1) {
            $('#wrapperUbahParentUrl').show()
            $('#ubahParentUrl').prop('required', true)

            $('#wrapperUbahKategoriMenu').hide()
            $('#ubahKategoriMenu').prop('required', false)

        } else {
            $('#wrapperUbahParentUrl').hide()
            $('#ubahParentUrl').prop('required', false)

            $('#wrapperUbahKategoriMenu').show()
            $('#ubahKategoriMenu').prop('required', true)
        }
    })
});

// Edit Menu => show modal for edit menu
const editMenu = (id) => {
    showLoading()
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.post(URL_EDIT, {
            _token,
            id
        })
        .done(function (response) {
            swal.close();
            let data = response.data;
            $('#idMenu').val(data.id)
            $('#ubahNama').val(data.menu_title)
            $('#ubahUrl').val(data.menu_url)
            $('#ubahDeskripsi').val(data.menu_description)
            $('#ubahIcon').val(data.menu_icon)
            if (data.menu_parent === 0) {
                $('wrapperUbahParentUrl').hide()
                $('#ubahTipe').val(0)
                $('#ubahTipe').trigger('change')
                $('#ubahKategoriMenu').val(data.kategori_menu_id)
                $('#ubahKategoriMenu').trigger('change');
            } else {
                $('wrapperUbahParentUrl').show()
                $('#ubahTipe').val(1)
                $('#ubahTipe').trigger('change')
                $('#ubahParentUrl').val(data.menu_parent)
                $('#ubahParentUrl').trigger('change');
            }
            $('#modalUbah').modal('show');
        })
        .fail(function (err) {
            console.log(err);
            alertError(err.responseJSON.message);
        });
}

// form edit data
$('#formUbah').submit(function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = new FormData(this);
    loading();
    $.ajax({
        url: URL_UPDATE,
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            Swal.close();
            alertSuccess(data.message, data.url)
        },
        error: function (err) {
            Swal.close();
            var errors = JSON.parse(err.responseText);
            alertError(errors.message)
        }
    });
});

const deleteMenu = (id) => {
    Swal.fire({
        text: `Apakah Anda yakin menghapus menu tersebut ?`,
        showDenyButton: true,
        showCancelButton: false,
        allowOutsideClick: false,
        confirmButtonText: `Yakin`,
        denyButtonText: `Tidak`,
    }).then((result) => {
        if (result.isConfirmed) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            loading();
            $.post(URL_DESTROY, {
                    _token,
                    id
                })
                .done(function (result) {
                    Swal.close();
                    alertSuccess(result.message, result.url)
                })
                .fail(function (err) {
                    Swal.close();
                    alertError(err.message)
                })
        } else if (result.isDenied) {
            return false;
        }
    })
}

const downMenu = (id) => {
    Swal.fire({
        text: `Apakah Anda yakin mengubah posisi menu tersebut ?`,
        showDenyButton: true,
        showCancelButton: false,
        allowOutsideClick: false,
        confirmButtonText: `Yakin`,
        denyButtonText: `Tidak`,
    }).then((result) => {
        if (result.isConfirmed) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            loading();
            $.post(URL_DOWN, {
                    _token,
                    id
                })
                .done(function (result) {
                    Swal.close();
                    alertSuccess(result.message, result.url)
                })
                .fail(function (err) {
                    Swal.close();
                    alertError(err.message)
                })
        } else if (result.isDenied) {
            return false;
        }
    })
}

const upMenu = (id) => {
    Swal.fire({
        text: `Apakah Anda yakin mengubah posisi menu tersebut ?`,
        showDenyButton: true,
        showCancelButton: false,
        allowOutsideClick: false,
        confirmButtonText: `Yakin`,
        denyButtonText: `Tidak`,
    }).then((result) => {
        if (result.isConfirmed) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            loading();
            $.post(URL_UP, {
                    _token,
                    id
                })
                .done(function (result) {
                    Swal.close();
                    alertSuccess(result.message, result.url)
                })
                .fail(function (err) {
                    Swal.close();
                    alertError(err.message)
                })
        } else if (result.isDenied) {
            return false;
        }
    })
}
