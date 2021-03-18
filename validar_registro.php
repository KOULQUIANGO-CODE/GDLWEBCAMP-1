<!--  isset = validad que exista la variable -->
<?php
require_once('includes/funciones/bd_conexion.php');
if(isset($_POST['submit'])){ 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$regalo = $_POST['regalo'];
$total = $_POST['total_pedido'];
date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d H:i:s');
// pedidos
$boletos = $_POST['boletos'];
$camisas = $_POST['pedidos_camisas'];
$etiquetas = $_POST['pedidos_etiquetas'];
include_once 'includes/funciones/funciones.php';
$pedido = productos_json($boletos, $camisas,$etiquetas);    
// eventos
$eventos = $_POST['registro'];
$registro = eventos_json($eventos);
require_once('includes/funciones/bd_conexion.php');

try{
$stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registrado, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
// s string i int
$stmt->bind_param('ssssssis', $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
// prepare le dice a la base de datos que habra una insercion BRIND_PARAM
    
$stmt->execute();
$stmt->close();
$conn->close();
header('Location: validar_registro.php?exitoso=1');
}catch(Exception $e){
  $error =$e->getMessage();
}
  ?>
<?php }; ?>
  <?php include_once 'includes/templates/header.php'?>
  <main class="contenido-main">
    <section class="seccion contenedor">
      <h2>Resumen Registro</h2>
<?php if(isset($_GET['exitoso'])){
  if($_GET['exitoso'] == '1'){
    echo 'Registro Exitoso';
  }
}
?>
  </section>

  <?php include_once 'includes/templates/footer.php'?>
