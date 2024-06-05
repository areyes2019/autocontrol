<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//clientes 
$routes->get('clientes', 'ClientesController::index');
$routes->get('clientes_mostrar', 'ClientesController::mostrar');
$routes->post('crear_cliente', 'ClientesController::crear');
$routes->post('actualizar_cliente', 'ClintesController::actualizar');
$routes->get('eliminar_cliente', 'ClintesController::eliminar');//clientes 

//odenes de trabajo
$routes->get('ordenes_trabajo', 'OrdenesController::index');
$routes->get('ordenes_mostrar', 'OrdenesController::mostrar');
$routes->get('crear_orden', 'OrdenesController::crear');
$routes->post('actualizar_orden', 'OrdenesController::actualizar');
$routes->get('eliminar_orden', 'OrdenesController::eliminar');

//empleados
$routes->get('empleados', 'EmpleadosController::index');
$routes->get('empleados_mostrar', 'EmpleadosController::mostrar');
$routes->get('crear_empleado', 'EmpleadosController::crear');
$routes->post('actualizar_empleado', 'EmpleadosController::actualizar');
$routes->get('eliminar_empleado', 'EmpleadosController::eliminar');

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
$routes->get('presupuestos', 'PresupuestosController::index');
$routes->get('crear_presupuesto', 'PresupuestosController::crear');
$routes->post('actualizar_presupuesto', 'PresupuestosController::actualizar');
$routes->get('eliminar_presupuesto', 'PresupuestosController::eliminar');

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