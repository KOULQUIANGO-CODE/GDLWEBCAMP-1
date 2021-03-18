<?php include_once 'includes/templates/header.php';
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
include "includes/funciones/paypal.php";
?>
  <main class="contenido-main">
    <section class="seccion contenedor">
      <h2>Resumen Registro</h2>
<?php 
        $paymentId = $_GET['paymentId'];
        $id_pago = (int) $_GET['id_pago'];
        
        //petición a REST API
        $pago = Payment::get($paymentId,$apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        //resultado tiene la informacion de la transaccion
        $resultado =$pago->execute($execution,$apiContext);
        $respuesta= $resultado->transactions[0]->related_resources[0]->sale->state;
        // var_dump($resultado);

        if($respuesta === 'completed'){
            echo "<div class='resultado correcto'>";
            echo 'El pago se realizo correctamente';
            echo "el ID es {$paymentId}";
            echo "</div>";
            require('includes/funciones/bd_conexion.php');
            $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE id_registrado = ?');
            $pagado = 1;
            $stmt->bind_param('ii', $pagado, $id_pago);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }else{
            echo "<div class='resultado error'>";
            echo 'el pago se cancelo';
            echo "</div>";
        }
        ?>
  </section>

  <?php include_once 'includes/templates/footer.php'?>
