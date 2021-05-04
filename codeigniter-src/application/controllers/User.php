<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function create()
	{
		$vista = $this->load->view('admin/create_user','',TRUE);
		$this->pageConstruct($vista);
	}
}
