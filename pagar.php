<?php
if(!isset($_POST['submit'])){
    header("Location: http://localhost:81/gDLWEBCAMP/404.html");
    exit;
}
use PayPal\Api\Payer;
use PayPal\Api\ItemList;
use PayPal\Api\Item;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


if(isset($_POST['submit'])){ 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$regalo = $_POST['regalo'];
$total = $_POST['total_pedido'];
date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d H:i:s');
// pedidos
$boletos = $_POST['boletos'];
$numeroBoletos = $boletos;
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
$pedidoExtra = $_POST['pedido_extra'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
$etiquetasEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
include 'includes/funciones/funciones.php';
$pedido = productos_json($boletos, $camisas,$etiquetas);    
// eventos
$eventos = $_POST['registro'];
$registro = eventos_json($eventos);
require_once('includes/funciones/bd_conexion.php');
}
try{
    $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registrado, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
    // s string i int
    $stmt->bind_param('ssssssis', $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
    // prepare le dice a la base de datos que habra una insercion BRIND_PARAM   
    $stmt->execute();
    $ID_registro = $stmt->insert_id;
    $stmt->close();
    $conn->close();
}catch(Exception $e){
  $error =$e->getMessage();
}
include 'includes/funciones/paypal.php';

$compra = new Payer();
$compra->setPaymentMethod('paypal'); 

$articulo = new Item();
$articulo->setName($producto)
        ->setcurrency('USD')
        ->setQuantity(1)
        ->setPrice($precio); 
$i = 0;
$arreglo_pedido = array();

foreach ($numeroBoletos as $key => $value){
    if((int) $value['cantidad'] > 0){
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"}->setName('Pase:' . $key)
                    ->setcurrency('USD')
                    ->setQuantity((int) $value['cantidad'])
                    ->setPrice((int) $value['precio']); 
    $i++;
    }
}

foreach ($pedidoExtra as $key => $value){
    if((int) $value['cantidad'] > 0){
        if($key == 'camisas'){
            $precio = (float)$value['precio'] * 0.93;
        }else{
            $precio = (int)$value['precio'];
        }
        ${"articulo$i"} = new Item();
        $arreglo_pedido[] = ${"articulo$i"};
        ${"articulo$i"}->setName('Extras:' . $key)
                    ->setcurrency('USD')
                    ->setQuantity((int) $value['cantidad'])
                    ->setPrice($precio); 
    $i++;
    }
}

// lista de artuculos 
$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);

// cantidad a pagar
$cantidad = new Amount();
$cantidad->setcurrency('USD')
        ->setTotal($total);

// Transaccion
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago GDLWEBCAMP')
            ->setInvoiceNumber($ID_registro);
// redireccionar
$redireccionar =new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO."pago_finalizado.php?&id_pago={$ID_registro}")
            ->setCancelUrl(URL_SITIO."pago_finalizado.php?&id_pago={$ID_registro}");
//pago
$pago = new Payment();
$pago->setIntent('sale')
    ->setPayer($compra)
    ->setRedirectUrls($redireccionar)
    ->setTransactions(array($transaccion));
try {
    $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
    echo '<pre>';
    print_r(json_decode($pce->getData()));
    exit;
    echo '</pre>';
}
$aprobado = $pago->getApprovalLink();
header("Location: {$aprobado}");
?>