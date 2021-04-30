<?php
class User extends CI_Model{
	
	public function __construct()
	{
		/**Cargamos la librería de base de datos*/
		$this->load->database();
	}

	public function create($data)
	{
		$data =  [
			'nombre_usuario' => $data['nombre_usuario'],
			'email' => $data['email'],
			'password' => $data['password'],
			'range' => 2
		];
		if($this->db->insert('usuarios', $data)){
			return true;
		}
		return false;
	}
}