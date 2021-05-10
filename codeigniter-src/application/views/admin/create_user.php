<form action="<?= base_url('user/store') ?>" method="POST">
	<h3>Datos de la Cuenta</h3>
	<hr>
	<div class="form-group">
        <div class="form-row">
        		<div class="col-7">
        			<label for="">Nombre Usuario</label>
        			<input type="text" name="nombre_usuario" class="form-control" placeholder="Inserte nombre de usuario" value="<?= set_value('nombre_usuario') ?>">
					<div class="text-danger"><?= form_error('nombre_usuario') ?></div>
        		</div>
        		<div class="col">
        			<label for="">Email</label>
        			<input type="text" name="email" class="form-control" placeholder="email@mail.com" value="<?= set_value('email') ?>">
					<div class="text-danger"><?= form_error('email') ?></div>
        		</div>
        		<div class="col">
        			<label for="">Rango de Usuario</label>
        			<select name="range" class="custom-select">
        				<option selected value="">Seleccione el rango</option>
        				<option <?= set_value('range') == '2' ? 'selected' : ''; ?> value="2">Administrador</option>
        				<option <?= set_value('range') == '1' ? 'selected' : ''; ?> value="1">Usuario</option>
        			</select>
					<div class="text-danger"><?= form_error('range') ?></div>
        		</div>
        	</div>
        	<br>
        	<h3>Información del usuario</h3>
        	<hr>
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Nombre(s)</label>
        			<input name="nombre" class="form-control" type="text" placeholder="Inserte su nombre" value="<?= set_value('nombre') ?>">
					<div class="text-danger"><?= form_error('nombre') ?></div>
        		</div>
        		<div class="col">
        			<label for="">Apellidos</label>
        			<input name="apellido" class="form-control" type="text" placeholder="Inserten sus apellidos" value="<?= set_value('apellido') ?>">
					<div class="text-danger"><?= form_error('apellido') ?></div>
        		</div>
        		<div class="col">
        			<label for="">Area</label>
        			<select name="area" class="custom-select">
        				<option selected value="">Seleccione el Area</option>
        				<option <?= set_value('area') == 'Medicina general' ? 'selected' : ''; ?> value="Medicina general">Medicina general</option>
        				<option <?= set_value('area') == 'Genetica' ? 'selected' : ''; ?> value="Genetica">Genética</option>
        				<option <?= set_value('area') == 'Clinica del higado' ? 'selected' : ''; ?> value="Clinica del higado">Clínica del hígado</option>
        			</select>
					<div class="text-danger"><?= form_error('area') ?></div>
        		</div>
        	</div>
    </div>
    <div class="form-group">
    	<div class="form-row">
    		<div class="col-7">
    			<label for="">Especialidad</label>
    			<input name="especialidad" type="text" class="form-control" placeholder="Ingrese la especialidad" value="<?= set_value('especialidad') ?>">
				<div class="text-danger"><?= form_error('especialidad') ?></div>
				
    		</div>
    		<div class="col-5">
    			<label for="">Cédula</label>
				<input name="cedula" type="text" class="form-control" placeholder="XXXXXXXXX-X" value="<?= set_value('cedula') ?>">
				<div class="text-danger"><?= form_error('cedula') ?></div>
			</div>
    	</div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Dar de Alta Usuario">
    </div>
</form>
