<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_users extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'nombre_usuario' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
				'null' => FALSE,
			),

			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
				'null' => FALSE,
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'status' => array(
				'type' => 'TINYINT',
				'default' => TRUE,
				'constraint' => '1',
				'null' => FALSE,
			),
			'range' => array(
				'type' => 'TINYINT',
				'constraint' => '1',
				'null' => TRUE,
			),
		));
		//Clave Primaria
		$this->dbforge->add_key('id', TRUE);
		//Crea la Tabla
		$this->dbforge->create_table('usuarios');
	}

	public function down()
	{
		$this->dbforge->drop_table('usuarios');
	}
}
