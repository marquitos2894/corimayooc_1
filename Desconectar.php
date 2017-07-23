<?php
session_start();

if($_SESSION['id_usu'])
{
    session_destroy();
   echo 
    '<script language = javascript>
          alert("Sesion cerrarda correctamente")
          self.location = "index.php" 
          </script>';
    
}
 else
 {
        echo 
    '<script language = javascript>
          alert("No ha iniciado ninguna sesion")
          self.location = "index.php" 
          </script>';
 }


?>
