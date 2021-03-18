<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/7e325fac30.js" crossorigin="anonymous"></script>
<link rel="manifest" href="site.webmanifest">
<link rel="apple-touch-icon" href="icon.png">
<!-- Place favicon.ico in the root directory -->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace('.php','',$archivo);
if ($pagina == 'invitados'){
   
    echo '<link rel="stylesheet" href="css/colorbox.css">';
    
}else if ($pagina == 'conferencia'){
    echo '<link rel="stylesheet" href="css/lightbox.css">';
}
?>
<link rel="stylesheet" href="css/main.css">

<link rel="stylesheet" href="css/normalize.css">
</head>

<body class="conferencia ">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Add your site or application content here -->
    <header class="siteheader">
        <div class="barra fijo ">
            <div class="contenedor clearfix ">
                <div class="logo"><a href="index.php"> <img src="img/logo.svg" alt="GdlWebCamp"></a>
                </div>

                <div class="menu-movil">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <nav class="navegacion-principal">
                    <a href="conferencia.php">Conferencias</a>
                    <a href="calendario.php">Calendario</a>
                    <a href="invitados.php">Invitados</a>
                    <a href="registro.php">Reservaciones</a>
                </nav>
            </div>
            <!--Cierre Contenedor-->
        </div>
        <!--Cierre barra-->
    </header>