<?php echo $this->extend('panel_template.php') ?>
<?php echo $this->section('contenido')?>
<!-- Page Heading -->
<div id="app">
<div :class="['alert', 'alert-primary', 'rounded-0','fixed-top']" role="alert" id="exito" style="display: none;">
  <p class="m-0"><strong>¡Feliciades!</strong> Se agregó el cliente correctamente</p>
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
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Télefono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for = "cliente in clientes">
                        <td>{{cliente.cliente_id}}</td>
                        <td  class="w-25">{{cliente.nombre}} {{cliente.apellidos}}</td>
                        <td class="w-50">{{cliente.direccion}}</td>
                        <td>{{cliente.telefono}}</td>
                        <td>{{cliente.email}}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
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
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('/js/clientes.js'); ?>"></script>
<?php echo $this->endSection('contenido')?>