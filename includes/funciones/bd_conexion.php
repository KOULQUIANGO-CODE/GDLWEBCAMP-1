<?php
// conexion a la base de datos gdlwebcamp
// credenciales database
define('DB_USUARIO','u8scirgmoouqhfyj');
define('DB_PASSWORD','mwgfHJ9Egajy0B5rqfHL');
define('DB_HOST','b8k903tj9gxzhqdrk6j9-mysql.services.clever-cloud.com');
define('DB_NAME','b8k903tj9gxzhqdrk6j9');
$conn = new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NAME);


    if($conn->connect_error) {
        echo $conn->connect_error;
      }

?>
