<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_medicos extends CI_Migration
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
            'usuario_id' => array(
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
			),
			'nombre' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			),
			'apellido' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			),
			'area' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			),
			'especialidad' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			),
			'cedula' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE,
			),
			'status' => array(
				'type' => 'TINYINT',
				'default' => TRUE,
				'constraint' => '1',
				'null' => FALSE,
			),
			'CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT'
		));
		//Clave Primaria
		$this->dbforge->add_key('id', TRUE);
		//Crea la Tabla
		$this->dbforge->create_table('medicos');
	}

	public function down()
	{
		$this->dbforge->drop_table('medicos');
	}
}
