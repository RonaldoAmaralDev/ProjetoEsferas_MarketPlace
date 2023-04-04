$(function () {
    $(".auth-form").validate({
        rules: {
            username: "required",
            password: "required"
        },
        messages: {
            username: "Digite o seu login.",
            password: "Digite sua senha."
        },
    });

    $(".recovery-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            email: {
                required: "Digite seu e-mail",
                email: "Por favor digite um e-mail válido.",
            },
        },
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                dataType: "json",
                data: $(form).serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn('fast');
                },
                success: function (response) {
                    if (response.type == 'success') {
                        $(".types-forgot").addClass('d-none');
                        $(".types-token").removeClass('d-none');
                        contador();
                    } else {
                        Swal.fire({
                            icon: response.type,
                            text: response.message,
                            timer: 2000
                        });
                    }
                },
                complete: function () {
                    $(".loader").fadeOut('fast');
                }
            });
        }
    });

    $(".token-form").validate({
        rules: {
            code: {
                required: true,
            },
        },
        messages: {
            code: {
                required: "Digite o código de recuperação",
            },
        },
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                dataType: "json",
                data: $(form).serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn('fast');
                },
                success: function (response) {
                    Swal.fire({
                        icon: response.type,
                        text: response.message,
                        timer: 2000
                    });
                    if (response.type == 'success') {
                        $(".types-forgot, .types-token").addClass('d-none');
                        $(".types-password").removeClass('d-none');
                        $('input[name="sixhash"]').val(response.sixhash);
                    }
                },
                complete: function () {
                    $(".loader").fadeOut('fast');
                }
            });
        }
    });

    $(".change-form").validate({
        rules: {
            senha: {
                minlength: 5
            },
            senha_confirmar: {
                minlength: 5,
                equalTo: '[name="senha"]'
            }
        },
        messages: {
            senha: {
                required: "Por favor digite uma senha",
                minlength: "Sua senha deve ter pelo menos 5 caracteres"
            },
            senha_confirmar: {
                required: "Por favor digite uma senha",
                minlength: "Sua senha deve ter pelo menos 5 caracteres",
                equalTo: "Por favor, digite a mesma senha acima"
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action'),
                method: "POST",
                dataType: "json",
                data: $(form).serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn('fast');
                },
                success: function (response) {
                    Swal.fire({
                        icon: response.type,
                        text: response.message,
                        timer: 2000
                    });
                    if (response.type == 'success') {
                        setTimeout(() => {                            
                            window.location.assign(response.url, true);
                        }, 1000);
                    }
                },
                complete: function () {
                    $(".loader").fadeOut('fast');
                }
            });
        }
    });

    $(".register-form").validate({
        rules: {
            nome: "required",
            celular: "required",  
            login: {
                required: true,
                minlength: 3
            },
            confirm_rules: "required",
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true,
                minlength: 5
            },
        },
        messages: {
            nome: "Digite o seu nome",
            celular: "Digite o seu celular",
            login: {
                required: "Digite o seu login",
                minlength: "Seu login deve ter pelo menos 3 caracteres"
            },
            senha: {
                required: "Digite sua senha",
                minlength: "Sua senha deve ter pelo menos 5 caracteres"
            },
            email: {
                required: "Digite seu e-mail",
                email: "Por favor digite um e-mail válido.",
            },
            confirm_rules: {
                required: "Você deve aceitar os termos."
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: $(form).attr('action') + '?sponsor=' + getParameterByName('sponsor'),
                method: "POST",
                dataType: "json",
                data: $(form).serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn('fast');
                },
                success: function (response) {
                    Swal.fire({
                        icon: response.type,
                        text: response.message,
                        timer: 2000
                    });
                    if (response.type == 'success') {
                        setTimeout(() => {                            
                            window.location.assign(response.url, true);
                        }, 1000);
                    }
                },
                complete: function () {
                    $(".loader").fadeOut('fast');
                }
            });
        }
    });

    $("#btnSend").on('click', function (e) {
        if($('input[name="email"').val()) {
            $.ajax({
                url: $('.recovery-form').attr('action'),
                method: "POST",
                dataType: "json",
                data: $('.recovery-form').serialize(),
                beforeSend: function () {
                    $(".loader").fadeIn('fast');
                },
                success: function (response) {
                    if (response.type == 'success') {
                        $("#btnSend").empty().html('Enviar código novamente em 00:<span id="contador">30</span>').prop("disabled", true).addClass('disabled');
                        contador();
                    } else {
                        Swal.fire({
                            icon: response.type,
                            text: response.message,
                        });
                    }
                },
                complete: function () {
                    $(".loader").fadeOut('fast');
                }
            });
        }
        e.preventDefault();
    });

    $("#togglePassword").on('click', function (e) {
        const password = $("#senha");
        const type = password.attr('type') === 'password' ? 'text' : 'password';
        password.attr('type', type);
        $(this).toggleClass('fa-eye');
    });

    $('input[name="code"]').on('keyup', function () {
        if ($(this).val().length == $(this).attr('maxlength')) {
            $("#btnConfirm").removeAttr('disabled').removeClass('disabled');
        } else {
            $("#btnConfirm").prop("disabled", true).addClass('disabled');
        }
    });
});

function contador() {
    var timeLeft = 30;
    var timerId = setInterval(countdown, 1000);
    var timestr = 0;
    function countdown() {
        if (timeLeft == -1) {
            clearTimeout(timerId);
            $("#btnSend").removeAttr('disabled').removeClass('disabled').html('Enviar código novamente');
        } else {
            timestr = (timeLeft <= 9) ? "0"+timeLeft : timeLeft;
            $('#contador').html(timestr);
            timeLeft--;
        }
    }
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$.validator.setDefaults({
    onfocusout: function (e) {
        this.element(e);
    },
    onkeyup: false,

    highlight: function (element) {
        $(element).closest('.form-control').addClass('is-invalid');
    },
    unhighlight: function (element) {
        $(element).closest('.form-control').removeClass('is-invalid');
        $(element).closest('.form-control').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group-prepend').length) {
            $(element).siblings(".invalid-feedback").append(error);
            //error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
});