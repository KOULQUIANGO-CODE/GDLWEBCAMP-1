<?php  
    // variables globales
    // Titulos   
    $tituloFormulario = ($registrado['id_registrado']) ? 'Editar Visitante Registrado':'Crear Visitante Registrado';
    $tituloFormularioSmall = ($registrado['id_registrado']) ? 'Llena el formulario para editar un registrado':'Llena el formulario para crear un registrado';
    // Fin Titulos

    // Botones
    $btnFormulario = ($registrado['id_registrado']) ? 'Actualizar':'Añadir';
    $accion = ($registrado['id_registrado']) ? 'actualizar':'nuevo';
    // Fin Botones

        // Fecha Formateda
        $fecha =$registrado['fecha_registrado']; 
        $fechaFormateada = ($registrado['id_registrado']) ? date('m-d-Y',strtotime($fecha)):'';
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

                        <!-- Formulario -->
                        <form class="form-horizontal" name="guardar_registro-archivo" id="guardar_registro"
                            action="includes/models/modelo-registrado.php" method="post">
                            <div class="card-body">

                                <!-- Nombre registrado -->
                                <div class="form-group row">
                                    <label for="nombreregistrado" class="col-sm-3 col-form-label">Nombre
                                        Registrado</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nombreregistrado"
                                            name="nombreregistrado" placeholder="Nombre Registrado"
                                            value="<?php echo ($registrado['id_registrado']) ? $registrado['nombre_registrado']:'';?>"
                                            required>
                                    </div>
                                </div>
                                <!-- Fin Nombre registrado -->

                                <!-- Apellido registrado -->
                                <div class="form-group row">
                                    <label for="apellidoregistrado" class="col-sm-3 col-form-label">Apellido
                                        registrado</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="apellidoregistrado"
                                            name="apellidoregistrado" placeholder="Apellido Registrado"
                                            value="<?php echo ($registrado['id_registrado']) ? $registrado['apellido_registrado']:'';?>"
                                            required>
                                    </div>
                                </div>
                                <!-- Fin Apellido registrado -->

                                <!-- Email registrado -->
                                <div class="form-group row">
                                    <label for="emailRegistrado" class="col-sm-3 col-form-label">Correo
                                        Electrónico</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="emailRegistrado"
                                            name="emailRegistrado" placeholder="Correo Electrónico"
                                            value="<?php echo ($registrado['id_registrado']) ? $registrado['email_registrado']:'';?>"
                                            required>
                                    </div>
                                </div>
                                <!-- Fin Email registrado -->

                                <!-- Pases Articulo registrado -->
                                <div class="form-group">
                                    <h3>Elige el número de boletos</h3>
                                    <div class="paquetes" id="paquetes">

                                        <ul class="lista-precios clearfix row">
                                            <li class="col-sm-4">
                                                <div class="tabla-precio text-center ">
                                                    <h3>Pase por día </h3>
                                                    <small>(Viernes)</small>
                                                    <p class="numero">$30</p>
                                                    <ul class="text-left">
                                                        <li>Bocadillos Gratis</li>
                                                        <li>Todas las Conferencias</li>
                                                        <li>Todos los Talleres</li>
                                                    </ul>
                                                    <div class="orden text-center">
                                                        <label for="pase_dosdias">Boletos deseados:</label>
                                                        <input type="number" min="0" id="pase_dia"
                                                            name="boletos[un_dia][cantidad]" placeholder="0">
                                                        <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-sm-4">
                                                <div class="tabla-precio text-center">
                                                    <h3>Todos los días</h3>
                                                    <small>(Viernes, Sábado y Domingo)</small>
                                                    <p class="numero">$50</p>
                                                    <ul class="text-left">
                                                        <li>Bocadillos Gratis</li>
                                                        <li>Todas las Conferencias</li>
                                                        <li>Todos los Talleres</li>
                                                    </ul>
                                                    <div class="orden text-center">
                                                        <label for="pase_completo">Boletos deseados:</label>
                                                        <input type="number" min="0" id="pase_completo"
                                                            name="boletos[completo][cantidad]" placeholder="0">
                                                        <input type="hidden" value="50"
                                                            name="boletos[completo][precio]">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col-sm-4">
                                                <div class="tabla-precio text-center">
                                                    <h3>Pase por 2 días</h3>
                                                    <small>(Viernes y Sábado)</small>
                                                    <p class="numero">$45</p>
                                                    <ul class="text-left">
                                                        <li>Bocadillos Gratis</li>
                                                        <li>Todas las Conferencias</li>
                                                        <li>Todos los Talleres</li>
                                                    </ul>
                                                    <div class="orden text-center">
                                                        <label for="pase_dia">Boletos deseados:</label>
                                                        <input type="number" min="0" id="pase_dosdias"
                                                            name="boletos[dos_dia][cantidad]"="0" placeholder="0">
                                                        <input type="hidden" value="45" name="boletos[dos_dia][precio]">
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Fin Pases Articulo registrado -->

                                    <!-- Talleres registrado -->

                                    <div class="box-header with-border">
                                        <h3 class="box-title">Elige los Talleres</h3>
                                        <div id="eventos" class="eventos clearfix">
                                            <div class="caja">
                                                <?php 
                                                    try{
                                                        require('../includes/funciones/bd_conexion.php');
                                                        $sql = "SELECT eventos.*,categoria_evento.cat_evento,invitados.nombre_invitado,invitados.apellido_invitado";
                                                        $sql .= " FROM eventos";
                                                        $sql .= " JOIN categoria_evento";
                                                        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria";
                                                        $sql .= " JOIN invitados";
                                                        $sql .= " ON eventos.id_inv = invitados.invitado_id";
                                                        $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento,eventos.hora_evento";
                                                        $resultado = $conn->query($sql);

                                                    }catch(Exception $e){
                                                        echo $e->getMessage();
                                                    }
                                                    // $eventos = $resultado->fetch_assoc();
                                                    // echo '<pre>';
                                                    // var_dump($eventos);
                                                    // echo '</pre>';
                                                    $eventos_dias = array();
                                                while ($eventos = $resultado->fetch_assoc()){
                                                        $fecha = $eventos['fecha_evento'];
                                                        // cambiar el lenguaje de los datos recibidos desde el servidor
                                                        // WINDOWS
                                                        setlocale(LC_ALL, 'spanish.UTF-8');
                                                        // UNIX
                                                        
                                                        setlocale(LC_ALL, 'es_ES.UTF-8');
                                                        
                                                        // convertir la fecha a dias
                                                        $dia_semana = strftime('%A',strtotime($fecha));
                                                    $categoria = $eventos['cat_evento'];
                                                        $dia = array(
                                                            
                                                            'nombre_evento' => $eventos['nombre_evento'],
                                                            'hora' => $eventos['hora_evento'],
                                                            'id' => $eventos['evento_id'],
                                                            'nombre_invitado' => $eventos['nombre_invitado'],
                                                            'apellido_invitado' => $eventos['apellido_invitado']
                                                            
                                                        );
                                                        // ordenar los datos
                                                        $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;

                                                }
                                                //    echo '<pre>';
                                                //         var_dump($eventos_dias);
                                                //         echo '</pre>';
                                                ?>
                                                <?php 
                                                    foreach ($eventos_dias as $dia => $eventos){
                                                ?>
                                                <!--contenido dias-->
                                                <?php 
                                                    if($dia === 'Monday' || $dia === 'Lunes'){
                                                        $dia_español = 'lunes';
                                                    }else if($dia === 'Tuesday' || $dia === 'martes'){
                                                        $dia_español = 'martes';
                                                    }else if($dia === 'Wednesday' || $dia === 'miércoles'){
                                                        $dia_español = 'miercoles';
                                                    }else if($dia === 'Thursday' || $dia === 'jueves'){
                                                        $dia_español = 'jueves';
                                                    }else if($dia === 'Friday' || $dia === 'viernes'){
                                                        $dia_español = 'viernes';
                                                    }else if($dia === 'Saturday' || $dia === 'sábado'){
                                                        $dia_español = 'sabádo';
                                                    }else if($dia === 'Sunday' || $dia === 'domingo'){
                                                        $dia_español = 'domingo';
                                                    }
                                                    
                                                    ?>
                                                <div id="<?php echo str_replace('á','a',$dia_español);?>"
                                                    class="contenido-dia clearfix">

                                                    <h4>
                                                        <? echo $dia_español; ?>
                                                    </h4>
                                                    <?php foreach ($eventos['eventos'] as $tipo => $eventos_dia){ ?>
                                                    <div>
                                                        <p>
                                                            <? echo $tipo . ':'; ?>
                                                        </p>
                                                        <?php foreach ($eventos_dia as $evento){ ?>
                                                        <label>
                                                            <input type="checkbox" name="registro[]"
                                                                id="<? echo $evento['id']; ?>"
                                                                value="<? echo $evento['id']; ?>">
                                                            <time>
                                                                <? echo $evento['hora']; ?>
                                                            </time>
                                                            <? echo $evento['nombre_evento']; ?>
                                                            <br>
                                                            <span class="conferencista">Conferencista:</span><span
                                                                class="autor">
                                                                <? echo $evento['nombre_invitado'] .' '. $evento['apellido_invitado']; ?>
                                                            </span>
                                                        </label>
                                                        <?php } ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <!--Fin contenido dias-->
                                                <?php }?>
                                            </div>
                                            <!--.caja-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Talleres registrado -->
                                <div class="form-group ">
                                    <div class="row">
                                        <label for="camisa_evento" class="col-sm-6">Camisa del evento $10
                                            <small>(Promoción 7%
                                                dto.)</small></label>
                                        <input type="number" min="0" id="camisa_evento" class="col-sm-5"
                                            name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                                        <input type="hidden" name="pedido_extra[camisas][precio] " value="10">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <label for="etiquetas" class="col-sm-6">Paquete de etiquetas $2
                                            <small>(HTML5,CSS3,JavaScript,Chrome)</small></label>
                                        <input type="number" min="0" id="etiquetas" class="col-sm-5"
                                            name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                                        <input type="hidden" name="pedido_extra[etiquetas][precio] " value="2">
                                    </div>
                                </div>
                                <!-- Regalo registrado -->
                                <div class="form-group">
                                    <label for="regalo" class="col-form-label">Regalo</label>
                                    <div>
                                        <select name="regalo" class="form-control select2" id="regalo" required>
                                            <option value="0">--Seleccione--</option>
                                            <?php 
                                            try{
                                                $regalo_actual = $registrado['regalo'];
                                                $sql = "SELECT * FROM regalos";
                                                $resultado = $conn->query($sql);
                                                while($regalo_registrado = $resultado->fetch_assoc()){
                                                    if($regalo_registrado['id_regalo'] ===  $regalo_actual){?>
                                            <option value="<?php echo $regalo_registrado['id_regalo']?>" selected>
                                                <?php echo $regalo_registrado['nombre_regalo']?>
                                            </option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $regalo_registrado['id_regalo']?>">
                                                <?php echo  $regalo_registrado['nombre_regalo']?>
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
                                    <input type="button" id="calcular" class="button" value="Calcular">
                                </div>
                                <div class="form-group">
                                    <div class="total">
                                        <p>Resumen</p>
                                        <div id="listas-productos">

                                        </div>
                                        <p>Total:</p>
                                        <div id="suma-total">

                                        </div>
                                        <input type="hidden" name="total_pedido" id="total_pedido">
                                        <input type="submit" name="submit" id="btnRegistro" class="button"
                                            value="Pagar">
                                    </div>
                                </div>
                                <!-- Fin Regalo registrado -->

                                <!-- Botones del Formulario -->
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
                                <!-- Fin Botones del Formulario -->
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