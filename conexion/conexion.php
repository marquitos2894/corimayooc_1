<?php 

class conex {
   var $bd = 'ordencompra';
    function conectar(){
        $conex = @mysql_connect('localhost','root','marquitosxD')
        // conexion cloud sql google //$conex = @mysql_connect('107.178.209.166','root','marquitosxD')
          or die('error de conexion');
	mysql_select_db($this->bd,$conex);
	
                }

    function cerrar() {
        mysql_close();
    }
                
    }
