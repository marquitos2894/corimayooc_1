<link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<?php
include_once '../conexion/conexion.php';
include_once '../modelo/Seg_Models.php';

$obj = new conex();
$obj->conectar();

$seg = new Seg_Models();



if(isset($_GET["nombre_editar"]) && isset($_GET["ubicacion_editar"]) && isset($_GET["id"])){

$obj2->mod_unidad($_GET["nombre_editar"],$_GET["ubicacion_editar"],$_GET["id"]);
//header("Refresh:0; url=../vistas/Ver_Empresa.php");

}

//$cant = $_POST["cant"];


if(isset($_POST["id_seg"],$_POST["cant"]))
 {
    $cant = (int)$_POST["cant"];
    
   $seg->Actualizar_seg($_POST["id_seg"], $cant);
   
   $seg->Insert_historial($_POST["id_seg"], $_POST["fecha"], $cant,$_POST["Gremi"]);
    

 }



?>