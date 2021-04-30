<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['getmenu']);
		$this->load->database();
		$this->load->model('User');
	}

	public function index()
	{
		$data['menus'] = mainMenu();
		$this->load->view('registro',$data);
	}

	public function create()
	{
		$data['menus'] = mainMenu();

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');


		$dataUser = [
			'nombre_usuario' => $username,
			'email' => $email,
			'password' => $cpassword
		];
		/**Usamos el modelo */
		if(!$this->User->create($dataUser)){
			$data['msg']= 'Ocurrió un error al intentar ingresar los datos.';
			$this->load->view('registro',$data);
		}
		$data['msg']= 'Éxito se Registro correctamente.';
		$this->load->view('registro',$data);
	}
}
