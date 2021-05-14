<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation', 'email', 'pagination'));
		$this->load->helper(array('users/users_rules', 'string'));
		$this->load->model('UserModel');
	}

	public function index($offset = 0)
	{
		$users = $this->UserModel->getUsers();
		//Configuración
		$config['base_url'] = base_url('usuarios/listar');
		//Registro por pagina
		$config['per_page'] = 2;
		//Total de registros
		$config['total_rows'] = count($users);

		//Configuracion de los estilos de la paginacion
		$config['full_tag_open'] 	= '<div class="pagination justify-content-center"><nav><ul class="pagination pagination-lg">';
		$config['full_tag_close'] 	= '</ul></nav></div>';
		$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] 	= '</span></li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">Next';
		$config['next_tag_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">Prev';
		$config['prev_tag_close'] 	= '<span aria-hidden="true">&laquo;</span></span></li>';
		$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] 	= '</span></li>';

		//Inicializamos la paginacion
		$this->pagination->initialize($config);
		//Obtenemos los registros para la paginacion
		$usersPage = $this->UserModel->getPaginate($config['per_page'], $offset);

		$view = $this->load->view('admin/show_users', array('users' => $usersPage), TRUE);
		$this->pageConstruct($view);
	}
	public function create()
	{
		$view = $this->load->view('admin/create_user', '', TRUE);
		$this->pageConstruct($view);
	}
	public function store()
	{
		//Recibimos los datos del formulario
		$nombreUsuario = $this->input->post('nombre_usuario');
		$email = $this->input->post('email');
		$range = $this->input->post('range');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$area = $this->input->post('area');
		$especialidad = $this->input->post('especialidad');
		$cedula = $this->input->post('cedula');

		//Seteamos la validación
		$this->form_validation->set_rules(getCreateUserRules());
		//Ejecutamos la validación
		if ($this->form_validation->run() == FALSE) {
			//Código de error del header
			$this->output->set_status_header(400);
		} else {
			$userData = array(
				'nombre_usuario' => $nombreUsuario,
				'password' => random_string('alnum', 8),
				'email' => $email,
				'range' => $range,
				'status' => 1,
			);

			$userInfo = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'cedula' => $cedula,
				'especialidad' =>  $especialidad,
				'area' => $area,
			);


			if (!$this->UserModel->store($userData, $userInfo)) {
				//Código de error del header
				$this->output->set_status_header(500);
			} else {
				$this->sendEmail($userData);
				$this->session->set_flashdata('msg', 'El usuario a sido registrado');
				redirect(base_url('usuarios'));
			}
		}
		//
		$view = $this->load->view('admin/create_user', '', TRUE);
		$this->pageConstruct($view);
	}

	public function sendEmail(array $data)
	{

		//De donde se enviá
		$this->email->from('baubyte@baubyte.com', 'BAUBYTE');
		//A Donde va
		$this->email->to($data['email']);
		//Asunto
		$this->email->subject('Datos de tu Cuenta');
		//Vista del Template del Email
		$view  = $this->load->view('emails/welcome', $data, TRUE);
		//Seteamos el Mensaje
		$this->email->message($view);
		//Enviá el email
		$this->email->send();
	}

	public function edit($id = 0)
	{
		$user = $this->UserModel->getUser($id);
		$view = $this->load->view('admin/edit_user', array('user' => $user), true);
		$this->pageConstruct($view);
	}
	public function update()
	{
		//Para poder Acceder solo por Post
		//if ($this->input->server('REQUEST_METHOD') === 'POST') {
			//Recibimos los datos del formulario
			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');
			$apellido = $this->input->post('apellido');
			$cedula = $this->input->post('cedula');
			$especialidad = $this->input->post('especialidad');
			$area = $this->input->post('area');

			$nombreUsuario = $this->input->post('nombre_usuario');
			//Seteamos la validación
			$this->form_validation->set_rules(getUpdateUserRules());
			//Ejecutamos la validación
			if ($this->form_validation->run() === FALSE) {
				$view = $this->load->view('admin/edit_user', '', true);
				$this->pageConstruct($view);
			} else {
				# actualizar
				// show_404();
				$data = array(
					'nombre' => $nombre,
					'apellido' => $apellido,
					'cedula' => $cedula,
					'especialidad' => $especialidad,
					'area' => $area,
				);
				$this->UserModel->updateUser($id, $data);
				$this->session->set_flashdata('msg', 'El usuario ' . $nombreUsuario . ' fue Actualizado Correctamente');
				redirect('usuarios');
			}
		//}else{
		//	show_404();
		//}
	}
	public function delete()
	{
		$id = $this->input->post('id', true);
		if (empty($id)) {
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array('msg' => 'El id no puede estar vació')));
		} else {
			$this->UserModel->deleteUser($id);
			$this->output->set_status_header(200);
		}
	}
}
