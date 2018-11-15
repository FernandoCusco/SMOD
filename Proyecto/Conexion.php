<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "utf-8">
	    <title></title>
	    <style>
        
            table{
                background-color: red;
                border: blue 7px solid;
                padding: 2%;
            }
        
        </style>
    </head>
    <body>
    
        <form action="" method="post">
            <table align = "center">
            <tr>
                <td>
                    <label>Nombre: <input type = "text" name="txtNombre" id="txtNombre" /> </label>
                </td>
            </tr>
            
                <tr>
                    <td>
                        <label>Edad: <input type="number" name="txtEdad" id="txtEdad" /></label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Genero: <input type="text" name="txtGenero" id="txtGenero" /></label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Correo: <input type="text" name="txtCorreo" id="txtCorreo" /></label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Password: <input type="Password" name="txtPass" id="txtPass" /></label>
                    </td>
                </tr>
            
            <tr>
                <td align = "center">
                    <input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar"/>
                </td>
            </tr>
            </table>
        </form>
    
    </body>
</html>


<?php

    if(isset($_POST["btnRegistrar"])){
        $nombre = $_POST["txtNombre"];
        $edad = $_POST["txtEdad"];
        $genero = $_POST["txtGenero"];
        $correo = $_POST["txtCorreo"];
        $pass = $_POST["txtPass"];
        if(!empty($nombre) && !empty($edad) && !empty($genero) && !empty($correo) && !empty($pass)){
            insertarRegistro($nombre, $edad, $genero, $correo, $pass);
        }else{
            print("<p style = 'background-color: black; color: red; font: bold; text-align: center;'>Rellene todos lo campos!!!</p>");
        }
    }

    function insertarRegistro($nombre, $edad, $genero, $correo, $pass){
        $db_host = "localhost";
        $db_nombre = "SistemaRecomendaciones";
        $db_usuario = "root";
        $db_clave = "241996";

        $conexion = mysqli_connect($db_host, $db_usuario, $db_clave, $db_nombre);

        if(mysqli_connect_errno()){
            print("Fallo al conectarse a la base de datos");
            exit();
        }

        $registro = "insert into Usuarios(nombres, edad, sexo, correo, passwords) values ('$nombre', '$edad', '$genero', '$correo', '$pass');";

        print($registro);
        mysqli_query($conexion, $registro);
        mysqli_close($conexion);
    }

?>