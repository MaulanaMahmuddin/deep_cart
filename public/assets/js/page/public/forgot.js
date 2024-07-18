function loading() {
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

function validatePassword() {
    var password = $("#password").val();
    if (password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/)) {
        return true;
    }
    return false;
}

const helper = function () {
    var form, buttonSubmit, validator;
    return {
        init: function () {
            form = document.querySelector("#formLogin");
            const URL = form.getAttribute('action');
            buttonSubmit = document.querySelector("#button-submit");
            validator = FormValidation.formValidation(form, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email tidak boleh kosong"
                            },
                            emailAddress: {
                                message: 'Email yang anda masukan tidak valid'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',

                    })
                }
            });
            buttonSubmit.addEventListener("click", (function (e) {
                e.preventDefault();
                validator.validate().then((function (i) {
                    if (i == "Invalid") {
                        alertError(
                            "Mohon maaf terjadi kesalahan. Silakan periksa kembali form."
                        );
                    } else {
                        // cek captcha
                        let captcha = $("#g-recaptcha-response").val();
                        if (!captcha || captcha == '') {
                            alertError('Captcha tidak valid')
                            return false
                        }
                        buttonSubmit.setAttribute("data-kt-indicator", "on");
                        buttonSubmit.disabled = true;
                        loading();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery(
                                    'meta[name="csrf-token"]').attr(
                                        'content')
                            }
                        });
                        var formData = new FormData(form);
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
                                buttonSubmit.removeAttribute(
                                    "data-kt-indicator");
                                buttonSubmit.disabled = false;
                                const error = err.responseJSON;
                                alertError(error.message);
                                grecaptcha.reset();
                            }
                        });
                    }
                }))
            }))
        }
    }
}();


$(document).ready(function () {

    KTUtil.onDOMContentLoaded((function () {
        helper.init();
    }));

    $('#formLogin').submit(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        let _token = $("input[name='_token']").val();
        let email = $("#email").val();
        let captcha = $("#g-recaptcha-response").val();
        let data = {
            _token: _token,
            email: email,
            password: password,
            'g-recaptcha-response': captcha
        }
        if (!captcha || captcha == '') {
            alertError('Captcha tidak valid')
            return false
        }
        loading();
        $.ajax({
            url: URL,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
                alert(data);
                Swal.close();
                alertSuccess(data.msg, data.url)
            },
            error: function (err) {
                Swal.close();
                var errors = JSON.parse(err.responseText);
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
                alertError(errors.msg)
                grecaptcha.reset();
            }
        });
    });
});