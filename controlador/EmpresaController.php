


<?php
include_once '../conexion/conexion.php';
include_once '../modelo/MiEmpresa.php';


$obj = new conex ();
$obj->conectar();

      
$obj2 = new MiEmpresa();

  if(isset($_POST['b'])){
      
      $obj2->buscar2($_POST['b']);
  }



$obj2 = new MiEmpresa();
// INSERTAR
if( isset($_POST['txtnombre']) && isset($_POST['txtruc']) && isset($_POST['txtdireccion'])){
//$obj2-> ins_empresa("insert into mi_empresa (nombre,ruc,direccion) values ('$nom','$ruc','$dire')");
//$obj2-> ins_empresa("call USP_I_AgregarEmpresa ('$nom','$ruc','$dire')");
$obj2->ins_empresa($_POST["txtnombre"], $_POST["txtruc"],$_POST["txtdireccion"]);
}

// MODIFICAR 
if(isset($_GET["nombre_editar"]) && isset($_GET["ruc_editar"]) && isset($_GET["direccion_editar"]) && isset($_GET["id"])){

$obj2->mod_empresa($_GET["nombre_editar"],$_GET["ruc_editar"],$_GET["direccion_editar"],$_GET["id"]);
//header("Refresh:0; url=../vistas/Ver_Empresa.php");

}
//header ("Location:../vistas/Ver_Empresa");

//ELIMINAR 

if(isset($_GET["id_eliminar"])){
    
    $obj2->Eliminar_empresa($_GET["id_eliminar"]);
}




