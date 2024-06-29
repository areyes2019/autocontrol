<?php echo $this->extend('panel_template.php') ?>
<?php echo $this->section('contenido')?>
<div class="container mt-5">
	
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Presupuesto Taller Mecánico</h3>
      </div>
      <div class="card-body">
        <h5 class="card-title">Datos del Cliente</h5>
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="clienteNombre">Nombre</label>
              <input type="text" class="form-control" id="clienteNombre" placeholder="Nombre del Cliente">
            </div>
            <div class="form-group col-md-6">
              <label for="clienteTelefono">Teléfono</label>
              <input type="text" class="form-control" id="clienteTelefono" placeholder="Teléfono del Cliente">
            </div>
          </div>
          <div class="form-group">
            <label for="clienteDireccion">Dirección</label>
            <input type="text" class="form-control" id="clienteDireccion" placeholder="Dirección del Cliente">
          </div>
          <h5 class="card-title mt-4">Detalle de Servicios</h5>
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col">Servicio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Cambio de Aceite</td>
                <td>Cambio de aceite y filtro</td>
                <td>$50.00</td>
              </tr>
              <tr>
                <td>Alineación</td>
                <td>Alineación de las cuatro ruedas</td>
                <td>$30.00</td>
              </tr>
              <tr>
                <td>Revisión de Freno</td>
                <td>Inspección y ajuste de frenos</td>
                <td>$40.00</td>
              </tr>
              <tr>
                <td>Otros</td>
                <td>Diagnóstico general</td>
                <td>$20.00</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2" class="text-right">Total</th>
                <th>$140.00</th>
              </tr>
            </tfoot>
          </table>
          <div class="form-group">
            <label for="notas">Notas Adicionales</label>
            <textarea class="form-control" id="notas" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Aprobar Presupuesto</button>
        </form>
      </div>
    </div>
  </div>
<?php echo $this->endSection('contenido') ?>