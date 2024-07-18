function loading(){
    Swal.fire({
        icon: 'info',
        text: 'Mohon tunggu',
        allowEscapeKey: false,
        allowOutsideClick: false,
        showConfirmButton: false,
        onOpen: () => {
            swal.showLoading();
        }
    })
}

$(document).ready(function(){
    $('#formLogin').submit(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        let _token = $("input[name='_token']").val();
        let username = $("#username").val();
        let password = $("#password").val();
        let captcha = $("#g-recaptcha-response").val();
        let data = {
            _token : _token,
            username : username,
            password : password,
            'g-recaptcha-response': captcha
        }
        if(!captcha || captcha == ''){
            alertError('Captcha tidak valid')
            return false
        }
        loading();
        $.ajax({
            url: URL,
            type:'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                Swal.close();
                alertSuccess(data.message, data.url)
            },
            error:function(err) {
                Swal.close();
                $("#password").val('');
                console.log(err);
                console.log(err.responseText);
                var errors = JSON.parse(err.responseText);
                console.log(errors);
                if (err.status == 422) {
                    if (errors.errors.username) {
                        alertError(errors.errors.username)
                        grecaptcha.reset();
                        return false
                    }
                    if (errors.errors.password) {
                        alertError(errors.errors.password)
                        grecaptcha.reset();
                        return false
                    }
                    alertError(errors.message)
                    grecaptcha.reset();
                    return false
                }
                alertError(errors.message)
                grecaptcha.reset();
            }
        });
    });
});
