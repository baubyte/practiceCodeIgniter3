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

	public function getUsers(){
        $query = $this->db->order_by('id','DESC')->get('usuarios'); 
        return $query->result();
    }
	public function getPaginate($limit,$offset){
        $query = $this->db->order_by('id','DESC')->get('usuarios',$limit,$offset);
        return $query->result();
    }
	public function getUser($id){
        // SELECT *
        // FROM usuarios 
        // JOIN medicos 
        //     ON usuarios.id = medicos.usuario_id
        // WHERE usuarios.id = $id LIMIT 1
        $this->db->join('medicos','usuarios.id = medicos.usuario_id');
        $user = $this->db->get_where('usuarios',array('usuarios.id' => $id),1);
        return $user->row_array();
    }

	public function updateUser($id,$data){
        $this->db->where('id',$id);
        $this->db->update('medicos',$data);
    }

	public function deleteUser($id){
		
        $this->db->where('usuario_id',$id);
        $this->db->delete('medicos');
		$this->db->where('id',$id);
        $this->db->delete('usuarios');

    }
}
