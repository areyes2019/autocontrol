<?php echo $this->extend('panel_template.php') ?>
<?php echo $this->section('contenido')?>
 <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Ficha de Trabajo - Taller Mecánico</h3>
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
          <h5 class="card-title mt-4">Datos del Vehículo</h5>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="vehiculoMarca">Marca</label>
              <input type="text" class="form-control" id="vehiculoMarca" placeholder="Marca del Vehículo">
            </div>
            <div class="form-group col-md-6">
              <label for="vehiculoModelo">Modelo</label>
              <input type="text" class="form-control" id="vehiculoModelo" placeholder="Modelo del Vehículo">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="vehiculoAno">Año</label>
              <input type="text" class="form-control" id="vehiculoAno" placeholder="Año del Vehículo">
            </div>
            <div class="form-group col-md-6">
              <label for="vehiculoPlaca">Placa</label>
              <input type="text" class="form-control" id="vehiculoPlaca" placeholder="Placa del Vehículo">
            </div>
          </div>
          <h5 class="card-title mt-4">Revisión de Partes del Automóvil</h5>
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col">Parte</th>
                <th scope="col">Bueno</th>
                <th scope="col">Regular</th>
                <th scope="col">Malo</th>
                <th scope="col">Comentarios</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Motor</td>
                <td><input type="checkbox" name="motor_estado" value="bueno"></td>
                <td><input type="checkbox" name="motor_estado" value="regular"></td>
                <td><input type="checkbox" name="motor_estado" value="malo"></td>
                <td><input type="text" class="form-control" placeholder="Comentarios"></td>
              </tr>
              <tr>
                <td>Frenos</td>
                <td><input type="checkbox" name="frenos_estado" value="bueno"></td>
                <td><input type="checkbox" name="frenos_estado" value="regular"></td>
                <td><input type="checkbox" name="frenos_estado" value="malo"></td>
                <td><input type="text" class="form-control" placeholder="Comentarios"></td>
              </tr>
              <tr>
                <td>Suspensión</td>
                <td><input type="checkbox" name="suspension_estado" value="bueno"></td>
                <td><input type="checkbox" name="suspension_estado" value="regular"></td>
                <td><input type="checkbox" name="suspension_estado" value="malo"></td>
                <td><input type="text" class="form-control" placeholder="Comentarios"></td>
              </tr>
              <tr>
                <td>Neumáticos</td>
                <td><input type="checkbox" name="neumaticos_estado" value="bueno"></td>
                <td><input type="checkbox" name="neumaticos_estado" value="regular"></td>
                <td><input type="checkbox" name="neumaticos_estado" value="malo"></td>
                <td><input type="text" class="form-control" placeholder="Comentarios"></td>
              </tr>
              <tr>
                <td>Sistema Eléctrico</td>
                <td><input type="checkbox" name="electrico_estado" value="bueno"></td>
                <td><input type="checkbox" name="electrico_estado" value="regular"></td>
                <td><input type="checkbox" name="electrico_estado" value="malo"></td>
                <td><input type="text" class="form-control" placeholder="Comentarios"></td>
              </tr>
            </tbody>
          </table>
          <h5 class="card-title mt-4">Inventario de Partes del Vehículo</h5>
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col">Parte</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Bueno</th>
                <th scope="col">Regular</th>
                <th scope="col">Malo</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Espejos</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="espejos_estado" value="bueno"></td>
                <td><input type="checkbox" name="espejos_estado" value="regular"></td>
                <td><input type="checkbox" name="espejos_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Luces</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="luces_estado" value="bueno"></td>
                <td><input type="checkbox" name="luces_estado" value="regular"></td>
                <td><input type="checkbox" name="luces_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Parabrisas</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="parabrisas_estado" value="bueno"></td>
                <td><input type="checkbox" name="parabrisas_estado" value="regular"></td>
                <td><input type="checkbox" name="parabrisas_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Ruedas de Repuesto</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="repuesto_estado" value="bueno"></td>
                <td><input type="checkbox" name="repuesto_estado" value="regular"></td>
                <td><input type="checkbox" name="repuesto_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Batería</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Gato</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Antena</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Tapones</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Triángulos</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Estereo</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Antena</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Herramientas</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Tapetes</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
              <tr>
                <td>Extintor</td>
                <td><input type="number" class="form-control" value="1" min="1"></td>
                <td><input type="checkbox" name="bateria_estado" value="bueno"></td>
                <td><input type="checkbox" name="bateria_estado" value="regular"></td>
                <td><input type="checkbox" name="bateria_estado" value="malo"></td>
              </tr>
            </tbody>
          </table>
          <div class="form-group">
            <label for="notas">Notas Adicionales</label>
            <textarea class="form-control" id="notas" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Guardar Ficha de Trabajo</button>
        </form>
      </div>
    </div>
  </div>

<?php echo $this->endSection('contenido')?>