<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Empleados;

class EmpleadosController extends BaseController
{
    public function index()
    {
        //$model = new Empleados();
        //$data['articulos'] = $model->findAll();
        return view('empleados');
    }


    public function crear()
    {
        $model = new Empleados();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'cargo' => $this->request->getPost('cargo'),
            'salario' => $this->request->getPost('salario')
        ];
        $model->insert($data);
        return redirect()->to('empleados');
    }


    public function actualizar($id)
    {
        $model = new Empleados();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'cargo' => $this->request->getPost('cargo'),
            'salario' => $this->request->getPost('salario')
        ];
        $model->update($id, $data);
        return redirect()->to('empleados');
    }

    public function eliminar($id)
    {
        $model = new Empleados();
        $model->delete($id);
        return redirect()->to('empleados');
    }
}
