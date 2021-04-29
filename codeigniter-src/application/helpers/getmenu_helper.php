<?php
function mainMenu()
{
	return [
		[	'title' => 'Login',
			'url' => base_url(),
		],
		[	'title' => 'Registro',
			'url' => base_url('/registro'),
		],
	];
}
