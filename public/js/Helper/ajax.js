

function ajax(){

	var enviando = function(){
		var icone = '<i class="fa fa-spinner fa-spin mr-1"></i>';
		btnInserir.prepend(icone);
		textoBtnInserir.text('enviando');
	}


	this.post = function(url,data){
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			beforeSend: function(){
				enviando();
			}
		})
	}

}