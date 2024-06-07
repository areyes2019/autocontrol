<?php echo $this->extend('panel_template.php') ?>
<?php echo $this->section('contenido')?>
<!-- Page Heading -->
<div id="app">
<div :class="['alert', 'alert-primary', 'rounded-0','fixed-top']" role="alert" id="exito" style="display: none;">
  <p class="m-0"><strong>¡Feliciades!</strong> {{texto_alert}}</p>
</div>
<h1 class="h3 mb-2 text-gray-800 mt-4">Clientes</h1>
<a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#nuevo_cliente">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Nuevo Cliente</span>
</a>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{tabla_titulo}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="clientes" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-3">Nombre</th>
                        <th class="col-sm-6">Dirección</th>
                        <th class="col-sm-3">Télefono</th>
                        <th class="col-sm-1">Correo</th>
                        <th class="col-sm-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for = "cliente in clientes">
                        <td>{{cliente.cliente_id}}</td>
                        <td>{{cliente.nombre}} {{cliente.apellidos}}</td>
                        <td>{{cliente.direccion}}</td>
                        <td>{{cliente.telefono}}</td>
                        <td>{{cliente.email}}</td>
                        <td class="align-items-center">
                            <button class="btn btn-primary btn-circle btn-sm mr-2" @click="mostrar_acutualizar(cliente.cliente_id)">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-circle btn-sm mr-2" @click="advertencia(cliente.cliente_id)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="nuevo_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('crear_cliente');?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" v-model="nombre" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" v-model="apellidos" placeholder="Ingrese su apellido">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" v-model="direccion" placeholder="Ingrese su dirección">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" v-model="telefono" placeholder="Ingrese su teléfono">
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" v-model="email" placeholder="Ingrese su correo electrónico">
            </div>
        </form>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-danger btn-icon-split">
                
            </a>
            <button type="button" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                <span class="icon text-white-50">
                    <i class="fas fa-times-circle"></i>
                </span>
                <span class="text">Cerrar</span>
            </button>
            <button type="button" class="btn btn-primary btn-icon-split" @click="agregar">
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">Guardar</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--  Modal actualizar cliente -->
    <div class="modal fade" id="advertencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-flex justify-content-center">
                    <img src="<?php echo base_url('img/advertencia.png'); ?>" alt="" width="80">
                </div>
                <h2 class="text-center">¡Advertencia!</h2>
                <h4 class="text-center">Si eliminas a este cliente, borrarás todos su vehículos, ordenes de trabajo y presupuestos</h4>
                <h4 class="text-center">¿Deseas continuar?</h4>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary rounded-0" @click="eliminar(cliente)">Continuar</button>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal actualizar -->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('crear_cliente');?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control d-none" id="nombre" v-model="cliente_id" placeholder="Ingrese su nombre">
                <input type="text" class="form-control" id="nombre" v-model="actualizar_nombre" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" v-model="actualizar_apellidos" placeholder="Ingrese su apellido">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" v-model="actualizar_direccion" placeholder="Ingrese su dirección">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" v-model="actualizar_telefono" placeholder="Ingrese su teléfono">
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" v-model="actualizar_email" placeholder="Ingrese su correo electrónico">
            </div>
        </form>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-danger btn-icon-split">
                
            </a>
            <button type="button" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                <span class="icon text-white-50">
                    <i class="fas fa-times-circle"></i>
                </span>
                <span class="text">Cerrar</span>
            </button>
            <button type="button" class="btn btn-primary btn-icon-split" @click="acutalizar">
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">Guardar</span>
            </button>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('/js/clientes.js'); ?>"></script>
<?php echo $this->endSection('contenido')?>