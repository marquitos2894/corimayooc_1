
<link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<?php
include_once '../conexion/conexion.php';
include_once '../modelo/unidadmodels.php';


$obj = new conex ();
$obj->conectar();

      
$obj2 = new unidad();

  if(isset($_POST['b'])){
      
      $obj2->buscar_unidad($_POST['b']);
  }




// INSERTAR
if( isset($_POST['txtnombre']) && isset($_POST['txtubicacion']) ){

$obj2->ins_unidad($_POST["txtnombre"], $_POST["txtubicacion"]);
}

// MODIFICAR 
if(isset($_GET["nombre_editar"]) && isset($_GET["ubicacion_editar"]) && isset($_GET["id"])){

$obj2->mod_unidad($_GET["nombre_editar"],$_GET["ubicacion_editar"],$_GET["id"]);
//header("Refresh:0; url=../vistas/Ver_Empresa.php");

}
//header ("Location:../vistas/Ver_Empresa");

//ELIMINAR 

if(isset($_GET["id_eliminar"])){
    
    $obj2->eliminar_unidad($_GET["id_eliminar"]);
}




