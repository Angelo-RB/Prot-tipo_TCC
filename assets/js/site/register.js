(function($, PATH, Helpers){

	const checkValues = function(){
		let email = $("#email").val()
		let emailConfirm = $("#emailConfirm").val()

		let password = $("#password").val()
		let passwordConfirm = $("#passwordConfirm").val()

		let phoneLength = $("#phone").val().length

		if(email != emailConfirm){
			swal({
				type: "warning", 
				title: "Cadastro de Usuário",
				text: "Os E-mails devem ser iguais"
			})
			return false
		}

		if(password != passwordConfirm){
			swal({
				type: "warning", 
				title: "Cadastro de Usuário",
				text: "As Senhas devem ser iguais"
			})
			return false
		}

		if(phoneLength != 15){
			swal({
				type: "warning", 
				title: "Cadastro de Usuário",
				text: "Telefone incompleto"
			})
			return false
		}

		return true
	}

	const registerUser = function(){
		$("form#CadastroForm").submit(function(e){
			let form = this;
			e.preventDefault()			

			if(checkValues()){
				$("#loader-overlay").fadeIn(500, () => {

					$.ajax({
						url: PATH + "/registerUser", 
						type: "post",
						datatype: "json",
						data: $(form).serialize()
					}).then((response) => {
						$("#loader-overlay").fadeOut()
						if(response) {
							window.location.href = PATH + "/"
						}else {
							swal({
								type: "error", 
								title: "Cadastro de Usuário",
								text: "Ocorreu algum erro inesperado em seu cadastro"
							})
						}
					})
					.catch((error) => {
						console.log(error)
						$("#loader-overlay").fadeOut()

						let json = JSON.parse(error.responseText);
						if(json && json.error == "E-mail já existente"){

							swal({
								type: "warning",
								title: "Cadastro de Usuário",
								text: "Já existe este e-mail no sistema"
							})

						} else {

							swal({
								type: "error", 
								title: "Cadastro de Usuário",
								text: "Ocorreu algum erro inesperado em seu cadastro"
							})
						}

					})
				})
			}
		})
	}

	$(document).ready(function() {
		registerUser()
        Helpers.phoneMask()
	})

})($, PATH, Helpers)