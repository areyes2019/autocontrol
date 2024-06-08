<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Usuarios;

class AlmacenController extends BaseController
{
	public function login()
	{
		$usuario = $this->request->getPost('usuario');
		$password = $this->request->getPost('password');

		$datoUsuario = $usuario->obtenerUsuario(['usuario'=>$usuario]);
		if (count($datoUsuario)>0 && password_verify($password, $datoUsuario[0]['password'])) {
			$data=[
				'usuario'=>$datoUsuario[0]['usuario'],
				'email'=>$datoUsuario[0]['email']
			]
			$session = session();
			$session->set($data);
			return redirect()->to(base_url(''))
		}else{
			return redirect()->to(base_url('/'))->with('mensaje',"1");
		}
	}
}