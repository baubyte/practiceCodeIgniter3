<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Auth');
		$this->load->library(array('form_validation','session'));
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
			//generamos los datos para sesión
			$data = array(
				'id' => $response->id,
				'range' => $response->range,
				'status' => $response->status,
				'nombre_usuario' => $response->nombre_usuario,
				'is_logged' => TRUE,
			);
			//Establecemos las sesiones
			$this->session->set_userdata($data);
			//establecemos un flash data
			$this->session->set_flashdata('msg','Bienvenido'.$data['nombre_usuario']);
			//generamos la ruta para direccionar
			echo json_encode(array('url'=>base_url('dashboard')));
		}
	}
	public function logout()
	{
		//generamos los datos para sesión
		$data = array(
			'id',
			'range',
			'status',
			'nombre_usuario',
			'is_logged',
		);
		//limpiamos las sesiones
		$this->session->unset_userdata($data);
		//destroy de la sesiones
		$this->session->sess_destroy();
		redirect('login');
	}
}
