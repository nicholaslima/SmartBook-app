	
function Alertas(){
	var msg = $('.msg');

	this.setMsg = function(mensg,alerta){
		msg.text(mensg);
		msg.toggleClass('invisible');
		msg.slideDown();
		msg.toggleClass(alerta);

		setTimeout(function(){
			msg.toggleClass('invisible '+alerta);	
			},5000)
	}
}
	