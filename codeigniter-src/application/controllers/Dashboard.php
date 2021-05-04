<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('is_logged')) {
			$vista = $this->load->view('admin/show_users','',TRUE);
            $this->pageConstruct($vista);
		}else {
			show_404();
		}

	}

}
