<?php
// login
if($_POST['login-admin'] === 'login'){
   $usuario = filter_var($_POST['usuario'],FILTER_SANITIZE_STRING);
  $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
     
   try{
    // llamamos a la conexion
    require('../../../includes/funciones/bd_conexion.php');

       // consultar si el ususario existe en la base de datos
       $stmt = $conn->prepare("SELECT id_admin,nombre,usuario,password,nivel FROM admins WHERE usuario = ?");
       $stmt->bind_param('s', $usuario);
       $stmt->execute();
       $stmt->bind_result($id, $nombre_usuario, $usuario_admin, $password_usuario,$nivel);
        if($stmt->affected_rows) {
          $existe = $stmt->fetch();

          if($existe) {
                if(password_verify($password, $password_usuario)){
                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['nombre'] = $nombre_usuario;
                    $_SESSION['id'] = $id;
                    $_SESSION['nivel'] = $nivel;
                    $respuesta = array(
                        'resultado' => 'exito',
                        'nombre' => $nombre_usuario
                    );
                } else {
                  $respuesta = array(
                    'resultado' => 'error'
                 );
                }
          }else {
            $respuesta = array(
              'resultado' => 'error'
           );
          }
        } else {
          $respuesta = array(
              'resultado' => 'error'
           );
        } 

      $stmt->close();
      $conn->close();
} catch(Exception $e) {
  $e->getMessage();

}
echo json_encode($respuesta);
}

?>