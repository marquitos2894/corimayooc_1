<?php

include_once '../conexion/conexion.php';

$conexion = new conex();
$conexion->conectar();



session_start();

$email=$_POST['txtemail'];
$pass=$_POST['txtpass'];



$query=  mysql_query("select * from  usuario where Correo='".$email."' and Clave='".$pass."' ");
$reg = mysql_fetch_array($query);


if (!$reg[0])
       
{
    echo '<script language = javascript>
          alert("usuario o password incorrecto")
          self.location = "../../index.php" 
          </script>';
   
    
}
else 
{
$_SESSION['id_usu'] = $reg['id_usu'];
$_SESSION['Correo'] = $reg['Correo'];
   
header('Location: ../../Inicio.php');
}    













?>