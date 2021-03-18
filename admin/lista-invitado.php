<?php 
    include_once 'includes/function/sessiones.php';
  include_once 'includes/template/header.php';
  include_once 'includes/template/barra.php';
  include_once 'includes/template/nav.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de Invitados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Invitados</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Maneja los invitados en esta sección</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                  //  extrater los datos de la base de datos
                                   require('../includes/funciones/bd_conexion.php');
                                   
                                   try {
                                     
                                     $sql ="SELECT * FROM invitados";
      
                                     $resultado = $conn->query($sql);
                                   } catch (\Exception $e){
                                     $error = $e->getMessage();
                                     echo $error;
                                   }
                                   while( $invitado = $resultado->fetch_assoc()){ ?>
                                    <tr>

                                        <!-- impresion de los datos en la tabla  -->
                                        <td><?php echo $invitado['nombre_invitado']?></td>
                                        <td><?php echo $invitado['apellido_invitado']?></td> 
                                        <td><?php echo $invitado['descripcion']?></td>
                                        <td><img class="img-invitado" src="../img/<?php echo $invitado['url_imagen']?>" alt="<?php echo $invitado['nombre_invitado'].''.$invitado['apellido_invitado']?>"></td>
                                        <td><a href="editar-invitado.php?id=<?php echo $invitado['invitado_id']?>"
                                                class="btn bg-orange btn-flat">
                                                <i class="icon fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="includes/template/eliminar-registro.php?id=<?php echo $invitado['invitado_id']?>&tipo=<?php echo 'invitado'?>&img=<?php echo $invitado['url_imagen']?>"
                                                data-id="<?php echo $invitado['invitado_id'];?>" data-tipo="invitado" data-img="<?php echo $invitado['url_imagen'];?>"
                                                class="btn bg-maroon btn-flat borrar_registro">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                                <tfoot>

                                    <tr>
                                    <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Descripción</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
  include_once 'includes/template/footer.php';
?>