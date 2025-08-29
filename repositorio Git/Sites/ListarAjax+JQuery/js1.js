//Desativar de caracteres inválido no campo texto 
$(document).ready(function() {	
	$('input.txtQtde').keydown(function(e) { 
		if (e.keyCode != 8 && e.keyCode != 0 && (e.keyCode < 48 || e.keyCode > 57)){
			return false; 
		} 
	});
});