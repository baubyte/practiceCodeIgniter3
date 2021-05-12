 <!-- aside -->
 <nav class="col-md-2 d-none d-md-block bg-light sidebar">
 	<style>
 		.sidebar-sticky {
 			position: -webkit-sticky;
 			position: sticky;
 			top: 78px;
 			height: calc(100vh - 78px);
 			padding-top: .5rem;
 			overflow-x: hidden;
 			overflow-y: auto;
 		}
 	</style>
 	<div class="sidebar-sticky" style="margin-top: 1em;">
 		<!-- FLASHDATA -->
 		<?php if ($dat = $this->session->flashdata('msg')) : ?>
 		<?php endif; ?>
 		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
 			<a href="<?=base_url('user') ?>" class="nav-link <?= $this->uri->segment(2) == '' || $this->uri->segment(1) == 'user' &&  $this->uri->segment(2) == 'index' ? 'active' : ''; ?>">Usuarios</a>
 			<a href="<?=base_url('user/create') ?>" class="nav-link <?= $this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'store' ? 'active' : ''; ?>">Alta Usuario</a>
 		</div>
 	</div>
 </nav>
