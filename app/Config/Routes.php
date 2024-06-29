<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->post('authenticate', 'AuthController::authenticate');


$routes->group('', ['filter' => 'auth'], static function ($routes) {
	
	/*LOGIN*/
	$routes->get('logout', 'AuthController::logout');
	$routes->get('dashboard', 'Home::index');
	//clientes 
	$routes->get('clientes', 'ClientesController::index');
	$routes->get('clientes_mostrar', 'ClientesController::mostrar');
	$routes->post('crear_cliente', 'ClientesController::crear');
	$routes->get('actualizar_cliente_formulario/(:num)', 'ClientesController::actualizar_formulario/$1');
	$routes->post('actualizar_cliente', 'ClientesController::actualizar');
	$routes->get('eliminar_cliente/(:num)', 'ClientesController::eliminar/$1');

	//empleados 
	$routes->get('empleados', 'EmpleadosController::index');
	$routes->get('empleados_mostrar', 'EmpleadosController::mostrar');
	$routes->post('crear_empleado', 'EmpleadosController::crear');
	$routes->get('actualizar_empleado_formulario/(:num)', 'EmpleadosController::actualizar_formulario/$1');
	$routes->post('actualizar_empleado', 'EmpleadosController::actualizar');
	$routes->get('eliminar_empleado/(:num)', 'EmpleadosController::eliminar/$1');

	//odenes de trabajo
	$routes->get('ordenes_trabajo', 'OrdenesController::index');
	$routes->get('orden', 'OrdenesController::orden');
	$routes->get('ordenes_mostrar', 'OrdenesController::mostrar');
	$routes->get('crear_orden', 'OrdenesController::crear');
	$routes->post('actualizar_orden', 'OrdenesController::actualizar');
	$routes->get('eliminar_orden', 'OrdenesController::eliminar');


	//inventario
	$routes->get('inventario', 'InventarioController::index');
	$routes->get('crear_inventario', 'InventarioController::crear');
	$routes->post('actualizar_inventario', 'InventarioController::actualizar');
	$routes->get('eliminar_inventario', 'InventarioController::eliminar');

	//marcas y modelos
	$routes->get('marcas', 'MarcasController::index');
	$routes->get('crear_marca', 'MarcasController::crear');
	$routes->post('actualizar_marca', 'MarcasController::actualizar');
	$routes->post('eliminar_marca', 'MarcasController::actualizar');
	$routes->get('crear_modelo', 'MarcasController::crear_modelo');
	$routes->get('actualizar_modelo', 'MarcasController::acualizar_modelo');
	$routes->get('eliminar_modelo', 'MarcasController::eliminar_modelo');

	//presupuestos
	/*$routes->get('presupuestos', 'PresupuestosController::index');
	$routes->get('crear_presupuesto', 'PresupuestosController::crear');
	$routes->post('actualizar_presupuesto', 'PresupuestosController::actualizar');
	$routes->get('eliminar_presupuesto', 'PresupuestosController::eliminar');*/

	//vehiculos
	$routes->get('vehiculos', 'VehiculosController::index');
	$routes->get('crear_vehiculo', 'VehiculosController::crear');
	$routes->post('actualizar_vehiculo', 'VehiculosController::actualizar');
	$routes->get('eliminar_vehiculo', 'VehiculosController::eliminar');

	//vehiculos
	$routes->get('almacen', 'AlmacenController::index');
	$routes->post('crear_almacen', 'AlmacenController::crear');
	$routes->post('actualizar_almacen', 'AlmacenController::actualizar');
	$routes->get('eliminar_almacen', 'AlmacenController::eliminar');

	/*Cotizaciones*/
	$routes->get('presupuestos', 'PresupuestosController::index');
	
	$routes->get('nueva_cotizacion/(:num)', 'PresupuestosController::nueva/$1');
	$routes->get('pagina_presupuesto/(:any)', 'PresupuestosController::pagina/$1');
	$routes->get('editar_cotizacion/(:num)', 'PresupuestosController::editar/$1');
	$routes->get('actualizar_cotizacion/(:num)', 'PresupuestosController::actualizar/$1');
	$routes->get('eliminar_cotizacion/(:num)', 'PresupuestosController::eliminar/$1');
	$routes->post('agregar_articulo', 'PresupuestosController::agregar');
	$routes->get('mostrar_detalles/(:num)', 'PresupuestosController::mostrar_detalles/$1');
	$routes->get('borrar_linea/(:num)', 'PresupuestosController::borrar_linea/$1');
	$routes->get('descargar_cotizacion/(:num)', 'PresupuestosController::cotizacion_pdf/$1');
	$routes->get('enviar', 'PresupuestosController::enviar');
	$routes->get('enviar_pdf/(:num)', 'PresupuestosController::enviar_pdf/$1');
	$routes->post('pago', 'PresupuestosController::pago');
});
