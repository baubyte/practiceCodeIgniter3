<?php
class UserModel extends CI_Model{
	
	public function __construct()
	{
		/**Cargamos la librería de base de datos*/
		$this->load->database();
	}

	/**
	 * Undocumented function
	 *
	 * @param Array $data
	 * @return void
	 */
	public function create(Array $data)
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
	/**
	 * Undocumented function
	 *
	 * @param Array $user
	 * @param Array $userInfo
	 * @return void
	 */
	public function store(Array $userData = null, Array $userInfo = null)
	{
		//Usamos transacciones para empaquetar la ejecución
		$this->db->trans_start();
			$this->db->insert('usuarios',$userData); 
			//Capturamos el id del usuario  de esa transacción
			$userInfo['usuario_id'] = $this->db->insert_id();
			//Insertamos los datos
			$this->db->insert('medicos',$userInfo);
		$this->db->trans_complete();
		//Si la transacción esta todo bien
		return !$this->db->trans_status() ? false : true;
	}
}
