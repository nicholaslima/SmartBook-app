
var num = 1;

$('#add-email').click(function(){
	contagem = num++;
	var input = '<input type="text" name="email-'+contagem+'" id="email-'+contagem+'" class="form-control-lg form-control my-1" required>';
	$('#p-email').append(input);
	$('#qtd_email').val(contagem);	
});

$('#excluir-email').click(function(){
	$("#email-"+contagem).remove();
	contagem--;
	$('#qtd_email').val(contagem);	
});



var num_tel = 1;

function add_telefones(num_tel){
	
};

$('#add-telefone').click(function(){
	contagem_tel = num_tel++;
	var input = '<input type="text" name="telefone-'+contagem_tel+'" id="telefone-'+contagem_tel+'" class="form-control-lg form-control my-1" required>';
	$('#p-telefone').append(input);	
	$('#qtd_telefone').val(contagem_tel);
});

$('#excluir-telefone').click(function(){
	$("#telefone-"+contagem_tel).remove();
	contagem_tel--;
	$('#qtd_telefone').val(contagem_tel);
});



$('#inserir-telefone').click(function(){
	var url = '/inserir_telefone';

	for(var i = 0 ; i <= qtd_numeros;i++){
		var numero = 'numero-'+i;

	}

	$.ajax({
		type: 'post',
		url: url,
		data: {

		},
		beforeSend: function(){

		}
	})
	.done(function(){
		alert('enviado com sucesso');
	})
	.fail(function(){
		alert('erro ao enviar os dados')
	})
})
