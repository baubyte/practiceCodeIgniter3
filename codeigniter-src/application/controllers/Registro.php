<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registro extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['getmenu']);
		$this->load->model('User');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['menus'] = mainMenu();
		$this->load->view('registro', $data);
	}

	public function create()
	{
		$data['menus'] = mainMenu();

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');

		/**Validaciones */
		$config = array(
			array(
				'field' => 'username',
				'label' => 'Nombre de Usuario',
				'rules' => 'required|alpha_numeric_spaces',
				'errors' => array(
					'required' => 'El %s es Obligatorio.',
					'alpha_numeric_spaces' => 'El %s solo permite Letras.',
				),
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[usuarios.email]',
				'errors' => array(
					'required' => 'El %s es Obligatorio.',
					'valid_email' => 'El %s no es Valido.',
					'is_unique' => 'Ya Existe un Usuario Registrado con ese Email.'
				),
			),
		);

		/**Seteamos las Reglas */
		$this->form_validation->set_rules($config);
		/**Comprobamos las Validaciones */
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('registro',$data);
		}
		else
		{
			$dataUser = [
				'nombre_usuario' => $username,
				'email' => $email,
				'password' => $cpassword
			];
			/**Usamos el modelo */
			if (!$this->User->create($dataUser)) {
				$data['msg'] = 'Ocurrió un error al intentar ingresar los datos.';
				$this->load->view('registro', $data);
			}
			$data['msg'] = 'Éxito se Registro correctamente.';
			$this->load->view('registro', $data);
		}
	}
}
