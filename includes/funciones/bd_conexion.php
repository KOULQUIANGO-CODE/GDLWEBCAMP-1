<?php
// conexion a la base de datos gdlwebcamp
$conn=new mysqli('b8k903tj9gxzhqdrk6j9-mysql.services.clever-cloud.com','u8scirgmoouqhfyj','mwgfHJ9Egajy0B5rqfHL','b8k903tj9gxzhqdrk6j9');

    if($conn->connect_error) {
        echo $conn->connect_error;
      }

?>