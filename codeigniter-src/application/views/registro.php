<!DOCTYPE html>
<html lang="es">

<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fontawesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<!-- Bootswatch Darkly Theme -->
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="container-fluid">
    <!-- Titulo de Pagina -->
    <div class="row">
        <div class="col-12 text-center">
            <h1>Registro</h1>
        </div>
    </div>
	<div class="row">
	<div class="col-md-3">
	<ul>
		<?php foreach($menus as $menu): ?>
			<li><a href="<?=$menu['url']?>"><?=$menu['title']?></a></li>
		<?php endforeach;?>
	</ul>
	</div>
	<div class="col-md-6">
	<?php if (isset($msg)):?>
		<div class="alert alert-success" role="alert">
		  <h4 class="alert-heading"></h4>
		  <p><?=$msg?></p>
		  <p class="mb-0"></p>
		</div>
	<?php endif;?>
		<?php echo form_open('registro/create',['method' => 'post']);?>
		<div class="form-group">
		<?php	echo form_label('Nombre de Usuario'); ?>
		</div>
		<div class="form-group">
		<?php echo form_input('username'); ?>
		</div>
		<div class="form-group">
		<?php	echo form_label('Email'); ?>
		</div>
		<div class="form-group">
		<?php	echo form_input(['type' => 'email', 'name' => 'email']);?>
		</div>
		<div class="form-group">
		<?php	echo form_label('Contraseña'); ?>
		</div>
		<div class="form-group">
		<?php	echo form_password('password');?>
		</div>
		<div class="form-group">
		<?php	echo form_label('Confirmar Contraseña'); ?>
		</div>
		<div class="form-group">
		<?php	echo form_password('cpassword');?>
		</div>
		<div class="form-group">
		<?php	echo form_submit('submit','Registrarme','class = "btn btn-success"');?>
		</div>
		<?php echo form_close();?>
	</div>
	<div class="col-md-3">
	</div>
	</div>
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
