<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Clientes;

class ClientesController extends BaseController
{
    public function index()
    {
        return view('clientes');
    }

    public function mostrar()
    {
        $model = new Clientes();
        $resultado = $model->findAll();
        return json_encode($resultado);
    }

    public function crear()
    {
        $model = new Clientes();
        $data = [
            'nombre' => $this->request->getvar('nombre'),
            'apellidos' => $this->request->getvar('apellidos'),
            'direccion' => $this->request->getvar('direccion'),
            'telefono' => $this->request->getvar('telefono'),
            'email' => $this->request->getvar('email')
        ];
                
        
        if ($model->insert($data)) {
            return "1";
        }
        
    }


    public function actualizar($id)
    {
        $model = new Clientes();
         $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email')
        ];
        $model->update($id, $data);
        return redirect()->to('almacen/lista');
    }

    public function eliminar($id)
    {
        $model = new Clientes();
        $model->delete($id);
        return redirect()->to('clientes/lista');
    }
}
