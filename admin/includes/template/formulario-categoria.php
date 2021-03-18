<?php
    // variables globales
    // Titulos   
    $tituloFormulario = ($categoria['id_categoria']) ? 'Editar Categoría del Evento':'Crear Categoría del Evento';
    $tituloFormularioSmall = ($categoria['id_categoria']) ? 'Llena el formulario para editar la categoría del evento':'Llena el formulario para crear una categoría del evento';
    // Fin Titulos

    // Botones
    $btnFormulario = ($categoria['id_categoria']) ? 'Actualizar':'Añadir';
    $accion = ($categoria['id_categoria']) ? 'actualizar':'nuevo';
    // Fin Botones
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $tituloFormulario; ?></h1>
                    <small><?php echo $tituloFormularioSmall; ?></small>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
                        <li class="breadcrumb-item active"><?php echo $tituloFormulario; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="row">
            <div class="col-md-8">
                <!-- Main content -->
                <section class="content">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $tituloFormulario; ?></h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Formulario -->
                        <form class="form-horizontal" name="guardar_registro" id="guardar_registro" method="post"
                            action="includes/models/modelo-categoria.php">

                            <!-- card-body -->
                            <div class="card-body">

                                <!-- Nombre Categoría -->
                                <div class="form-group row">
                                    <label for="nombre_categoria" class="col-sm-3 col-form-label">Nombre categoría del
                                        evento:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nombre_categoria"
                                            name="nombre_categoria" placeholder="Nombre categoría del evento"
                                            value="<?php echo ($categoria['id_categoria']) ? $categoria['cat_evento']:'';?>" required>
                                    </div>
                                </div>
                                 <!-- Fin Nombre Categoría -->

                               <!-- Icono Categoría -->
                               <div class="form-group row">
                                    <label for="icono" class="col-sm-3 col-form-label">icono:</label>
                                    <div class="col-sm-9 input-group">
                                        <div class="input-group-append input-group-addon ">
                                            <div class="input-group-text"><i  aria-hidden="true" ></i></div>
                                        </div>
                                        <input type="text" id="icono" name="icono" class="form-control" placeholder="Click para seleccionar un icono" autocomplete="off" value="<?php echo ($categoria['id_categoria']) ? $categoria['icono']:'';?>" required>
                                    </div>
                                </div>
                                <!-- Fin Icono Categoría -->

                            </div>
                            <!-- Fin card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="hidden" name="registro" value="<?php echo $accion; ?>">
                                <input type="submit" class="btn btn-info" id="evento"
                                    value="<?php echo $btnFormulario; ?>">
                                <?php if($id){
                                        echo '<a href="lista-categoria.php" class="btn btn-default float-right">Cancelar</a>';
                                    }else
                                    {
                                        echo '<button type="reset" class="btn btn-default float-right">Cancelar</button>';
                                }
                                    ?>

                            </div>
                            <!-- /.card-footer -->
                        </form>
                        <!-- Fin Formulario -->
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->