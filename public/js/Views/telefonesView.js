function telefonesView()
{
	this.getLinha = function(telefone)
	{
		return `<li class="list-group-item text-capitalize d-flex justify-content-between">
					<div>
						<b>telefone:</b>`+telefone.telefone+ 
					`</div>
			<div>
				<div class="btn btn-primary" data-toggle="modal" data-target="#modal-excluir-telefone">deletar</div>

				<div class="modal fade" id="modal-excluir-telefone">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<p class="modal-title">exclusão</p>
							</div>
							<div class="modal-body">
								<p class="modal-title">confirma exclusão do telefone?</p>
							</div>
							<div class="modal-footer">
								<div class="btn btn-primary deletar_telefone" id="id_telefone_<?php echo $telefone->id ?>" data-toggle="modal" data-target="#modal-excluir-telefone">deletar
									<p class="d-none invisible"> `+telefone.id_usuario+
					`</p>
								</div>
								<button class="btn btn-dark  col-md-2" data-dismiss="modal">fechar</button>
							</div>
						</div>
					</div>
				</div>
				<div class="btn btn-dark" id="atualizar">atualizar</div>
			</div>
		</li>`;
	}
}

