<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>
<h1 class="text-center">Tabla de Lista de Usuarios</h1>
<table class="table table-bordered table-hover text-center">
  <thead class="table-success">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Estado</th>
      <th scope="col">Rango</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
	<tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <th scope="row"><?= $user->id ?></th>
      <td><?= $user->nombre_usuario ?></td>
      <td><?= $user->email ?></td>
      <td><?= $user->status == 1 ? 'Activo' : 'Inactivo' ?></td>
      <td><?= $user->range == 1 ? 'Usuario' : 'Administrador' ?></td>
      <td>
          <a class="btn btn-warning" href="<?=base_url('usuario/editar/'.$user->id)?>" role="button">Editar</a> | <a class="btn btn-danger" href="#" data-id="<?=$user->id?>" id="delete" role="button">Eliminar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<!-- Generamos los Links de la Paginacion -->
<?= $this->pagination->create_links() ?>
