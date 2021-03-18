<?php 

$nombreCategoria = filter_var($_POST['nombre_categoria'],FILTER_SANITIZE_STRING); 
$icono = filter_var($_POST['icono'],FILTER_SANITIZE_STRING); 
$id  = (int)$_POST['id'];
//   crear nuevo evento
if($_POST['registro'] === 'nuevo'){
    try{
        // llamamos a la conexion
        require('../../../includes/funciones/bd_conexion.php');
                $stmt = $conn->prepare("INSERT INTO categoria_evento(cat_evento, icono) VALUES (?,?)");
                $stmt->bind_param('ss',$nombreCategoria,$icono);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'CategoriaCreada',
                        'nombreEvento' => $nombreCategoria,
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
        $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento = ?,icono = ? WHERE id_categoria = ? ");
        $stmt->bind_param('ssi',$nombreCategoria,$icono,$id);
                $stmt->execute();
                if($stmt->affected_rows > 0){
                    $respuesta = array(
                        'respuesta' => 'CategoriaActualizado',
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
  
             $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE id_categoria = ? ");
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