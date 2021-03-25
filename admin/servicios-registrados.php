<?php 
include_once 'includes/function/sessiones.php';
  
  require('../includes/funciones/bd_conexion.php');
  $sql = "SELECT fecha_registrado, COUNT(fecha_registrado) AS resultado FROM registrados GROUP BY fecha_registrado ORDER BY fecha_registrado";
  $resultado = $conn->query($sql);
  $arreglo_registro = array(

  );
  while($registro_dia = $resultado->fetch_assoc()){
    $fecha = $registro_dia['fecha_registrado'];
    $registro['fecha'] = date('Y-m-d', strtotime($fecha));
    $registro['cantidad'] = $registro_dia['resultado'];
    $arreglo_registro[] = $registro;

  }

echo json_encode($arreglo_registro);


