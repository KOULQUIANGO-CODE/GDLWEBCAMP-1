<?php   
    // variables globales
    // Titulos
    $tituloFormulario = ($evento['evento_id']) ? 'Editar Evento':'Crear Evento';
    $tituloFormularioSmall = ($evento['evento_id']) ? 'Llena el formulario para editar un evento':'Llena el formulario para crear un evento';
    // Fin Titulos
    
    // Botones
    $btnFormulario = ($evento['evento_id']) ? 'Actualizar':'Añadir';
    $accion = ($evento['evento_id']) ? 'actualizar':'nuevo';
    //Fin Botones

    // Hora Formateda
    $hora = $evento['hora_evento']; 
    $horaFormateada = ($evento['evento_id']) ? date('G:i:a',strtotime($hora)):'';
    //Fin Hora Formateda

    // Fecha Formateda
    $fecha =$evento['fecha_evento']; 
    $fechaFormateada = ($evento['evento_id']) ? date('m-d-Y',strtotime($fecha)):'';
    //Fin Fecha Formateda
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
                        <!-- form start -->
                        <form class="form-horizontal" name="guardar_registro" id="guardar_registro" method="post"
                            action="includes/models/modelo-evento.php">
                            <!-- card-body -->
                            <div class="card-body">
                                <!-- Titulo Eventos -->
                                <div class="form-group row">
                                    <label for="tituloEvento" class="col-sm-3 col-form-label">Titulo Evento:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tituloEvento" name="tituloEvento"
                                            placeholder="Titulo Evento" value="<?php echo ($evento['evento_id']) ? $evento['nombre_evento']:'';?>" required>
                                    </div>
                                </div>
                                <!-- Fin Titulo Eventos -->

                                <!-- Seleccionar Categoria Eventos -->
                                <div class="form-group row">
                                    <label for="categoria" class="col-sm-3 col-form-label">Categoría:</label>
                                    <div class="col-sm-9" >
                                        <select name="categoria_evento" class="form-control select2" id="categoria" required>
                                            <option value="0">--Seleccione--</option>
                                            <!-- consulta a la base de datos  -->
                                            <?php 
                                            try{
                                                $categoria_actual = $evento['id_cat_evento'];
                                                $sql = "SELECT * FROM categoria_evento";
                                                $resultado = $conn->query($sql);
                                                while($cat_evento = $resultado->fetch_assoc()){
                                                    if($cat_evento['id_categoria'] === $evento['id_cat_evento']){?>
                                                        <option value="<?php echo $cat_evento['id_categoria']?>" selected>
                                                        <?php echo $cat_evento['cat_evento']?>
                                                    </option>
                                                    <?php }else{?>
                                                        <option value="<?php echo $cat_evento['id_categoria']?>" >
                                                        <?php echo $cat_evento['cat_evento']?>
                                                    </option>
                                                    <?php }
                                            
                                                }
                                            }catch(\Exception $e){
                                                echo 'error'. $e->getMessage();
                                            }
                                                ?>
                                            <!-- Fin consulta a la base de datos  -->
                                        </select>
                                    </div>
                                </div>
                                <!-- Fin Seleccionar Categoria Eventos --> 

                                <!-- Fecha evento -->
                                <div class="form-group row">
                                    <label for="fecha" class="col-sm-3 col-form-label">Fecha:</label>
                                    <div class="col-sm-9 input-group date" id="reservationdate"
                                        data-target-input="nearest" data-target="#reservationdate"
                                        >
                                        <input type="text" id="fecha" name="fecha" class="form-control datetimepicker-input" data-toggle="datetimepicker"
                                            data-target="#reservationdate" value="<?echo $fechaFormateada ?>" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div><!--Fin Fecha evento -->

                            
                                <!-- Hora Evento -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group row">
                                        <label for="hora" class="col-sm-3 col-form-label">Hora:</label>
                                        <div class="col-sm-9 input-group date" id="timepicker" data-target-input="nearest">
                                            <input type="text" id="hora" autocomplete="off" data-target="#timepicker" name="hora"
                                                data-toggle="datetimepicker" class="form-control datetimepicker-input"
                                                data-target="#timepicker" value="<?echo $horaFormateada ?>" required>
                                            <div class="input-group-append" >
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <!-- Fin Hora Evento -->

                                <!-- Seleccionar Invitado-->
                                <div class="form-group row">
                                    <label for="invitado" class="col-sm-3 col-form-label">Invitado:</label>
                                    <div class="col-sm-9">
                                        <select name="invitado" class="form-control select2" id="invitado" required>
                                            <option value="0">--Seleccione--</option>
                                            <?php 
                                            try{
                                                $invitado_actual = $evento['id_inv'];
                                                $sql = "SELECT * FROM invitados";
                                                $resultado = $conn->query($sql);
                                                while($inv_even = $resultado->fetch_assoc()){
                                                    if($inv_even['invitado_id'] ===  $invitado_actual){?>
                                                        <option value="<?php echo $inv_even['invitado_id']?>" selected>
                                                            <?php echo $inv_even['nombre_invitado'] .' '. $inv_even['apellido_invitado']?>
                                                        </option>
                                                <?php }else{ ?>
                                                        <option value="<?php echo $inv_even['invitado_id']?>">
                                                        <?php echo $inv_even['nombre_invitado'] .' '. $inv_even['apellido_invitado']?>
                                                        </option>
                                            <?php
                                                
                                                }
                                            }
                                            $conn->close();
                                            }catch(Exception $e){
                                                echo 'error'. $e->getMessage();
                                            }
                                                ?>
                                        </select>
                                    </div>

                                </div>
                                <!-- Fin Seleccionar Invitado-->

                            
                            <!-- Botones del formulario -->
                            <div class="card-footer">
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
                            <!-- Fin Botones del formulario -->

                        <!-- Fin card-body     -->
                        </form>
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->