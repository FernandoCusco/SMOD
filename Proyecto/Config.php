<?php
        $db_host = "localhost";
        $db_nombre = "SistemaRecomendaciones";
        $db_usuario = "root";
        $db_clave = "241996";

        $conexion = mysqli_connect($db_host, $db_usuario, $db_clave, $db_nombre);

        if($conexion){
        	echo "Conectado";
        } else {
        	echo "Error al conectar";
        }
?>