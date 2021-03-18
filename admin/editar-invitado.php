<?php 
  include_once 'includes/function/sessiones.php';
  include_once 'includes/template/header.php';
  $id = $_GET['id'];
  if(!filter_var($id,FILTER_VALIDATE_INT)){
      die('ERROR!');
    //   die detiene la ejecucion
  }
  include_once 'includes/template/barra.php';
  include_once 'includes/template/nav.php';
  require('../includes/funciones/bd_conexion.php');
  $sql = "SELECT * FROM invitados WHERE invitado_id = $id";
  $resultado = $conn->query($sql);
  $invitado  = $resultado->fetch_assoc();
  include_once 'includes/template/formulario-invitado.php';
  include_once 'includes/template/footer.php';
?>