//Mascara para campos do formulario
$(document).ready(function(){
	$("#cpf").mask("999.999.999-99");
});

$(document).ready(function(){
	$("#cep").mask("99999-999");
});

$(document).ready(function(){
	$("#cel").mask("(99) 99999-9999");
});

//Estrutura da API ViaCEP
const cep = document.querySelector("#cep")

cep.addEventListener("blur",(e)=>{
	var search = cep.value.replace("-","")
	var url = "https://viacep.com.br/ws/"+search+"/json";

	$.ajax({
		url: url,
		type: "get",
		dataType: "json",

		success: function(dados){
			$("#cidade").val(dados.localidade);
			$("#logradouro").val(dados.logradouro);
			$("#bairro").val(dados.bairro);
		}
	})
	})
