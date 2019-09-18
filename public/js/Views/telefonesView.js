function TelefonesView()
{
	this.getLinha = function(telefone)
	{
		return `<li class="list-group-item text-capitalize d-flex justify-content-between">
			<div class="d-flex row justify-content-between flex-fill">
				<b class="item-telefone">telefone:</b>
				<p class="telefone">`+telefone.telefone+`</p> 
			</div>
		</li>`;
	}
}

