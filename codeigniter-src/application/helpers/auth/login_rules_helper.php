<?php
	/**Retornas las Reglas de Validación para el Login  */
	function getLoginRules()
	{
		/**Validaciones */
		return $config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email|trim',
				'errors' => array(
					'required' => 'El %s es Obligatorio.',
					'valid_email' => 'El %s no es Valido.',
				),
			),
			array(
				'field' => 'password',
				'label' => 'Contraseña ',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'La %s es Obligatorio.',
				),
			),
		);
	}
