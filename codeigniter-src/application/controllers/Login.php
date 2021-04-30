<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->load->helper(['auth/login_rules']);
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function signin()
	{
		/**Recibimos los datos */
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		//Reglas
		$rules = getLoginRules();
		//Aplicamos la reglas
		$this->form_validation->set_rules($rules);
		//Validamos
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login');
		}else {
			# code...
		}


	}

}
