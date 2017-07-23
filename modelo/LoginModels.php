<?php


class Login
{
    var $datos;
    
    
function Mostrar_dato($pos,$id)
{
      $this->datos = mysql_query("select * from usuario where id_usu= '".$id."'"); 
      $reg = mysql_fetch_array($this->datos);
      
      echo $reg[$pos];
}
    
}



?>