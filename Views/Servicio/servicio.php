<?php 

    headerAdmin($data); 

    getModal('modalServicio',$data);

?>

  <main class="app-content">    

      <div class="app-title">

        <div>

            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>

                <?php if($_SESSION['permisosMod']['w']){ ?>

                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo servicio</button>

               

              <?php } ?>

            </h1>

            

        </div>

        

        <ul class="app-breadcrumb breadcrumb">

          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/servicio"><?= $data['page_title'] ?></a></li>

        </ul>

      </div>

        <div class="row">

            <div class="col-md-12">

              <div class="tile">

                <div class="tile-body">

                  <div class="table-responsive">

                    <table class="table table-hover table-bordered" id="tableServicio">

                      <thead>

                        <tr>

                          <th>Fecha</th>

                          <th>Estatus</th>

                          <th>Factura</th>

                          <th>jd link</th>

                          <th>Sucursal</th>

                          <th>Nombre</th>

                          <th>Telefono</th>

                          <th>Ciudad</th>

                          <th>Serie</th>

                          <th>Modelo</th>

                          <th>Division</th>

                          <th>Usuario</th>

                          <th>Desc</th>

                          <th>Comentarios</th>

                          <th>Subtotal</th>

                          <th>Acciones</th>

                        </tr>

                      </thead>

                      <tbody class="tbody">

                        <td style="padding: 20px;"></td>

                        <?php 

                          if('est' == 8) {?>

                           <tr class="table-info"> </tr>;

                          

                        <?php }?>

                      </tbody>

                    </table>

                  </div>

                </div>

              </div>

            </div>

        </div>

    </main>

<?php footerAdmin($data); ?>

    