<?php 
   $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_SPECIAL_CHARS);
   $usuario = filter_var($_POST['usuario'],FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS);
  $id  = (int)$_POST['id'];
   //  hashear passwords
   $opciones = array(
    'cost' => 12
);
$password_hashed = password_hash($password,PASSWORD_BCRYPT,$opciones);
// Inserción de los usuarios a la base de datos 
if($_POST['registro'] === 'nuevo'){
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
        // consultar si el usuario existe en la base de datos
        $stmt = $conn->prepare("SELECT  usuario FROM admins WHERE usuario = ?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        // loguear al usuario
        $stmt->bind_result($usuarioBD);
        $existe = $stmt->fetch();
        if(!$existe){
                $stmt = $conn->prepare("INSERT INTO admins(usuario,nombre, password) VALUES (?,?,?)");
                $stmt->bind_param('sss', $usuario,$nombre,$password_hashed);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'UsuarioCreado'
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    ); 
                }
                $stmt->close();
                $conn->close();
        
            
        }else{
            $respuesta = array(
                'respuesta' => 'UsuarioExistente'
            ); 
        } 
    }catch(\Exception $e){
        $respuesta = array('pass' => $e->getMessage());
    }
    echo json_encode($respuesta);
}

// actualizar de los usuarios a la base de datos 
if($_POST['registro'] === 'actualizar'){
  
   try{
       // llamamos a la conexion
       require('../../../includes/funciones/bd_conexion.php');
 
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?,nombre = ? , password = ? WHERE id_admin = ? ");
            $stmt->bind_param('sssi', $usuario,$nombre,$password_hashed,$id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                $respuesta = array(
                    'respuesta' => 'UsuarioActualizado',
                    'id_insertado' => $stmt->insert_id,
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'error'
                ); 
            }
            $stmt->close();
            $conn->close();
        
    }catch(\Exception $e){
            $respuesta = array('pass' => $e->getMessage());
    }
    echo json_encode($respuesta);
}
// eliminar registro
if($_POST['registro'] === 'eliminar'){
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
  
             $stmt = $conn->prepare("DELETE FROM admins  WHERE id_admin = ? ");
             $stmt->bind_param('i',$id);
             $stmt->execute();
             if($stmt->affected_rows > 0){
                 $respuesta = array(
                     'respuesta' => 'UsuarioEliminado',
                     'id_eliminado' => $id
                 );
             }else{
                 $respuesta = array(
                     'respuesta' => 'error'
                 ); 
             }
             $stmt->close();
             $conn->close();
         
     }catch(\Exception $e){
             $respuesta = array('pass' => $e->getMessage());
     }
     echo json_encode($respuesta);
 }
?>