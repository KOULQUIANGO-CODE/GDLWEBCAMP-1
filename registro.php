<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <title>Registro</title>
    <?php include_once 'includes/templates/header.php'; ?>


    <div class="seccion contenedor contenido-main">
        <h2>Registro de Usuarios</h2>
        <form id="registro" class="registro" action="pagar.php" method="POST">
            <div class="caja registro clearfix">
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre">
                </div>
                <div class="campo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
                </div>
                <div class="campo">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" placeholder="Tu E-mail">
                </div>
                <div id="error"></div>
                <!-- datos usuario -->

                 <!-- paquetes -->
                <div class="paquetes" id="paquetes">
                    <h3>Elige el número de boletos</h3>

                    <ul class="lista-precios clearfix">
                        <li>
                            <div class="tabla-precio">
                                <h3>Pase por día (Viernes)</h3>
                                <p class="numero">$30</p>
                                <ul>
                                    <li>Bocadillos Gratis</li>
                                    <li>Todas las Conferencias</li>
                                    <li>Todos los Talleres</li>
                                </ul>
                                <div class="orden">
                                    <label for="pase_dosdias">Boletos deseados:</label>
                                    <input type="number" min="0" id="pase_dia" name="boletos[un_dia][cantidad]"
                                        placeholder="0">
                                    <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tabla-precio">
                                <h3>Todos los días</h3>
                                <p class="numero">$50</p>
                                <ul>
                                    <li>Bocadillos Gratis</li>
                                    <li>Todas las Conferencias</li>
                                    <li>Todos los Talleres</li>
                                </ul>
                                <div class="orden">
                                    <label for="pase_completo">Boletos deseados:</label>
                                    <input type="number" min="0" id="pase_completo" name="boletos[completo][cantidad]"
                                        placeholder="0">
                                    <input type="hidden" value="50" name="boletos[completo][precio]">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="tabla-precio">
                                <h3>Pase por 2 días (Viernes y Sábado)</h3>
                                <p class="numero">$45</p>
                                <ul>
                                    <li>Bocadillos Gratis</li>
                                    <li>Todas las Conferencias</li>
                                    <li>Todos los Talleres</li>
                                </ul>
                                <div class="orden">
                                    <label for="pase_dia">Boletos deseados:</label>
                                    <input type="number" min="0" id="pase_dosdias"
                                        name="boletos[dos_dia][cantidad]"="0" placeholder="0">
                                    <input type="hidden" value="45" name="boletos[dos_dia][precio]">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Fin paquetes -->
            </div>
            <div id="eventos" class="eventos clearfix">
                <h3>Elige tus talleres</h3>
                <div class="caja">
                    <?php 
                    try{
                        require_once('includes/funciones/bd_conexion.php');
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
                    <div id="<?php echo str_replace('á','a',$dia_español);?>" class="contenido-dia clearfix">
                    
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
                                <input type="checkbox" name="registro[]" id="<? echo $evento['id']; ?>" value="<? echo $evento['id']; ?>">
                                <time><? echo $evento['hora']; ?></time> <? echo $evento['nombre_evento']; ?>
                                <br>
                                <span class="conferencista">Conferencista:</span><span class="autor"> <? echo $evento['nombre_invitado'] .' '. $evento['apellido_invitado']; ?></span>
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
            <!--#eventos-->
            <div class="resumen clearfix" id="resumen">
                <h3>Pagos y Extras</h3>
                <div class="caja clearfix">
                    <div class="extras">
                        <div class="orden">
                            <label for="camisa_evento">Camisa del evento $10 <small>(Promoción 7% dto.)</small></label>
                            <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]"
                                size="3" placeholder="0">
                            <input type="hidden" name="pedido_extra[camisas][precio] " value="10">
                        </div>
                        <!-- orden -->
                        <div class="orden">
                            <label for="etiquetas">Paquete de etiquetas $2
                                <small>(HTML5,CSS3,JavaScript,Chrome)</small></label>
                            <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]"
                                size="3" placeholder="0">
                            <input type="hidden" name="pedido_extra[etiquetas][precio] " value="2">
                        </div>
                        <!-- orden -->
                        <div class="orden">
                            <label for="regalo">Seleccione un regalo</label><br>
                            <select name="regalo" id="regalo" required>
                                <option value="">--Seleccione un regalo--</option>
                                <option value="1">Etiqueta</option>
                                <option value="2">Pulsera</option>
                                <option value="3">Esferos</option>
                            </select>
                        </div>
                        <!-- orden -->
                        <input type="button" id="calcular" class="button" value="Calcular">
                    </div>
                    <!-- Extras -->
                    <div class="total">
                        <p>Resumen</p>
                        <div id="listas-productos">

                        </div>
                        <p>Total:</p>
                        <div id="suma-total">

                        </div>
                        <input type="hidden" name="total_pedido" id="total_pedido">
                        <input type="submit" name="submit" id="btnRegistro" class="button" value="Pagar">
                    </div>
                    <!-- total -->
                </div>
                <!-- caja -->
            </div>
            <!-- resumen -->
        </form>
    </div>
    <?php include_once 'includes/templates/footer.php'; ?>