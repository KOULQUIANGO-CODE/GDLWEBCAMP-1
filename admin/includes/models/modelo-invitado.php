<?php 

$nombreInvitado = filter_var($_POST['nombreInvitado'],FILTER_SANITIZE_STRING); 
$apellidoInvitado = filter_var($_POST['apellidoInvitado'],FILTER_SANITIZE_STRING); 
$descripcion = filter_var($_POST['descripcion'],FILTER_SANITIZE_STRING); 
$id  = (int)$_POST['id'];
//   crear nuevo evento
if($_POST['registro'] === 'nuevo'){
    
    // $respuesta = array(
    //     'respuesta' => $_POST,
    //     'file' => $_FILES
    // );
    // die(json_encode($respuesta));

    // Subir el archivo al servidor
    $directorio = "../../../img/";
    // crea el directorio en caso de no existir
    if(!is_dir($directorio)){
        mkdir($directorio,0755,true);
    }
    if(move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$_FILES['imagen']['name'])){
        $image_url = $_FILES['imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
                $stmt = $conn->prepare("INSERT INTO invitados(nombre_invitado,apellido_invitado,descripcion,url_imagen) VALUES (?,?,?,?)");
                $stmt->bind_param('ssss',$nombreInvitado,$apellidoInvitado,$descripcion,$image_url);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'InvitadoCreado',
                        'nombreInvitado' =>$nombreInvitado,
                        'apellidoInvitado' => $apellidoInvitado,
                        'id_insertado' => $stmt->insert_id
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
if($_POST['registro'] === 'actualizar'){

    // Subir el archivo al servidor
    $directorio = "../../../img/";
    // crea el directorio en caso de no existir
    if(!is_dir($directorio)){
        // mkdir crea directorios 
        mkdir($directorio,0755,true);
    }
    if(move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$_FILES['imagen']['name'])){
        $image_url = $_FILES['imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare("UPDATE invitados SET nombre_invitado = ?,apellido_invitado = ?,descripcion = ?,url_imagen = ? WHERE invitado_id = ? ");
        $stmt->bind_param('ssssi',$nombreInvitado,$apellidoInvitado,$descripcion,$image_url,$id);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'InvitadoActualizado',
                        'nombreInvitado' =>$nombreInvitado,
                        'apellidoInvitado' => $apellidoInvitado,
                        'id_insertado' => $stmt->insert_id
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'errorActualizacion',
                        
                    ); 
                }
                $stmt->close();
                $conn->close();
            
    }catch(\Exception $e){
        $respuesta = array('pass' => $e->getMessage());
    }
    echo json_encode($respuesta);

}

// eliminar invitado
if($_POST['registro'] === 'eliminar'){
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
  
             $stmt = $conn->prepare("DELETE FROM invitados WHERE invitado_id = ? ");
             $stmt->bind_param('i',$id);
             $stmt->execute();
             if($stmt->affected_rows > 0){
                 $respuesta = array(
                     'respuesta' => 'categoriaEliminado',
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