$(function () {
    $('#btn-editProfile').click(function(){
        $('#wrapper-change').show('slow')
        $('#wrapper-profile').hide('slow')
        $('#btn-cancel').show()
        $('#btn-editProfile').hide()
        $('#titleProfile').html('Change Profile')
    });

    // event password baru
    $('#newPassword').focus(function(){
        $('#password-message').show();
    });
    $('#newPassword').blur(function(){
        $('#password-message').hide();
    });

    $('#newPassword').bind('keyup blur', function () {
        let password = $(this).val();
        let lowerCaseLetters = /[a-z]/g;
        let upperCaseLetters = /[A-Z]/g;
        let numbers = /[0-9]/g;
        let svgSuccess = `svg-icon svg-icon-1 svg-icon-success`
        let svgDanger = `svg-icon svg-icon-1 svg-icon-danger`
        let htmlIconSuccess = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
            <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
        </svg>`
        let htmlIconDanger = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
            <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
            <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
        </svg>`

        // lowercase
        if (password.match(lowerCaseLetters)) {
            $("#lowercase").attr('class', svgSuccess);
            $("#lowercase").html(htmlIconSuccess);
        } else {
            $("#lowercase").attr('class', svgDanger);
            $("#lowercase").html(htmlIconDanger);
        }

        // uppercase
        if (password.match(upperCaseLetters)) {
            $("#uppercase").attr('class', svgSuccess);
            $("#uppercase").html(htmlIconSuccess);
        } else {
            $("#uppercase").attr('class', svgDanger);
            $("#uppercase").html(htmlIconDanger);
        }

        // number
        if (password.match(numbers)) {
            $("#number").attr('class', svgSuccess);
            $("#number").html(htmlIconSuccess);
        } else {
            $("#number").attr('class', svgDanger);
            $("#number").html(htmlIconDanger);
        }

        // minimum
        if (password.length >= 8) {
            $("#minimum").attr('class', svgSuccess);
            $("#minimum").html(htmlIconSuccess);
        } else {
            $("#minimum").attr('class', svgDanger);
            $("#minimum").html(htmlIconDanger);
        }
    });

    $('#formChangeProfile').submit(function(e){
        e.preventDefault();
        let oldPassword = $('#oldPassword');
        let newPassword = $('#newPassword');
        let confirmPassword = $('#confirmPassword');
        let captcha = $("#g-recaptcha-response").val();
        if(oldPassword.val() !== "" || newPassword.val() !== "" || confirmPassword.val() !== ""){
            if(oldPassword.val() === ""){
                alertError('Password lama tidak boleh kosong')
                return false;
            }
            if(newPassword.val() === ""){
                alertError('Password baru tidak boleh kosong')
                return false;
            }
            if(confirmPassword.val() === ""){
                alertError('Konfirmasi password baru tidak boleh kosong')
                return false;
            }
            if(newPassword.val() !== confirmPassword.val()){
                alertError('Password baru tidak sama dengan konfirmasi password')
                return false;
            }
            if(newPassword.val() === oldPassword.val()){
                alertError('Password baru tidak boleh sama dengan password lama')
                return false;
            }

            if(newPassword.val().length < 8){
                alertError('Password baru minimal 8 karakter', 'Password lemah')
                return false;
            }
            const regex = /^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*\d)\S{8,}$/;
            if(!newPassword.val().match(regex)){
                alertError('Password baru lemah. Gunakan kombinasi huruf kecil, kapital dan angka', 'Password lemah')
                return false;
            }
        }
        if(!captcha || captcha == ''){
            alertError('Captcha tidak valid')
            return false
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        loading();
        $.ajax({
            url: URL,
            type:'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
                Swal.close();
                alertSuccess(data.message, data.url)
            },
            error:function(err) {
                Swal.close();
                grecaptcha.reset();
                var errors = JSON.parse(err.responseText);
                if (err.status == 422) {
                    if (errors.errors.username) {
                        alertError(errors.errors.username)
                        return false
                    }
                    if (errors.errors.nama) {
                        alertError(errors.errors.nama)
                        return false

                    }
                    if (errors.errors.email) {
                        alertError(errors.errors.email)
                        return false
                    }
                }
                alertError(errors.message)
            }
        });
    });
});

$('#btn-cancel').click(function(){
    $('#wrapper-change').hide('slow')
    $('#wrapper-profile').show('slow')
    $('#btn-cancel').hide()
    $('#btn-editProfile').show()
    $('#titleProfile').html('Profile Detail')
})
