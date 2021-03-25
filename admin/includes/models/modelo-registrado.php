<?php 

require('../../../includes/funciones/funciones.php');
// Datos enviados desde el formulario metodo Post
$nombreRegistrado = filter_var($_POST['nombreregistrado'],FILTER_SANITIZE_STRING);
$apellidoRegistrado = filter_var($_POST['apellidoregistrado'],FILTER_SANITIZE_STRING);
$emailRegistrado = filter_var($_POST['emailRegistrado'],FILTER_SANITIZE_EMAIL);
$total = $_POST['total_pedido'];
$regalo = (int)$_POST['regalo'];
$fecha = $_POST['fecha_registro'];

//Talleres Eventos
$eventos = $_POST['registro_taller'];
$registroEventos = eventos_json($eventos);
//Boletos
$boletos_adquiridos = $_POST['boletos'];

//camisas y etiquetas
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

$pedido = productos_json($boletos_adquiridos,$camisas,$etiquetas);

$id  = (int)$_POST['id'];

//   crear nuevo evento
if($_POST['registro'] === 'nuevo'){
    try{
        
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
                $stmt = $conn->prepare("INSERT INTO registrados(nombre_registrado,apellido_registrado,email_registrado,fecha_registrado,pases_articulos,talleres_registrados,regalo,total_pagado,pagado) VALUES (?,?,?,NOW(),?,?,?,?,1)");
                $stmt->bind_param('sssssis',$nombreRegistrado,$apellidoRegistrado,$emailRegistrado,$pedido,$registroEventos,$regalo,$total);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'RegistradoCreado',
                        'nombre' => $nombreRegistrado,
                        'apellido' => $apellidoRegistrado,
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
         $stmt = $conn->prepare("UPDATE registrados SET nombre_registrado = ?,apellido_registrado = ?,email_registrado = ?,fecha_registrado = ?,pases_articulos = ?,talleres_registrados = ?,regalo = ?,total_pagado = ?,pagado = 1  WHERE id_registrado = ?");
         $stmt->bind_param('ssssssisi',$nombreRegistrado,$apellidoRegistrado,$emailRegistrado,$fecha,$pedido,$registroEventos,$regalo,$total,$id);
         $stmt->execute();
         if($stmt->affected_rows > 0){
             $respuesta = array(
                 'respuesta' => 'RegistradoActualizado',
                 'nombre' => $nombreRegistrado,
                 'apellido' => $apellidoRegistrado,
                 'id_insertado' => $stmt->insert_id
                 
             );
         }else{
             $respuesta = array(
                 'respuesta' => 'errorActualizacion'
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
  
             $stmt = $conn->prepare("DELETE FROM registrados WHERE id_registrado = ? ");
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