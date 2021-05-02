(function($) {
	//Cuando se ejecute el evento submit
	$("#form-login").submit(function(event) {
		//Anulamos el evento por default
		event.preventDefault();
		//Función Ajax
		$.ajax({
			url: 'login/signin',
			type: 'POST',
			data: $(this).serialize(),
			success:function(data) {
				let json = JSON.parse(data);

			},
			error:function(xhr) {
				if (xhr.status == 400) {
					//removemos las clases de invalid
					$("#email > input").removeClass('is-invalid');
					$("#password > input").removeClass('is-invalid');
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
				}else if (xhr.status == 401) {
					let json = JSON.parse(xhr.responseText);
					console.log(json);
				}
			},
		})

	});
})(jQuery)
