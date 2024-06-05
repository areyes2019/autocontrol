<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Inventario;

class InventarioController extends BaseController
{
    public function index()
    {
        $model = new Inventario();
        $data['articulos'] = $model->findAll();
        return view('inventario/lista', $data);
    }


    public function crear()
    {
        $model = new Inventario();
        $data = [
            'producto_id' => $this->request->getPost('nombre')
            'tipo_movimiento' => $this->request->getPost('descripcion')
            'cantidad' => $this->request->getPost('marca')
            'fecha' => $this->request->getPost('precio_compra')
            'empleado_id' => $this->request->getPost('precio_venta')
        ];
        $model->insert($data);
        return redirect()->to('inventario/lista');
    }


    public function actualizar($id)
    {
        $model = new Inventario();
        $data = [
            'nombre' => $this->request->getPost('nombre')
            'descripcion' => $this->request->getPost('descripcion')
            'marca' => $this->request->getPost('marca')
            'precio_compra' => $this->request->getPost('precio_compra')
            'precio_venta' => $this->request->getPost('precio_venta')
        ];
        $model->update($id, $data);
        return redirect()->to('inventario/lista');
    }

    public function eliminar($id)
    {
        $model = new Inventario();
        $model->delete($id);
        return redirect()->to('inventario/lista');
    }
}
