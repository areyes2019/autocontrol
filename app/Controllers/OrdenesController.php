<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Ordenes;

class OrdenesController extends BaseController
{
    public function index()
    {
        //$model = new Ordenes();
        //$data['Ordenes'] = $model->findAll();
        return view('ordenes_de_trabajo');
    }


    public function crear()
    {
        $model = new Ordenes();
        $data = [
            'fecha_ingreso' => $this->request->getPost('fecha_ingreso'),
            'fecha_salida' => $this->request->getPost('fecha_salida'),
            'vehiculo_id' => $this->request->getPost('marca'),
            'cliente_id' => $this->request->getPost('precio_compra'),
            'empleado_id' => $this->request->getPost('precio_venta'),
            'mecanico_id' => $this->request->getPost('precio_venta'),
        ];
        $model->insert($data);
        return redirect()->to('ordenes');
    }


    public function actualizar($id)
    {
        $model = new Almacen();
        $data = [
            'fecha_ingreso' => $this->request->getPost('fecha_ingreso'),
            'fecha_salida' => $this->request->getPost('fecha_salida'),
            'vehiculo_id' => $this->request->getPost('marca'),
            'cliente_id' => $this->request->getPost('precio_compra'),
            'empleado_id' => $this->request->getPost('precio_venta'),
            'mecanico_id' => $this->request->getPost('precio_venta'),
        ];
        $model->update($id, $data);
        return redirect()->to('ordenes');
    }

    public function eliminar($id)
    {
        $model = new Ordenes();
        $model->delete($id);
        return redirect()->to('ordenes');
    }
}
