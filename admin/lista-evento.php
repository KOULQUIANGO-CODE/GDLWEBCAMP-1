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
                    <h1>Listado de Eventos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Eventos</li>
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
                            <h3 class="card-title">Maneja los eventos en esta sección</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Categoría</th>
                                        <th>Invitado</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                  //  extrater los datos de la base de datos
                                   require('../includes/funciones/bd_conexion.php');
                                   
                                   try {
                                     
                                     $sql ="SELECT evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,nombre_invitado,apellido_invitado ";
                                     $sql .= " FROM eventos ";
                                     $sql .= " INNER JOIN categoria_evento ";
                                     $sql .= " ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                                     $sql .= " INNER JOIN invitados ";
                                     $sql .= " ON eventos.id_inv=invitados.invitado_id ";
                                     $sql .= " ORDER BY evento_id ";
      
                                     $resultado = $conn->query($sql);
                                   } catch (\Exception $e){
                                     $error = $e->getMessage();
                                     echo $error;
                                   }
                                   while( $eventos = $resultado->fetch_assoc()){ ?>
                                    <tr>

                                        <!-- impresion de los datos en la tabla  -->
                                        <td><?php echo $eventos['nombre_evento']?></td>
                                        <td><?php echo $eventos['fecha_evento']?></td>
                                        <td><?php echo $eventos['hora_evento']?></td>
                                        <td><?php echo $eventos['cat_evento']?></td>
                                        <td><?php echo $eventos['nombre_invitado'].' '.$eventos['apellido_invitado']?></td>
                                        <td><a href="editar-evento.php?id=<?php echo $eventos['evento_id']?>"
                                                class="btn bg-orange btn-flat">
                                                <i class="icon fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="includes/template/eliminar-registro.php?id=<?php echo $eventos['evento_id']?>&tipo=<?php echo 'evento'?>"
                                                data-id="<?php echo $eventos['evento_id'];?>" data-tipo="evento"
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
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Categoría</th>
                                        <th>Invitado</th>
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