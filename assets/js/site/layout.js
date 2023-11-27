/**
*
*Script do layout
*
*
**/


(function($, PATH, Helpers){

	var hamburguer = function() {
		$('body').on('click', '.hamburguer', function() {
			$('.links').toggle();
		})
	}

	$(document).ready(function() {
		hamburguer();
	})
})($, PATH, Helpers)