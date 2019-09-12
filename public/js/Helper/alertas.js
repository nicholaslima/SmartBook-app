	var msg = $('.msg');

	var setMsg = function(mensg,alerta){
		msg.text(mensg);
		msg.removeClass('invisible d-none');
		msg.addClass(alerta);
	}