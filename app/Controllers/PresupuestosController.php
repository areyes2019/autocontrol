<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Presupuestos;
use App\Models\Clientes;
use App\Models\Servicios;

class PresupuestosController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('presupuestos');
        $builder->join('clientes','clientes.cliente_id = presupuestos.cliente_id');
        $resultado = $builder->get()->getResultArray();
        
        //return json_encode($resultado);
        $cliente = new Clientes();
        $data['cotizaciones'] = $resultado;
        $data['clientes']  = $cliente->findAll();
        return view('presupuestos', $data);
    }
    public function nueva($id)
    {
        //vamops a guardar un slgu y un cliente

        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 12;
        $slug = substr(str_shuffle($caracteres_permitidos), 0, $longitud);

        $hoy = date("Y-m-d");
        $caduca = date("Y-m-d",strtotime($hoy."+ 30 days"));
        $nuevo_registro = new Presupuestos();
        $data=[
            'cliente_id'=>$id,
            'slug'=>$slug,
            'fecha_creacion'=>$hoy,
            'validez'=>$caduca
        ];
        $nuevo_registro->insert($data);
        return redirect()->to(base_url('pagina_presupuesto/'.$slug));
        
    }
    public function pagina($slug)
    {
        //vamos a buscar la cotizacion
        
        $cliente = new Presupuestos();
        $cliente->where('slug',$slug);
        $resultado = $cliente->findAll();

        $id = $resultado[0]['slug'];
        $cotizacion = $resultado[0]['presupuesto_id'];

        //buscamos los articulos
        $articulos = new Servicios();
        
        $db = \Config\Database::connect();
        $builder = $db->table('presupuestos');
        $builder->where('slug',$id);
        $builder->join('clientes','clientes.cliente_id = presupuestos.cliente_id');
        $query['cliente'] = $builder->get()->getResultArray();
        $query['id_cotizacion']= $cotizacion;
        $query['articulo'] = $articulos->findAll();

        return view('presupuesto', $query);
        
    }
    public function editar()
    {
        return view('Panel/editar_cotizacion');
    }
    public function agregar()
    {
        $db = \Config\Database::connect();
        $query = new Servicios();
        $model = new Detalle_pre();

        $request = \Config\Services::Request();
        $articulo = $request->getvar('servicio_id');
        $cantidad = $request->getvar('cantidad');
        $cotizacion = $request->getvar('presupuesto_id');
        
        //verificamos si el producto ya esta agregado
        $doble = $db->table('detalles_de_presupuesto');
        $doble->where('presupuesto_id',$cotizacion);
        $doble->where('servicio_id',$articulo);
        $es_duplicado = $doble->countAllResults();

        //return json_encode($es_duplicado);
        
        if ($es_duplicado > 0) {
            //esta duplicado
            return "1";
        }else{

            //sacar el precio
            $query->where('servicio_id',$articulo);
            $resultado = $query->findAll();

            $precio = $resultado[0]['precio_pub'];
            $total = $precio * $cantidad;
            $inversion = $resultado[0]['precio_prov'] * $cantidad;
            
            $data = [
                'id_articulo' => $request->getvar('id_articulo'),
                'cantidad' => $request->getvar('cantidad'),
                'p_unitario'=>$precio,
                'total'=>$total,
                'id_cotizacion'=>$cotizacion,
                'inversion'=>$inversion
            ];

            $model->insert($data);

            //actualizamos el total
            $builder = $db->table('sellopro_detalles');
            $builder->where('id_cotizacion',$cotizacion);
            $builder->selectSum('total');
            $sum = $builder->get()->getResultArray();
            $suma_total = $sum[0]['total'];
            $total = new Presupuestos();
            $datos=[
                'total'=>$suma_total,
            ];
            $total->update($cotizacion,$datos);


        }


    }
    /*public function mostrar_detalles($id)
    {
        //encontrar el articulo completo
        $db = \Config\Database::connect();
        $builder = $db->table('sellopro_detalles');
        $builder->where('id_cotizacion',$id);
        $builder->join('sellopro_articulos','sellopro_articulos.idArticulo = sellopro_detalles.id_articulo');
        $resultado = $builder->get()->getResultArray();

        //mostrar totales
        $total = new CotizacionesModel();
        $total->where('idQt',$id);
        $suma_total = $total->findAll();
        $porcenteje = 16;
        $monto = $suma_total[0]['total'];
        $abono = $suma_total[0]['pago'];
        $iva = number_format($monto*($porcenteje/100),2);
        $pago_total =round($monto+$iva);
        
        if ($monto == 0 & $abono == 0 ) {
            //esto es si no ha pagado nada
            $debe = 0;
        }else if($monto > 0 & $abono < $monto){
            //esto es si ya abono algo
            $debe = 1;
        }else if($pago_total == $abono){
            //esto es pagado total
            $debe = 3;
        }

        $saldo = $pago_total - $suma_total[0]['pago'];

        //mostramos el beneficio
        $beneficio = new DetalleModel();
        $beneficio->where('id_cotizacion',$id);
        $beneficio->selectSum('inversion');
        $beneficio->selectSum('total');
        $inversion = $beneficio->findAll();

        $gasto = $inversion[0]['inversion'];
        $cobro = $inversion[0]['total'];
        $utilidad = $cobro - $gasto;
        
        $data=[
            'articulo'=>$resultado,
            'sub_total'=> number_format($monto,2),
            'iva'=> $iva,
            'total'=>number_format($pago_total,2),
            'abono'=>number_format($suma_total[0]['pago'],2),
            'saldo'=>number_format($saldo,2),
            'debe'=>$debe,
            'sugerido'=>number_format($pago_total / 2,2),
            'utilidad'=>number_format($utilidad,2)
        ];

        return json_encode($data);
        
    }
    public function borrar_linea($id)
    {
        $db = \Config\Database::connect();
        $modelo = new DetalleModel();

        //sacamos el numero de cotizacion
        $modelo->where('idDetalle',$id);
        $ver_modelo = $modelo->findAll();

        $numero = $ver_modelo[0]['id_cotizacion'];

        $modelo->delete($id);

        //actualizamos el total
        $builder = $db->table('sellopro_detalles');
        $builder->where('id_cotizacion',$numero);
        $builder->selectSum('total');
        $sum = $builder->get()->getResultArray();

        $suma_total = $sum[0]['total'];
        $total = new CotizacionesModel();
        $datos=[
            'total'=>$suma_total,
        ];
        $total->update($numero,$datos);

    }
    public function eliminar($id)
    {
        $db = \Config\Database::connect();

        $modelo = new CotizacionesModel();
        $modelo->delete($id);

        $builder = $db->table('sellopro_detalles');
        $builder->where('id_cotizacion',$id);
        $builder->delete();

        return redirect()->to('/cotizaciones');

    }
    public function cotizacion_pdf($id)
    {
        $db = \Config\Database::connect();

        //datos del cliente
        $cliente_query = new CotizacionesModel();
        $cliente_query->where('idQt',$id);
        $resultado_cotizacion = $cliente_query->findAll();

        $cliente = new ClientesModel();
        $cliente->where('idCliente',$resultado_cotizacion[0]['cliente']);
        $resultado = $cliente->findAll();

        //mostrar los articulos
        $builder = $db->table('sellopro_detalles');
        $builder->where('id_cotizacion',$id);
        $builder->join('sellopro_articulos','sellopro_articulos.idArticulo = sellopro_detalles.id_articulo');
        $resultado_lineas = $builder->get()->getResultArray();

        //sacamos los totales 

        //actualizamos el total
        $sum = $db->table('sellopro_detalles');
        $sum->where('id_cotizacion',$id);
        $sum->selectSum('total');
        $result = $sum->get()->getResultArray();
        $total_sum = $result[0]['total'];
        $porcenteje = 16;
        $iva = $total_sum*($porcenteje/100);
        $total = $total_sum + $iva; 
            

        $data = [
            'cliente'=>$resultado,
            'id_cotizacion'=>$resultado_cotizacion,
            'detalles'=>$resultado_lineas,
            'sub_total'=>$total_sum,
            'iva'=>$iva,
            'total'=>$total,
        ];
        //return view('Panel/PDF',$data);
        $doc = new Dompdf();
        $html = view('Panel/PDF',$data);
        //return $html;
        $doc->loadHTML($html);
        $doc->setPaper('A4','portrait');
        $doc->render();
        $doc->stream("QT-".$id.".pdf");
    }
    public function enviar_pdf($id)
    {
        $db = \Config\Database::connect();

        //datos del cliente
        $cliente_query = new CotizacionesModel();
        $cliente_query->where('idQt',$id);
        $resultado_cotizacion = $cliente_query->findAll();

        $cliente = new ClientesModel();
        $cliente->where('idCliente',$resultado_cotizacion[0]['cliente']);
        $resultado = $cliente->findAll();

        //mostrar los articulos
        $builder = $db->table('sellopro_detalles');
        $builder->where('id_cotizacion',$id);
        $builder->join('sellopro_articulos','sellopro_articulos.idArticulo = sellopro_detalles.id_articulo');
        $resultado_lineas = $builder->get()->getResultArray();

        //sacamos los totales 

        //actualizamos el total
        $sum = $db->table('sellopro_detalles');
        $sum->where('id_cotizacion',$id);
        $sum->selectSum('total');
        $result = $sum->get()->getResultArray();
        $total_sum = $result[0]['total'];
        $porcenteje = 16;
        $iva = $total_sum*($porcenteje/100);
        $total = $total_sum + $iva; 
            

        $data = [
            'cliente'=>$resultado,
            'id_cotizacion'=>$resultado_cotizacion,
            'detalles'=>$resultado_lineas,
            'sub_total'=>$total_sum,
            'iva'=>$iva,
            'total'=>$total,
        ];
        //return view('Panel/PDF',$data);
        $doc = new Dompdf();
        $html = view('Panel/PDF',$data);
        //return $html;
        $doc->loadHTML($html);
        $doc->setPaper('A4','portrait');
        $doc->render();
        $salida = $doc->output();
        $nombre = "QT-".$id.".pdf";
        $email = \Config\Services::email();
        $email->setFrom('ventas@sellopronto.com.mx','Sello Pronto');
        $email->setTo('reyesabdias@gmail.com');
        $email->setSubject('Cusrsos');
        $email->setMessage('Este es un mensaje de prueba');
        $email->attach('img/40.png');
        $email->send();
    }
    public function pago()
    {
        //Traemos lo que viene en el input
        $request = \Config\Services::Request();
        $id_cotizacion = $request->getvar('id');
        $monto = $request->getvar('pago');
        

        //verifciamos si hay dinero en el campo pago
        $query = new CotizacionesModel();
        $query->where('idQt',$id_cotizacion);
        $resultado = $query->findAll();
        $hay_pago = $resultado[0]['pago'];

        //return json_encode($monto);

        if ($hay_pago == 0) {
            $data=[
                'pago'=>$monto,
            ];
            $query->update($id_cotizacion,$data);
            
        }else{
            $abono = $hay_pago + $monto;
            $data=[
                'pago'=>$abono,
            ];
            $query->update($id_cotizacion,$data);
        }

    }*/
}