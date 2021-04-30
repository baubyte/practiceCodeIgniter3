<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['getmenu', 'url']);
		$this->load->model('User');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['menus'] = mainMenu();
		$this->load->view('login',$data);
	}
	public function signin()
	{
		/**Recibimos los datos */
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		/**Validaciones */
		$config = array(
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
			array(
				'field' => 'password',
				'label' => 'Contraseña ',
				'rules' => 'required|',
				'errors' => array(
					'required' => 'El %s es Obligatorio.',
				),
			),
		);
	}

}
