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
                    <h1>Listado de Categoría de los Eventos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Categoría de los Eventos</li>
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
                            <h3 class="card-title">Maneja las categorías de los eventos en esta sección</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre de la Categoría</th>
                                        <th>Icono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                  //  extrater los datos de la base de datos
                                   require('../includes/funciones/bd_conexion.php');
                                   
                                   try {
                                     
                                     $sql ="SELECT * FROM categoria_evento";
      
                                     $resultado = $conn->query($sql);
                                   } catch (\Exception $e){
                                     $error = $e->getMessage();
                                     echo $error;
                                   }
                                   while( $cat_evento = $resultado->fetch_assoc()){ ?>

                                    <tr>
                                        <!-- impresion de los datos en la tabla  -->
                                        <td><?php echo $cat_evento['cat_evento']?></td>
                                        <td><?php echo $cat_evento['icono']?></td>
                                        <td><a  href="editar-categoria.php?id=<?php echo $cat_evento['id_categoria']?>"
                                                class="btn bg-orange btn-flat">
                                                <i class="icon fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="includes/template/eliminar-registro.php?id=<?php echo $cat_evento['id_categoria']?>&tipo=<?php echo 'categoria'?>"
                                                data-id="<?php echo $cat_evento['id_categoria'];?>" data-tipo="categoria"
                                                class="btn bg-maroon btn-flat borrar_registro">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre de la Categoría</th>
                                        <th>Icono</th>
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