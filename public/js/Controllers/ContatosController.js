var num_email = 0;
var num_telefone = 0;

function ContatosController()
{

	this.qtd_Email = $('#qtd_email');
	this.qtd_telefone = $('#qtd_telefone');

	this.add_email = function(){
		num_email++;
		contagem = num_email;
		var input = '<input type="text" name="email-'+contagem+'" id="email-'+contagem+'" class="form-control-lg form-control my-1" required>';
		$('#p-email').append(input);
		$('#qtd_email').val(contagem);	
	}

	this.excluir_email = function(){
		if(num_email >= 1){
			$("#email-"+num_email).remove();
			num_email--;
			this.qtd_Email.val(num_email);
		}	
	}

	this.add_telefone = function(){
		num_telefone++;
		contagem = num_telefone;
		var input = '<input type="text" name="telefone-'+contagem+'" id="telefone-'+contagem+'" class="form-control-lg form-control my-1" required>';
		$('#p-telefone').append(input);	
		$('#qtd_telefone').val(contagem);
	}

	this.excluir_telefone = function(){
		if(num_telefone >= 1){
			$("#telefone-"+num_telefone).remove();
			num_telefone--;
			this.qtd_telefone.val(num_telefone);
		}	
	}

	this.inserir_telefone = function(){
		num_telefones = this.qtd_telefone.val();

		for(var i = 1;i <= num_telefones; i++){
			
			inputTelefone = $("#telefone-"+i);
			elementoId = $('#id_usuario');
			inputToken = $('input[name=_token]');

			var telefone = {
					id_usuario: elementoId.text(),
					telefone: inputTelefone.val(),
					_token: inputToken.val()
				};

			$.ajax({
				type: "POST",
				url: "/inserir_telefone",
				data: telefone,
				beforeSend:function(){
					console.log("enviando");
				}
			})
			.done(function(){
				console.log("sucesso");
			})
			.fail(function(){
				console.log("falha");
			});		
		}
	}
}