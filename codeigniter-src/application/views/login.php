<!DOCTYPE html>
<html lang="es">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fontawesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<!-- Bootswatch Darkly Theme -->
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

<div class="row">
<div class="col-md-6 mx-auto">
  <div class="card card-body mt-5">
     <h3>Iniciar Sesión</h3>
     <p>Ingrese su Usuario y Contraseña</p>
     <form action="<?= base_url('/login/signin')?>" method="post">
        <div class="form-group">
           <label for="name">Email: <sup>*</sup></label>
           <input type="email" name="email" class="form-control">
		   <span class="invalid-feedback">
			</span>
        </div>
        <div class="form-group">
           <label for="name">Contraseña: <sup>*</sup></label>
           <input type="password" name="password" class="form-control">
        </div>
        <div class="row">
           <div class="col">
              <input type="submit" value="Iniciar Sesión" class="btn btn-success btn-block"/>
           </div>
           <div class="col">
              <a href="" class="btn btn-light btn-block">Registrarse</a>
           </div>
        </div>
     </form>
  </div>
</div>
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	<!-- Scripts -->
	<script src="<?=base_url('assets/js/auth/login.js')?>"></script>
</body>

</html>
