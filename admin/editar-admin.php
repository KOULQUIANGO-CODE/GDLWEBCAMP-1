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
  $sql = "SELECT * FROM admins WHERE id_admin = $id";
  $resultado = $conn->query($sql);
  $admin  = $resultado->fetch_assoc();
  $conn->close();
  include_once 'includes/template/formulario-admin.php';
  include_once 'includes/template/footer.php';
?>