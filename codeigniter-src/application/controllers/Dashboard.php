<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
	}

	public function index()
	{
		if ($this->session->userdata('is_logged')) {
			$this->load->view('dashboard');
		}else {
			show_404();
		}

	}
}
