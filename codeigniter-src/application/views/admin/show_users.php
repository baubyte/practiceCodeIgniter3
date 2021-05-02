<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>
<h1 class="text-center">Tabla de Lista de Usuarios</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Estado</th>
      <th scope="col">Rango</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
</table>


