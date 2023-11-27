(function($, PATH, Helpers){

	var submitContact = function(){

		$('body').on('click', '#btnSubmitContact', function(){

			var name = $('input[name="name"]').val();
			var email = $('input[name="email"]').val();
			var phone = $('input[name="phone"]').val();
			var message = $('textarea[name="message"]').val();

			if(name == ''){
				swal({
					title:'Erro!',
					text: 'Preencha seu nome!',
					type: 'error'
				});
				return false;
			}
			if(email == ''){
				swal({
					title:'Erro!',
					text: 'Preencha seu email!',
					type: 'error'
				});
				return false;
			}
			if(phone == ''){
				swal({
					title:'Erro!',
					text: 'Preencha seu telefone!',
					type: 'error'
				});
				return false;
			}
			if(message == ''){
				swal({
					title:'Erro!',
					text: 'Preencha o seu motivo de contato!',
					type: 'error'
				});
				return false;
			}
			swal({
				title:'Sucesso!',
				text: 'Tudo foi preenchido com Sucesso!',
				type: 'success'
			});
			return true;
		});

	}

	$( document ).ready(function(){
		submitContact();
	});
})($, PATH, Helpers)