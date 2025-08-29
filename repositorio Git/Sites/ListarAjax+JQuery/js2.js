$(document).ready(function(){
    $("form").submit(function() {
        var nome = $('input:first').val();
        if (nome != ""){ 
			alert("Cadastrado com sucesso!"); 	
			return true; 
		}
        else { 
			alert('Preencha o campo nome!'); 
			return false; 
		}
    });
});