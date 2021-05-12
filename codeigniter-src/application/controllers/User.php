<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','email','pagination'));
        $this->load->helper(array('users/users_rules','string'));
       $this->load->model('UserModel');
	}

	public function create()
	{
		$vista = $this->load->view('admin/create_user','',TRUE);
		$this->pageConstruct($vista);
	}
	public function store()
	{
		//Recibimos los datos del formulario
		$nombreUsuario = $this->input->post('nombre_usuario');
        $email = $this->input->post('email');
        $range = $this->input->post('range');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $area = $this->input->post('area');
        $especialidad = $this->input->post('especialidad');
        $cedula = $this->input->post('cedula');

		//Seteamos la validación
		$this->form_validation->set_rules(getCreateUserRules());
		//Ejecutamos la validación
		if($this->form_validation->run() == FALSE){
			//Código de error del header
            $this->output->set_status_header(400);
        }else {
            $userData = array(
                'nombre_usuario' => $nombreUsuario,
                'password' => random_string('alnum',8),
                'email' => $email,
                'range' => $range,
                'status' => 1,
            );
            
            $userInfo = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'especialidad' =>  $especialidad,
                'area' => $area,
            );
            
            
            if(!$this->UserModel->store($userData,$userInfo)){
				//Código de error del header
                $this->output->set_status_header(500);
            }else{
				$this->sendEmail($userData);
				$this->session->set_flashdata('msg','El usuario a sido registrado'); 
                redirect(base_url('user'));
            }

        }
		//
		$vista = $this->load->view('admin/create_user','',TRUE);
        $this->pageConstruct($vista); 
	}

	public function sendEmail(Array $data)
	{
		
		//De donde se enviá
        $this->email->from('baubyte@baubyte.com', 'BAUBYTE');
		//A Donde va
        $this->email->to($data['email']);
		//Asunto
        $this->email->subject('Datos de tu Cuenta');
		//Vista del Template del Email
        $vista = $this->load->view('emails/welcome',$data,TRUE);
		//Seteamos el Mensaje
        $this->email->message($vista);
		//Enviá el email
        $this->email->send();
	}
}
