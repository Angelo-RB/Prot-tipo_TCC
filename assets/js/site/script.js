/**
*
* Script de perfil
*
*
**/
(function($, PATH, Helpers){

	var masks = function(){
		Helpers.cpfMask($('input[name=cpf]'));
	}

	$( document ).ready(function() {
		masks()
	});

})($, PATH, Helpers);