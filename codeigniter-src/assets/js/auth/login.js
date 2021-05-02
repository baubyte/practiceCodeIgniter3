(function($) {
	//Cuando se ejecute el evento submit
	$("#form-login").submit(function(event) {
		//dejamos el alert en blanco
		$("#alert").html("");
		//removemos las clases de invalid
		$("#email > input").removeClass('is-invalid');
		$("#password > input").removeClass('is-invalid');
		//Función Ajax
		$.ajax({
			url: 'login/signin',
			type: 'POST',
			data: $(this).serialize(),
			success:function(data) {
				let json = JSON.parse(data);
				//redireccionamos
				window.location.replace(json.url);

			},
			statusCode:{
				400: function (xhr) {
					let json = JSON.parse(xhr.responseText);
					//Verificamos si hay datos de error para el email
					if (json.email.length != 0){
						$("#email > span").html(json.email);
						//cambiamos la clase al input
						$("#email > input").addClass('is-invalid');
					}
					//Verificamos si hay datos de error para el password
					if (json.password.length != 0){
						$("#password > span").html(json.password);
						//cambiamos la clase al input
						$("#password > input").addClass('is-invalid');
					}
				},
				401: function (xhr) {
					let json = JSON.parse(xhr.responseText);
					$("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg +'</div>');
					//console.log(json);
				},
			},
		});
		//Anulamos el evento por default
		event.preventDefault();
	});
})(jQuery)
