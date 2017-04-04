 <?php 
session_start();
             
  if ($_SESSION["autenticado"] == "SI") 
  {
     $consulta_dat_usuario = sprintf("SELECT * FROM usuario WHERE usuNomFan= '%s'",$_SESSION["usuario"]);
  //   $registro_usuario = mysql_query($consulta_dat_usuario, $miConexion) or die(mysql_error());
     $fila_usuario = mysql_fetch_assoc($registro_usuario);
      
     //sino, calculamos el tiempo transcurrido  
       $fechaGuardada = $_SESSION["ultimoAcceso"]; 
       $ahora = date("Y-n-j H:i:s"); 
       $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));   

      //comparamos el tiempo transcurrido  
        if($tiempo_transcurrido >= 60)
        {  
         //si pasaron 10 minutos o más  
          session_destroy(); // destruyo la sesión  
          header("Location:index.php"); //envío al usuario a la pag. de autenticación  
      //sino, actualizo la fecha de la sesión  
        }else{  
              $_SESSION["ultimoAcceso"] = $ahora;  
             }   
  }
 ?> 
