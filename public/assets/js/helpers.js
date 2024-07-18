function alertConfirm(route, message = null) {
    if (message == null || message == '' || !message) {
        Swal.fire({
            text: `Apakah Anda yakin mengubah status ?`,
            showDenyButton: true,
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonText: `Yakin`,
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = route;
            } else if (result.isDenied) {
                return false;
            }
        })
    } else if (message === 'delete') {
        Swal.fire({
            text: `Apakah Anda yakin menghapus data ?`,
            showDenyButton: true,
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonText: `Yakin`,
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = route;
            } else if (result.isDenied) {
                return false;
            }
        })
    } else {
        Swal.fire({
            text: message,
            showDenyButton: true,
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonText: `Yakin`,
            denyButtonText: `Tidak`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = route;
            } else if (result.isDenied) {
                return false;
            }
        })
    }
}

function alertError(msg) {
    Swal.fire({
        text: msg,
        icon: 'error',
        showCancelButton: false,
        allowOutsideClick: false,
    });
}

function loading() {
    Swal.fire({
        icon: 'info',
        text: 'Mohon tunggu',
        allowEscapeKey: false,
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            swal.showLoading();
        }
    })
}

function showLoading() {
    Swal.fire({
        title: 'Sedang memuat data',
        allowOutsideClick: false,
        showDenyButton: false,
        showCancelButton: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    })
}

function alertSuccess(msg, url = null) {
    if (url !== null) {
        Swal.fire({
            icon: 'success',
            allowOutsideClick: false,
            title: 'Sukses',
            text: msg
        }).then(function () {
            window.location = url;
        });
    } else {
        Swal.fire({
            icon: 'success',
            allowOutsideClick: false,
            title: 'Sukses',
            text: msg
        });
    }
}

imageValidation = (id_file, max_file_size = 2048) => {
    let typeDibolehkan = ['image/png', 'image/jpg', 'image/jpeg'];
    const fi = document.getElementById(id_file);

    // Check if any file is selected.
    if (fi.files.length > 0) {
        for (let i = 0; i <= fi.files.length - 1; i++) {
            const fsize = fi.files.item(i).size;
            const file_size = Math.round((fsize / 1024));
            const file_type = fi.files.item(i).type
            // The size of the file.
            var max_file_size_title = Math.round((max_file_size / 1024))
            if (file_size >= max_file_size) {
                alertError("Ukuran file tidak boleh lebih dari " + max_file_size_title + " MB");
                $("#" + id_file).val('')
            }
            if (!typeDibolehkan.includes(file_type)) {
                alertError("Tipe file tidak boleh selain image");
                $("#" + id_file).val('')
            }
        }
    }
}

$.fn.number = function () {
    $(this).on('keypress', function (e) {
        var regex = new RegExp(/^[0-9\s]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }
    });
}

$.fn.letter = function () {
    $(this).on('keypress', function (e) {
        // var regex = new RegExp(/^[a-zA-Z\s]*$/);
        var regex = new RegExp(/^[a-zA-Z\s!@#\$%\^\&*\)\(.]+$/g);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }
    });
}

$.fn.maxLength = function (max) {
    $(this).on('keypress', function (e) {
        if (e.target.value.length >= max) {
            return false;
        }
    })
}
$.fn.noSpace = function () {
    $(this).on('keypress', function (e) {
        let textValue = e.target.value.replace(/ /g, "");
        $(this).val(textValue);
    })
}
const fileValidation = (id_file, type = 'PDF', linkFile = null) => {
    const fi = document.getElementById(id_file);
    let stringLampiran = '';
    let fileSizeMax = 0;
    if (type == 'PDF') {
        stringLampiran = 'Preview Lampiran';
        typeDibolehkan = ['application/pdf'];
        fileSizeMax = 2048;
        captionMaxSize = '2MB';
    } else {
        stringLampiran = 'Preview';
        typeDibolehkan = ['image/jpeg', 'image/png', 'image/jpg'];
        fileSizeMax = 2048;
        captionMaxSize = '2MB';
    }

    // Check if any file is selected.
    if (fi.files.length > 0) {
        for (let i = 0; i <= fi.files.length - 1; i++) {
            const fsize = fi.files.item(i).size;
            const file_size = Math.round((fsize / 1024));
            const file_type = fi.files.item(i).type
            // The size of the file.
            if (file_size >= fileSizeMax) {
                alertError(`Ukuran file tidak boleh lebih dari ${captionMaxSize}`);
                $("#" + id_file).val('')
                $("#file-link").html('');
            }
            if (!typeDibolehkan.includes(file_type)) {
                alertError(`Tipe file tidak boleh selain ${type}`);
                $("#" + id_file).val('')
                $("#file-link").html('');
                return false
            }
        }
    }
    let file = $(`#${id_file}`)[0].files[0];

    try {
        fileLink = window.URL.createObjectURL(file);
        if (linkFile) {
            $(`#${linkFile}-lama`).html('');
            $(`#${linkFile}`).html(
                "<a href='" + fileLink + "' target='_blank'><button type='button' class='btn btn-info btn-sm'><i class='fa fa-eye'></i> " + stringLampiran + "</button></a>"
            );
        } else {
            $("#file-link-lama").html('');
            $("#file-link").html(
                "<a href='" + fileLink + "' target='_blank'><button type='button' class='btn btn-info btn-sm'><i class='fa fa-eye'></i> " + stringLampiran + "</button></a>"
            );
        }
    } catch (e) {
        console.log(
            "Can't create file link. Try using latest mainstream browser."
        );
    }

    return true;
}

$.fn.formatRupiah = function () {
    $(this).on('input', function () {
        // Remove non-numeric characters from input value
        var val = $(this).val().replace(/[^\d]/g, '');

        // Format the value as Rupiah currency
        if (val != '') {
            val = parseInt(val, 10);
            $(this).val(formatRupiah(val));
        }
    });

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }
};

$.fn.weightUnitFormat = function (result) {
    $(this).on('input', function () {
        var gramsInput = $(this).val();

        var grams = parseFloat(gramsInput.replace(/,/g, ''));

        if (isNaN(grams)) {
            $(result).html('');
            return;
        }

        var kilograms = grams / 1000;
        var tons = kilograms / 1000;

        var resultHTML;
        if (kilograms < 1) {
            resultHTML = 'Grams: ' + grams.toFixed(2) + ' g';
        } else if (tons >= 1) {
            resultHTML = 'Tons: ' + tons.toFixed(2) + ' tons';
        } else {
            resultHTML = 'Kilograms: ' + kilograms.toFixed(2) + ' kg';
        }

        $(result).html(resultHTML);
    });
};

function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + ribuan;
}
