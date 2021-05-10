<?php
if(!function_exists('getUpdateUserRules')){
    function getUpdateUserRules(){
        return array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                )
            ),
            array(
                'field' => 'apellido',
                'label' => 'Apellido',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es requeridos.',
                )
            ),
            array(
                'field' => 'area',
                'label' => 'Area',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es requerida.',
                )
            ),
            array(
                'field' => 'especialidad',
                'label' => 'Especialidad',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'La %s es requerida.',
                )
            ),
            array(
                'field' => 'cedula',
                'label' => 'Cedula',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'La %s es requerida.',
                )
            ),
        );
    }
}
if(!function_exists('getCreateUserRules')){
    function getCreateUserRules(){
        return array(
            array(
                'field' => 'nombre_usuario',
                'label' => 'Usuario',
                'rules' => 'required|max_length[100]',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                    'max_length' => 'El %s es demaciado grande'
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|trim',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                    'valid_email' => 'El %s tiene que contener una email valido',
                )
            ),
            array(
                'field' => 'range',
                'label' => 'Rango',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                )
            ),
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                )
            ),
            array(
                'field' => 'apellido',
                'label' => 'Apellido',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                )
            ),
            array(
                'field' => 'area',
                'label' => 'Area',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerida.',
                )
            ),
            array(
                'field' => 'especialidad',
                'label' => 'Especialidad',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'La %s es requerida.',
                )
            ),
            array(
                'field' => 'cedula',
                'label' => 'Cedula',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'La %s es requerida.',
                )
            ),
        );
    }
}
