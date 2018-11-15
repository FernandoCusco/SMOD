<?php
        $db_host = "localhost";
        $db_nombre = "SistemaRecomendaciones";
        $db_usuario = "root";
        $db_clave = "241996";

        $conexion = mysqli_connect($db_host, $db_usuario, $db_clave, $db_nombre);
      session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['correo'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT id FROM Usuarios WHERE id = '$myusername' and id = '$mypassword'";
      $result = mysqli_query($conexion, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         
         header("location: menu.php");
      }else {
         $error = "Login Incorrecto";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "Menu.php" method = "GET">
                  <label>UserName  :</label><input type = "text" name = "correo" id="correo" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>