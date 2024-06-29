<?php echo $this->extend('panel_template.php') ?>
<?php echo $this->section('contenido')?>
<h1 class="h3 mb-2 text-gray-800">Presupuestos</h1>
<a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#pesupuesto_modal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Nuevo Presupuesto</span>
</a>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Presupuestos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Numero WhatsApp</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Numero WhatsApp</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($cotizaciones as $data): ?>
                    <tr>
                        <td><?php echo $data['nombre'] ?></td>
                        <td><?php echo $data['telefono'] ?></td>
                        <td><?php echo $data['fecha_creacion'] ?></td>
                        <td>Enviada</td>
                        <td>
                            <a href="<?php echo base_url('eliminar_cotizacion/'.$data['presupuesto_id']); ?>" class="btn btn-sm rounded-0 my-btn-danger" onclick="return confirm('Esta eliminación no se puede revertir, ¿Deseas continuar?');">Eliminar</a>
                            <a href="<?php echo base_url('pagina_cotizador/'.$data['presupuesto_id']); ?>" class="btn btn-sm rounded-0 my-btn-success">Ediar</a>
                        </td>
                    </tr>
                    <?php endforeach ?> 
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="pesupuesto_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="modal_clientes" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Crear</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td class="w-50"><?php echo $cliente['nombre'] ?> <?php echo $cliente['apellidos'] ?></td>
                        <td class="text-right">
                            <a href="/nueva_cotizacion/<?php echo $cliente['cliente_id']?>"  class="my-btn-primary p-1">Crear</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    
                </tbody>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
      </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('#modal_clientes').DataTable();
    });
</script>
<script type="text/javascript" src="<?php echo base_url('/js/presupuestos.js'); ?>"></script>
<?php echo $this->endSection('contenido')?>