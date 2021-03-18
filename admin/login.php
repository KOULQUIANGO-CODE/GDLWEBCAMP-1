<?php 
  session_start();
  $cerrar_session = $_GET['cerrar_session'];
  if($cerrar_session){
    session_destroy();
  }
  include_once 'includes/template/header.php';
  require('../includes/funciones/bd_conexion.php');
  if($conn->connect_error) {
    header('Location: ../errordb.html');
  exit();
  }
  $conn->close();

  
?>
<body class="hold-transition login-page" style="background-color: #e9ecef">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>GDL</b>WEBCAMP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión</p>

      <form name="login-admin-form" id="login-admin" action="includes/models/modelo-login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
              <input type="hidden" name="login-admin" value="login">

            <input  type="submit" id="btn-login" class="btn btn-primary btn-block" value="Inicia sesión"></input>
          </div>
          <!-- /.col -->
        </div>
      </form>
<?php 
  include_once 'includes/template/footer.php';
?>