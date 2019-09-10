var num_email = 0;
var num_telefone = 0;

class ContatosController
{
	constructor(){
		this.qtd_Email = $('#qtd_email');
		this.qtd_telefone = $('#qtd_telefone');
	}
	
	add_email(){
		num_email++;
		contagem = num_email;
		var input = '<input type="text" name="email-'+contagem+'" id="email-'+contagem+'" class="form-control-lg form-control my-1" required>';
		$('#p-email').append(input);
		$('#qtd_email').val(contagem);	
	}

	excluir_email(){
		if(num_email >= 1){
			$("#email-"+num_email).remove();
			num_email--;
			this.qtd_Email.val(num_email);
		}	
	}

	add_telefone(){
		num_telefone++;
		contagem = num_telefone;
		var input = '<input type="text" name="telefone-'+contagem+'" id="telefone-'+contagem+'" class="form-control-lg form-control my-1" required>';
		$('#p-telefone').append(input);	
		$('#qtd_telefone').val(contagem);
	}

	excluir_telefone(){
		if(num_telefone >= 1){
			$("#telefone-"+num_telefone).remove();
			num_telefone--;
			this.qtd_telefone.val(num_telefone);
		}	
	}
}