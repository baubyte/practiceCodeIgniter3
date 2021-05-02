<!DOCTYPE html>
<html lang="es">

<head>
	<title>Dashboard</title>
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
				<h3>Dashboard</h3>
				<p></p>
			<a href="<?= base_url('login/logout')?>">Cerrar Sesión</a>
			<?php if($dataFlash = $this->session->flashdata('msg')):?>
			<p><?=$dataFlash?></p>
			<?php endif;?>
			</div>
		</div>
	</div>
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
