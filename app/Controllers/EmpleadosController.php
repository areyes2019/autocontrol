<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Empleados;

class EmpleadosController extends BaseController
{
    public function index()
    {
        return view('empleados');
    }

    public function mostrar()
    {
        $model = new Empleados();
        $resultado = $model->findAll();
        return json_encode($resultado);
    }

    public function crear()
    {
        $model = new Empleados();
        $data = [
            'nombre' => $this->request->getvar('nombre'),
            'apellidos' => $this->request->getvar('apellidos'),
            'direccion' => $this->request->getvar('direccion'),
            'telefono' => $this->request->getvar('telefono'),
            'email' => $this->request->getvar('email'),
            'cargo' => $this->request->getvar('cargo'),
            'salario' => $this->request->getvar('salario'),
        ];
                
        
        if ($model->insert($data)) {
            return "1";
        }
        
    }


    public function actualizar_formulario($id)
    {
        
        $query = new Empleados();
        $query->where('empleado_id',$id);
        $resultado = $query->findAll();

        return json_encode($resultado);

    }
    public function actualizar()
    {
        

        $model = new Empleados();
        $data = [
            'nombre' => $this->request->getvar('nombre'),
            'apellidos' => $this->request->getvar('apellidos'),
            'direccion' => $this->request->getvar('direccion'),
            'telefono' => $this->request->getvar('telefono'),
            'email' => $this->request->getvar('email'),
            'cargo' => $this->request->getvar('cargo'),
            'salario' => $this->request->getvar('salario'),
        ];
        $id = $this->request->getvar('empleado_id');
        if ($model->update($id,$data)) {
            return "1";
        }
    }
    public function eliminar($id)
    {
        $model = new Empleados();
        $model->delete($id);
    }
}

