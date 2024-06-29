<?php echo $this->extend('panel_template.php') ?>
<?php echo $this->section('contenido')?>
<h1 class="h3 mb-2 text-gray-800">Ordenes de Trabajo</h1>
<a href="ordenes_trabajo" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#orden_modal">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Nueva Orden</span>
</a>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ordenes de Trabajo</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Numero de Orden</th>
                        <th>Fecha de Entrada</th>
                        <th>Dias transcurridos</th>
                        <th>Técnico a cargo</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Cliente</th>
                        <th>Numero de Orden</th>
                        <th>Fecha de Entrada</th>
                        <th>Dias transcurridos</th>
                        <th>Técnico a cargo</th>
                        <th>Accion</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Juan Pérez</td>
                        <td>12345</td>
                        <td>2024-06-05</td>
                        <td>7</td>
                        <td>Carlos Ramírez</td>
                        <td>
                            <button class="btn btn-primary rounded-0 btn-sm">Editar</button>
                            <button class="btn btn-danger rounded-0 btn-sm">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="orden_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>La nacional</td>
                        <td>Juan Pérez</td>
                        <td class="text-right">
                            <a href="orden" class="btn btn-primary rounded-0 btn-sm">Generar</a>
                        </td>
                    </tr>
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
<script type="text/javascript" src="<?php echo base_url('/js/orden_de_trabajo.js'); ?>"></script>
<?php echo $this->endSection('contenido')?>