<div  class="container">
      <h1 class="page-header text-center">Puntuaciones</h1>
      <div class="row">
        <div class="col-sm-12">
        
           <?php 
              session_start();
              if (isset($_SESSION['message'])) {
                ?>
                <div class="alert alert-dismissible alert-success" style="margin-top: 20px;">
                  <button type="button" class="close" data-dismiss="alert" >
                    &times;
                  </button>
                  <?php echo $_SESSION['message']; ?>
                </div>

                <?php 
                unset( $_SESSION['message']);              
              }
           ?>
        <table class="table table-bordered table-striped"  id="MiAgenda" style="margin-top:20px;" >
            <thead>
                <th>ID</th>
                <th>Calificacion</th>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Usuario</th>
                <th>ID_Venta</th>
                <th>Acciones</th>
            </thead>
            <tbody>
              <?php 
                include_once('..\modelo\conexion.php');
                $database = new ConectarDB();
                $db = $database->open();
                try {
                  $sql = 'SELECT * FROM puntuaciones';
                  foreach ($db->query($sql) as $row) {
                  ?>
                  <tr>
                        <td><?php echo $row['id_puntuacion']; ?></td>
                        <td><?php echo $row['calificacion']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['productos_idproducto']; ?></td>
                        <td><?php echo $row['usuarios_id_usuario']; ?></td>
                        <td><?php echo $row['venta_id_venta']; ?></td>
                      <td>
                          <a href="#delete_<?php echo $row['id_puntuacion']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>  </td>
                      <?php include('EliminarModal.php'); ?>
                  </tr>

                  <?php

                  }
                } catch (PDOException $e) {
                  echo 'Hay probleas con la conexion : '.$e->getmessage();
                }
                $database->close();

             ?>
             
            </tbody>
        </table>
     </div>

      </div>

    </div><!-- /.container -->