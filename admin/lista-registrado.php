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
                    <h1>Listado de Visitantes Registrados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Listado de Visitantes Registrados</li>
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
                            <h3 class="card-title">Maneja los visitantes registrados en esta sección</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                        <th>Nombre</th>
                                        <th>Correo Electrónico</th>
                                        <th>Fecha Registro</th>
                                        <th>Artículo</th>
                                        <th>Talleres</th>
                                        <th>Regalo</th>
                                        <th>Compra</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                  //  extrater los datos de la base de datos
                                   require('../includes/funciones/bd_conexion.php');
                                   
                                   try {

                                     $sql = "SELECT * FROM registrados";
                                     $sql .= " INNER JOIN regalos ";
                                     $sql .= " ON registrados.regalo=regalos.id_regalo";
                                     $sql .= " ORDER BY id_registrado ";
      
                                     $resultado = $conn->query($sql);
                                   } catch (\Exception $e){
                                     $error = $e->getMessage();
                                     echo $error;
                                   }
                                   while( $registrado = $resultado->fetch_assoc()){ ?>
                                    <tr>

                                        <!-- impresion de los datos en la tabla  -->
                                        <td><?php echo $registrado['nombre_registrado'].' '.$registrado['apellido_registrado'];
                                        $pagado = $registrado['pagado'];
                                        if($pagado){
                                            echo '<br><span class="badge bg-green">Pagado</span>';
                                        }else{
                                            echo '<br><span class="badge bg-red">No Pagado</span>';
                                        }
                                        ?>
                                    </td>
                                        
                                        <td><?php echo $registrado['email_registrado']?></td>
                                        <td><?php echo $registrado['fecha_registrado']?></td>
                                        <td>
                                            <?php 
                                                $articulos = json_decode( $registrado['pases_articulos'], true);
                                               echo '<pre>';
                                               var_dump($articulos);
                                               echo '</pre>';
                                                $arreglo_articulos = array(
                                                    'un_dia' => 'Pase 1 día',
                                                    'pase_2dias' => 'Pase 2 días',
                                                    'pase_completo' => 'Pase Completo',
                                                    'camisas' => 'Camisas',
                                                    'etiquetas' => 'Etiquetas'
                                                );
                                                foreach ($articulos as $llave => $articulo){
                                                    if(array_key_exists('cantidad',$articulo)){
                                                        if($articulo['cantidad'] > 0){
                                                            echo '- ' . $articulo['cantidad'] . ' ' . $arreglo_articulos[$llave] . '<br>';
                                                        }
                                                    }else{
                                                        echo '- ' .  var_export($articulo)  . ' '. $arreglo_articulos[$llave] . '<br>';
                                                    }
                                                    
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                            // revisar los datos en la base de datos para entender el porque de esta forma es diferente a la anterior 
                                                $eventos_resultado = $registrado['talleres_registrados'];
                                                $talleres = json_decode($eventos_resultado , true);
                                                $talleres = implode("', '",$talleres['eventos']);
                                                $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE  evento_id IN ('$talleres')";
                                                $resultado_talleres = $conn->query($sql_talleres);
                                                
                                                while ($eventos = $resultado_talleres->fetch_assoc()){
                                                    echo '- ' . $eventos['nombre_evento'].' '. $eventos['fecha_evento'].' '. $eventos['hora_evento'] . '<br>';
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $registrado['nombre_regalo']?></td>
                                        <td>$ <?php echo $registrado['total_pagado']?></td>
                                        <td><a href="editar-registrado.php?id=<?php echo $registrado['id_registrado']?>"
                                                class="btn bg-orange btn-flat">
                                                <i class="icon fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="includes/template/eliminar-registro.php?id=<?php echo $registrado['id_registrado']?>&tipo=<?php echo 'registrado'?>"
                                                data-id="<?php echo $registrado['id_registrado'];?>" data-tipo="registrado" 
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
                                        <th>Correo Electrónico</th>
                                        <th>Fecha Registro</th>
                                        <th>Artículo</th>
                                        <th>Talleres</th>
                                        <th>Regalo</th>
                                        <th>Compra</th>
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