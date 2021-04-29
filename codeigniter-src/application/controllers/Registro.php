<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['getmenu']);
	}

	public function index()
	{
		$data['menus'] = mainMenu();
		$this->load->view('registro',$data);
	}

	public function create()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		var_dump($this->input->post());
	}
}
