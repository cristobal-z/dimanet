<!-- Modal -->

<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header headerRegister">

        <h5 class="modal-title" id="titleModal">Nuevo Lead</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form id="formUsuario" name="formUsuario" class="form-horizontal">

          <input type="hidden" id="usu_id" name="usu_id">

          <p class="text-primary">Todos los campos son obligatorios.</p>



          <div class="form-row">

            <div class="form-group col-md-4">

              <label for="usu_nom">Nombre</label>

              <input type="text" class="form-control valid validText" id="usu_nom" name="usu_nom" required="">

            </div>

            <div class="form-group col-md-4">

              <label for="usu_num">Numero de telefono</label>

              <input type="text" class="form-control valid validNumber" id="usu_num" name="usu_num" required="">

            </div>

            <div class="form-group col-md-4">
              <label for="usu_correo">Correo</label>

              <input type="email" class="form-control " id="usu_correo" name="usu_correo">

            </div>



          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <label for="usu_correo">Sucursal</label>

              <select class="form-control" name="usu_sucursal" id="usu_sucursal">
                <option value="Acayucan">Acayucan</option>
                <option value="Campeche">Campeche</option>
                <option value="Cancun">Cancun</option>
                <option value="Comitan">Comitan</option>
                <option value="Isla">Isla</option>
                <option value="Merida">Merida</option>
                <option value="Tapachula">Tapachula</option>
                <option value="Tierra blanca">Tierra blanca</option>
                <option value="Tizimin">Tizimin</option>
                <option value="Tuxtepec">Tuxtepec</option>
                <option value="Tuxtla">Tuxtla</option>
                <option value="Veracruz">Veracruz</option>
                <option value="Villa hermosa">Villa hermosa</option>
                <option value="Zapata">Zapata</option>
                
              </select>

            </div>

            <div class="form-group col-md-6">

              <label for="usu_city">Ciudad</label>

              <input type="text" class="form-control" id="usu_city" name="usu_city" required>

            </div>

          </div>


          <div class="form-row">

            <div class="form-group col-md-4">

              <label for="usu_serie">Numero de serie del equipo</label>

              <input type="text" class="form-control" id="usu_serie" name="usu_serie" required="">

            </div>

            <div class="form-group col-md-4">

              <label for="usu_part">Numero de parte</label>

              <input type="text" class="form-control" id="usu_part" name="usu_part" required="">

            </div>

            <div class="form-group col-md-4">

              <label for="usu_descrip">Descripción de parte</label>

              <input type="text" class="form-control" id="usu_descrip" name="usu_descrip" required="">

            </div>

          </div>



          <div class="form-row">

            <div class="form-group col-md-3">

              <label for="usu_division">Division</label>

              <input type="text" class="form-control" id="usu_division" name="usu_division" required="">

            </div>

            <div class="form-group col-md-3">

              <label for="usu_canal">Canal</label>

              <input type="text" class="form-control" id="usu_canal" name="usu_canal" required>

            </div>

            <div class="form-group col-md-3">

              <label for="usu_vendedor">Vendedor</label>

              <input type="text" class="form-control" id="usu_vendedor" name="usu_vendedor">

            </div>

            <div class="form-group col-md-3">

              <label for="usu_total">Total de la venta</label>

              <input type="text" class="form-control valid validNumber" id="usu_total" placeholder="$" name="usu_total">

            </div>

          </div>



          <div class="form-row">

            <div class="form-group col-md-12">

              <label for="usu_cmt">Comentarios</label>

              <textarea type="text" class="form-control" id="usu_cmt" name="usu_cmt"></textarea>

            </div>

          </div>

          <div class="tile-footer">

            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;

            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>





<!--View--->



<div class="modal fade" id="modalViewRefacciones" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header header-primary">

        <h5 class="modal-title" id="titleModal">Datos del contacto</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <table class="table table-bordered">

          <tbody>

            <tr>

              <td>Equipo:</td>

              <td id="txtEquipo"></td>

            </tr>

            <tr>

              <td>Estatus:</td>

              <td id="txtStatus"></td>

            </tr>

            <tr>

              <td>Nombre:</td>

              <td id="txtNombre"></td>

            </tr>

            <tr>

              <td>Correo:</td>

              <td id="txtCorreo"></td>

            </tr>

            <tr>

              <td>Telefono:</td>

              <td id="txtTelefono"></td>

            </tr>

            <tr>

              <td>Numero de parte:</td>

              <td id="txtParte"></td>

            </tr>

            <tr>

              <td>Descripcion de la refaccion:</td>

              <td id="txtRefaccion"></td>

            </tr>

            <tr>

              <td>Numero de serie del equipo:</td>

              <td id="txtSerie"></td>

            </tr>

            <tr>

              <td>División:</td>

              <td id="txtDivision"></td>

            </tr>

            <tr>

              <td>Ciudad:</td>

              <td id="txtCiudad"></td>

            </tr>



            <tr>

              <td>Campaña:</td>

              <td id="txtCampaña"></td>

            </tr>

            <tr>

              <td>Vendedor:</td>

              <td id="txtVendedor"></td>

            </tr>

            <tr>

              <td>Comentarios:</td>

              <td id="txtComentarios"></td>

            </tr>



          </tbody>

        </table>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>

    </div>

  </div>

</div>