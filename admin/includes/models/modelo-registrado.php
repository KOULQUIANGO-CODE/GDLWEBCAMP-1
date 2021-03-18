<?php 
die(json_encode($_POST));
$tituloEvento = filter_var($_POST['tituloEvento'],FILTER_SANITIZE_STRING); 
$categoriaEvento = (int)$_POST['categoria_evento'];
$hora = filter_var($_POST['hora'],FILTER_SANITIZE_STRING); 
$horaFormateada = date('G:i:s',strtotime($hora));
$fecha =filter_var($_POST['fecha'],FILTER_SANITIZE_STRING); 
$fechaFormateada = date('Y-m-d',strtotime($fecha));
$invitado = (int)$_POST['invitado']; 
  $id  = (int)$_POST['id'];
//   crear nuevo evento
if($_POST['registro'] === 'nuevo'){
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
                $stmt = $conn->prepare("INSERT INTO eventos(nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?)");
                $stmt->bind_param('sssii',$tituloEvento,$fechaFormateada,$horaFormateada,$categoriaEvento,$invitado  );
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'EventoCreado',
                        'nombreEvento' => $tituloEvento,
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
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare("UPDATE eventos SET nombre_evento = ?,fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ? WHERE evento_id = ? ");
        $stmt->bind_param('sssiii',$tituloEvento,$fechaFormateada,$horaFormateada,$categoriaEvento,$invitado,$id);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'EventoActualizado',
                        'nombreEvento' => $tituloEvento
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'errorActualizacion',
                        'id_insertado' => $stmt->insert_id
                    ); 
                }
                $stmt->close();
                $conn->close();
            
    }catch(\Exception $e){
        $respuesta = array('pass' => $e->getMessage());
    }
    echo json_encode($respuesta);

}
if($_POST['registro'] === 'eliminar'){
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
  
             $stmt = $conn->prepare("DELETE FROM eventos WHERE evento_id = ? ");
             $stmt->bind_param('i',$id);
             $stmt->execute();
             if($stmt->affected_rows > 0){
                 $respuesta = array(
                     'respuesta' => 'EventoEliminado',
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