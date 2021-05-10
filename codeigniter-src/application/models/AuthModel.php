<?php
class AuthModel extends CI_Model{
	
	public function __construct()
	{
		/**Cargamos la librería de base de datos*/
		$this->load->database();
	}
	public function signin($email, $password)
	{
		$query = $this->db->get_where('usuarios', array('email' => $email, 'password' => $password),1);
		if (!$query->result()) {
			return false;
		}
		return $query->row();
	}
}
