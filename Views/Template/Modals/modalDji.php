<!-- Modal -->
<?php $idUsuario = $_SESSION['idUser']; // id del usuario para mostrar los leads de cada vendedor 

$server = 'localhost';
$user = 'root';
$password = '';
$bd = 'dima';

$conexion = new mysqli($server, $user, $password, $bd);

if ($conexion->connect_error) {
  die('Error en la conexion' . $conexion->connect_error);
}

$sql = "SELECT p.idpersona ,CONCAT_WS(' ', p.nombres, p.apellidos) nombre FROM persona p, rol r where r.idrol = p.rolid and r.nombrerol = 'Especialista SIAP'";
$exehb = $conexion->query($sql);

$array = $_SESSION['userData'];



?>

<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="modal-header headerRegister">

        <h5 class="modal-title" id="titleModal">Nuevo Lead </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form id="formUsuario" name="formUsuario" class="form-horizontal">

          <input type="hidden" id="usu_id" name="usu_id">

          <p class="text-primary">Todos los campos son obligatorios <?php echo $array['nombrerol']; ?> </p>



          <div class="form-row">

            <div class="form-group col-md-6">

              <label for="usu_nom">Nombre</label>

              <input type="text" class="form-control valid validText" id="usu_nom" name="usu_nom" required="">

            </div>

            <div class="form-group col-md-6">

              <label for="usu_num">Numero</label>

              <input type="text" class="form-control valid validNumber" id="usu_num" name="usu_num" required="">

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <label for="usu_correo">Correo</label>

              <input type="email" class="form-control " id="usu_correo" name="usu_correo">

            </div>

            <div class="form-group col-md-6">

              <label for="usu_city">Ciudad</label>

              <input type="text" class="form-control" id="usu_city" name="usu_city" required>

            </div>

          </div>

          <!-- <div class="form-row">

                <div class="form-group col-md-12">

                    <label for="est">Status</label>

                    <select class="form-control selectpicker" id="est" name="est" required >

                        <option value="0">Canalizado</option>

                        <option value="1">No canalizado</option>

                        <option value="2">No viable</option>

                        <option value="3">Atendido</option>

                        <option value="4">En demo</option>

                        <option value="5">No compró</option>

                        <option value="6">Compró</option>

                    </select>

                     <table class="table">

                      <thead>

                          <tr>

                            <th>Inicio</th>

                            <th>Contacto</th>

                            <th>Contacto</th>

                            <th>Contacto</th>

                            <th>Contacto</th>

                            <th>Fin</th>

                          </tr>

                        </thead>

                        <tbody>

                          <tr>

                            <td>

                              <div class="form-check">

                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                                <label class="form-check-label" for="flexRadioDefault1">

                                  Inicio

                                </label>

                              </div>

                            </td>

                            <td>

                              <div class="form-check">

                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                                <label class="form-check-label" for="flexRadioDefault1">

                                  1er paso

                                </label>

                              </div>

                            </td>

                            <td>

                              <div class="form-check">

                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                                <label class="form-check-label" for="flexRadioDefault1">

                                  2do paso

                                </label>

                              </div>

                            </td>

                            <td>

                              <div class="form-check">

                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                                <label class="form-check-label" for="flexRadioDefault1">

                                  3er paso

                                </label>

                              </div>

                            </td>

                            <td>

                              <div class="form-check">

                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                                <label class="form-check-label" for="flexRadioDefault1">

                                  4to paso

                                </label>

                              </div>

                            </td>

                            <td>

                              <div class="form-check">

                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                                <label class="form-check-label" for="flexRadioDefault1">

                                  Fin

                                </label>

                              </div>

                            </td>

                          </tr>

                        </tbody>

                    </table>

                    <div class="progress">

                      <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>

                    </div>

                </div>-->



          <!-- </div> -->

          <div class="form-row">

            <div class="form-group col-md-4">

              <label for="usu_maq">Equipo</label>

              <input type="text" class="form-control" id="usu_maq" name="usu_maq">

            </div>

            <div class="form-group col-md-4">

              <label for="usu_cultivo">Tipo de cultivo</label>

              <input type="text" class="form-control" id="usu_cultivo" name="usu_cultivo">

            </div>

            <div class="form-group col-md-4">

              <label for="usu_hec">Numero de hectáreas</label>

              <input type="text" class="form-control" id="usu_hec" name="usu_hec">

            </div>

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">

              <label for="landing_page">Canal</label>

              <input type="text" class="form-control" id="landing_page" name="landing_page" required>

            </div>

            <div class="form-group col-md-6">

              <label for="usu_vendedor">Vendedor</label>

              <select class="form-control" name="usu_vendedor" id="usu_vendedor">




              </select>


              <!--  <input type="text" class="form-control" id="usu_vendedor" name="usu_vendedor"> -->

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



<div class="modal fade" id="modalViewDji" tabindex="-1" role="dialog" aria-hidden="true">

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

              <td>Ciudad:</td>

              <td id="txtCiudad"></td>

            </tr>

            <tr>

              <td>Número de hectáreas:</td>

              <td id="txtHectareas"></td>

            </tr>

            <tr>

              <td>Tipo de cultivo:</td>

              <td id="txtCultivo"></td>

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