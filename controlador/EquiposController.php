
<link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<?php
include_once '../conexion/conexion.php';
include_once '../modelo/EquiposModels.php';


$obj = new conex ();
$obj->conectar();

      
$obj2 = new Equipos();

  if(isset($_POST['b'])){
      
      $obj2->BuscarEquipos($_POST['b']);
  }


// INSERTAR
if( isset($_POST['txtnombre']) && isset($_POST['txttipo']) && isset($_POST['txtmarca']) && isset($_POST['txtmodelo'])&& isset($_POST['txtnserie']) && isset($_POST['combounidad']) ){ 
//$obj2-> ins_empresa("insert into mi_empresa (nombre,ruc,direccion) values ('$nom','$ruc','$dire')");
//$obj2-> ins_empresa("call USP_I_AgregarEmpresa ('$nom','$ruc','$dire')");
$obj2->Ins_Equipos($_POST['txtnombre'],$_POST['txttipo'],$_POST['txtmarca'],$_POST['txtmodelo'],$_POST['txtnserie'],$_POST['combounidad']);
}

// MODIFICAR 
if(isset($_GET["nombre_editar"]) && isset($_GET["tipo_editar"]) && isset($_GET["marca_editar"]) && isset($_GET["modelo_editar"]) && isset($_GET["nserie_editar"]) && isset($_GET["id"])&& isset($_GET["unidad_editar"]) ){

$obj2->Mod_Equipos($_GET["nombre_editar"],$_GET["tipo_editar"],$_GET["marca_editar"],$_GET["modelo_editar"],$_GET["nserie_editar"],$_GET["id"],$_GET['unidad_editar']);
//header("Refresh:0; url=../vistas/Ver_Empresa.php");

}
//header ("Location:../vistas/Ver_Empresa");

//ELIMINAR 

if(isset($_GET["id_eliminar"])){
    
    $obj2->Eliminar_Equipos($_GET["id_eliminar"]);
}




