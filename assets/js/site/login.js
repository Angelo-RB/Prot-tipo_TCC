(function ($, PATH, Helpers) {

    const loginUser = function () {
        $("form#LoginForm").submit(function (e) {
            let form = this;
            e.preventDefault()

            $("#loader-overlay").fadeIn(500, () => {

                $.ajax({
                    url: PATH + "/loginUser",
                    type: "post",
                    dataType: "json",
                    data: $(form).serialize()
                }).then((response) => {
                    $("#loader-overlay").fadeOut()
                    console.log(response)
                    if (response.response) {
                        window.location.href = PATH + "/"
                    } else {
                        swal({
                            type: "warning",
                            title: "Login de Usuário",
                            text: "Login ou senha incorretos"
                        })
                    }
                })
                    .catch((error) => {
                        console.log(error)
                        $("#loader-overlay").fadeOut()
                        swal({
                            type: "error",
                            title: "Login de Usuário",
                            text: "Ocorreu algum erro inesperado em seu login"
                        })
                    })
            })

        })
    }

    $(document).ready(function () {
        loginUser()
    })

})($, PATH, Helpers)