<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Almacen;

class AlmacenController extends BaseController
{
    public function index()
    {
        //$model = new Almacen();
        //$data['articulos'] = $model->findAll();
        return view('almacen');
    }


    public function crear()
    {
        $model = new Almacen();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'marca' => $this->request->getPost('marca'),
            'precio_compra' => $this->request->getPost('precio_compra'),
            'precio_venta' => $this->request->getPost('precio_venta'),
        ];
        $model->insert($data);
        return redirect()->to('almacen');
    }


    public function actualizar($id)
    {
        $model = new Almacen();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'marca' => $this->request->getPost('marca'),
            'precio_compra' => $this->request->getPost('precio_compra'),
            'precio_venta' => $this->request->getPost('precio_venta')
        ];
        $model->update($id, $data);
        return redirect()->to('almacen');
    }

    public function eliminar($id)
    {
        $model = new Almacen();
        $model->delete($id);
        return redirect()->to('almacen');
    }
}
