<?php
include_once 'includes/function/sessiones.php';
include_once 'includes/template/header.php';
include_once 'includes/template/barra.php';
include_once 'includes/template/nav.php';
require('../includes/funciones/bd_conexion.php');
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1>Dashboard</h1>
                    <small>Información sobre el evento</small>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- estadisticas diarias de aregistrados -->
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Estadistícas Registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="grafica-registrados" style="min-height: 250px; height: 350px; max-height: 350px; max-width:100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- estadisticas diarias de aregistrados Pagados-->
                <div class="col-lg-6 col-12">
                    <div class="card card-success">
                        <div class="card-header color-pagado">
                            <h3 class="card-title">Estadistícas Registrados Pagados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="grafica-pagado" style="min-height: 250px; height: 350px; max-height: 350px; max-width:100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- estadisticas diarias de aregistrados no Pagados-->
                <div class="col-lg-6 col-12">
                    <div class="card card-danger">
                        <div class="card-header color-pagado">
                            <h3 class="card-title">Estadistícas Registrados No Pagados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>


                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="grafica-no-pagado" style="min-height: 250px; height: 350px; max-height: 350px; max-width:100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <h2>Resumen Registro</h2>
            <div class="row">
                <!-- Total de registrados -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            //Consulta en la base de datos de las personas registradas
                            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
                            $resultado = $conn->query($sql);
                            $registrados = $resultado->fetch_assoc();
                            ?>
                            <h3><?php echo $registrados['registros'] ?></h3>

                            <p>Total Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="lista-registrado.php" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Registrados que han pagado -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <?php
                            //Consulta en la base de datos de las personas registradas
                            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 1";
                            $resultado = $conn->query($sql);
                            $registrados = $resultado->fetch_assoc();
                            ?>
                            <h3><?php echo $registrados['registros'] ?></h3>

                            <p>Total Registrados Pagados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="lista-registrado.php" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Registrados que no han pagado -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <?php
                            //Consulta en la base de datos de las personas registradas
                            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 0";
                            $resultado = $conn->query($sql);
                            $registrados = $resultado->fetch_assoc();
                            ?>
                            <h3><?php echo $registrados['registros'] ?></h3>

                            <p>Total Registrados Sin Pagar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-times"></i>
                        </div>
                        <a href="lista-registrado.php" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Dinero generado por los usuarios ya pagados -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <?php
                            //Consulta en la base de datos de las personas registradas
                            $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1";
                            $resultado = $conn->query($sql);
                            $registrados = $resultado->fetch_assoc();
                            ?>
                            <h3>$<?php echo (float)$registrados['ganancias'] ?></h3>

                            <p>Ganancias Totales</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a href="lista-registrado.php" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!--Regalos-->
            <h2>Regalos</h2>
            <div class="row">
                <!--Pulseras-->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <?php
                            //Consulta en la base de datos de las personas registradas
                            $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE regalo = 2 && pagado = 1";
                            $resultado = $conn->query($sql);
                            $regalos = $resultado->fetch_assoc();
                            ?>
                            <h3><?php echo (float)$regalos['pulseras'] ?></h3>

                            <p>Pulseras</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <a href="lista-registrado.php" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!--Etiquetas-->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <?php
                            //Consulta en la base de datos de las personas registradas
                            $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE regalo = 1 && pagado = 1";
                            $resultado = $conn->query($sql);
                            $regalos = $resultado->fetch_assoc();
                            ?>
                            <h3><?php echo (float)$regalos['etiquetas'] ?></h3>

                            <p>Etiquetas </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <a href="lista-registrado.php" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!--Esferos-->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <?php
                            //Consulta en la base de datos de las personas registradas
                            $sql = "SELECT COUNT(total_pagado) AS esferos FROM registrados WHERE regalo = 3 && pagado = 1";
                            $resultado = $conn->query($sql);
                            $regalos = $resultado->fetch_assoc();
                            ?>
                            <h3><?php echo (float)$regalos['esferos'] ?></h3>

                            <p>Esferos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <a href="lista-registrado.php" class="small-box-footer">
                            Más Información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php
include_once 'includes/template/footer.php';
?>