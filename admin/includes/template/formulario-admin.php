<?php
    // variables globales
    // Titulos   
    $tituloFormulario = ($admin['id_admin']) ? 'Editar Administrador':'Crear Administrador';
    $tituloFormularioSmall = ($admin['id_admin']) ? 'Llena el formulario para editar un administrador':'Llena el formulario para crear un administrador';
    // Fin Titulos
    
    // Botones
    $btnFormulario = ($admin['id_admin']) ? 'Actualizar':'Añadir';
    $accion = ($admin['id_admin']) ? 'actualizar':'nuevo';
    //Fin Botones
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
                        <form class="form-horizontal" name="form-admin" id="form-admin" method="post"
                            action="includes/models/modelo-admin.php">

                            <!-- card-body -->
                            <div class="card-body">

                                <!-- Nombre Administrador -->
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Nombre"
                                            value="<?php echo ($admin['id_admin']) ? $admin['nombre']:'';?>" required>
                                    </div>
                                </div>
                                <!-- Fin Nombre Administrador -->

                                <!-- Usuario Administrador -->
                                <div class="form-group row">
                                    <label for="usuario" class="col-sm-3 col-form-label">Usuario:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="usuario" name="usuario"
                                            placeholder="Usuario"
                                            value="<?php echo ($admin['id_admin']) ? $admin['usuario']:'';?>" required>
                                    </div>
                                </div>
                                <!-- Usuario Administrador -->

                                <!-- Contraseña Administrador -->
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Contraseña:</label>
                                    <div class="col-sm-9 validar-estado ">
                                        <input type="password" class="form-control " id="password" name="password"
                                            placeholder="Contraseña" required>
                                        <i class="validarEstado fas "></i>
                                        <p class="col-sm-12" style="display:none"><b>La contraseña debe ser de 8 a 12
                                                caracteres</b></p>
                                    </div>
                                </div>
                                <!-- Fin Contraseña Administrador -->

                                <!-- Confirmar Contraseña Administrador -->
                                <div class="form-group row">
                                    <label for="conf-password" class="col-sm-3 col-form-label">Confirmar
                                        Contraseña:</label>
                                    <div class="col-sm-9 validar-estadoconf">
                                        <input type="password" class="form-control " id="conf-password"
                                            name="conf-password" placeholder="Repita la Contraseña" required>
                                        <i class="validarEstadoconf error fas "></i>
                                        <p class="col-sm-12" style="display:none"><b>La contraseñas no coinciden</b></p>
                                    </div>
                                </div>
                                <!-- Fin Confirmar Contraseña Administrador -->
                            </div>
                            <!-- Fin card-body -->

                            <!-- Botones del formulario -->
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="hidden" name="registro" value="<?php echo $accion; ?>">
                                <input type="submit" class="btn btn-info" id="crearAdmin"
                                    value="<?php echo $btnFormulario; ?>" disabled="true">
                                <?php if($id){
                                        echo '<a href="lista-admin.php" class="btn btn-default float-right">Cancelar</a>';
                                    }else
                                    {
                                        echo '<button type="reset" class="btn btn-default float-right">Cancelar</button>';
                                }
                                    ?>

                            </div>
                            <!-- Fin Botones del formulario -->

                        </form>
                        <!-- FIn Formulario -->
                        
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->