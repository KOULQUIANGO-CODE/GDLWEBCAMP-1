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
  $sql = "SELECT * FROM registrados WHERE id_registrado = $id";
  $resultado = $conn->query($sql);
  $registrado  = $resultado->fetch_assoc();
  include_once 'includes/template/formulario-registrado.php';
  include_once 'includes/template/footer.php';
?>