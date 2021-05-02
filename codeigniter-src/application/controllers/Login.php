<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Auth');
		$this->load->library('form_validation');
		$this->load->helper(['auth/login_rules']);
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function signin()
	{
		/**Cambiamos los delimitadores de error por defecto de CodeIgniter */
		$this->form_validation->set_error_delimiters('','');
		/**Recibimos los datos */
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		//Reglas
		$rules = getLoginRules();
		//Aplicamos la reglas
		$this->form_validation->set_rules($rules);
		//Validamos
		if ($this->form_validation->run() === FALSE) {
			//Array con los errores
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password'),
			);
			//Código de error del header
			$this->output->set_status_header(400);
			//Devolvemos los errores en JSON
			echo json_encode($errors);
		}else {
			if(!$response = $this->Auth->signin($email,$password)){
				//Código de error del header
				$this->output->set_status_header(401);
				echo json_encode(array('msg'=>'Ups, Verifica los Datos Ingresados'));
				exit;
			}
			echo json_encode(array('msg'=>'Éxito Ingresaste'));
		}


	}

}
