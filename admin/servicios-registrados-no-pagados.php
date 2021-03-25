<?php 
include_once 'includes/function/sessiones.php';
  
  require('../includes/funciones/bd_conexion.php');
  $sql = "SELECT fecha_registrado,pagado, COUNT(pagado) AS pagado FROM registrados where pagado = 0 GROUP BY fecha_registrado,pagado ORDER BY fecha_registrado";
  $resultado = $conn->query($sql);
  $arreglo_registro = array();
  while($registro_dia = $resultado->fetch_assoc()){
    $fecha = $registro_dia['fecha_registrado'];
    $registro['fecha_pagado'] = date('Y-m-d', strtotime($fecha));
    $registro['pagado'] = $registro_dia['pagado'];
    $arreglo_registro[] = $registro;

  }

echo json_encode($arreglo_registro);

