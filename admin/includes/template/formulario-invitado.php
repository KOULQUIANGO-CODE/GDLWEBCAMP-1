<?php  
    // variables globales
    // Titulos   
    $tituloFormulario = ($invitado['invitado_id']) ? 'Editar Invitado':'Crear Invitado';
    $tituloFormularioSmall = ($invitado['invitado_id']) ? 'Llena el formulario para editar un invitado':'Llena el formulario para crear un invitado';
    // Fin Titulos

    // Botones
    $btnFormulario = ($invitado['invitado_id']) ? 'Actualizar':'Añadir';
    $accion = ($invitado['invitado_id']) ? 'actualizar':'nuevo';
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
                        <form class="form-horizontal" name="guardar_registro-archivo" id="guardar_registro-archivo"
                             action="includes/models/modelo-invitado.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                
                                <!-- Nombre Invitado -->
                                <div class="form-group row">
                                    <label for="descripcion" class="col-sm-3 col-form-label">Nombre Invitado</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nombreInvitado"
                                            name="nombreInvitado" placeholder="Nombre Invitado"
                                            value="<?php echo ($invitado['invitado_id']) ? $invitado['nombre_invitado']:'';?>" required>
                                    </div>
                                </div>
                                <!-- Fin Nombre Invitado -->

                                <!-- Apellido Invitado -->
                                <div class="form-group row">
                                    <label for="apellidoInvitado" class="col-sm-3 col-form-label">Apellido
                                        Invitado</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="apellidoInvitado"
                                            name="apellidoInvitado" placeholder="Apellido Invitado"
                                            value="<?php echo ($invitado['invitado_id']) ? $invitado['apellido_invitado']:'';?>" required>
                                    </div>
                                </div>
                                <!-- Fin Apellido Invitado -->

                                <!-- Descripcion Invitado -->
                                <div class="form-group row">
                                    <label for="descripcion" class="col-sm-3 col-form-label">Descriptión</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="8"
                                            placeholder="Descriptión" required><?php echo ($invitado['invitado_id']) ? $invitado['descripcion']:'';?></textarea>

                                    </div>
                                </div>
                                <!-- Fin Descripcion Invitado -->

                                <!-- Imagen que se va a mostrar al editar el formulario -->
                                <?php  if($invitado['invitado_id']){?>
                                    <!-- imagen actual Invitado -->
                                    <div class="form-group row">
                                        <label for="imagenActualizar" class="col-sm-3 col-form-label">Imagen Actual</label>
                                        <div class="col-sm-9" >
                                        <img  class="img-invitado" id="imagenActualizar"
                                                name="imagenActualizar" 
                                                src="../img/<?php echo ($invitado['invitado_id']) ? $invitado['url_imagen']:''?>" alt="Imagen">
                                        </div>
                                    </div><!-- fin imagen actual Invitado -->
                                <?php }?>
                                <!-- FIn Imagen que se va a mostrar al editar el formulario -->

                                <!-- Subir Imagen Invitado -->
                                <div class="form-group row">
                                    <label for="imagen" class="col-sm-3 col-form-label">Subir Imagen</label>
                                    <div class="input-group col-sm-9 " >
                                        <div class="custom-file">
                                        <input type="file" name="imagen" class="custom-file-input form-control hover"
                                                id="imagen" required>
                                            <label class="custom-file-label" for="imagen">Seleccionar
                                                Imagen</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Subir Imagen Invitado -->
                                
                                <!-- Botones Formulario -->
                                <div class="card-footer">
                                <input type="hidden" name='img-antigua' value="<?php echo $invitado['url_imagen']?>">
                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                    <input type="hidden" name="registro" value="<?php echo $accion; ?>">
                                    <input type="submit" class="btn btn-info" id="evento"
                                        value="<?php echo $btnFormulario; ?>">
                                    <?php if($id){
                                        echo '<a href="lista-evento.php" class="btn btn-default float-right">Cancelar</a>';
                                    }else
                                    {
                                        echo '<button type="reset" class="btn btn-default float-right">Cancelar</button>';
                                }
                                    ?>
                                </div>
                                <!-- Fin Botones Formulario -->
                                
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