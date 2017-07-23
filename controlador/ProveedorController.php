<link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<?php
include_once '../conexion/conexion.php';
include_once '../modelo/ProveedorModels.php';


$obj = new conex();
$obj->conectar();

$obj2 = new Proveedor();

if(isset($_POST['b']))
    {
        $obj2->buscarProve($_POST['b']);
    }



// INSERTAR
if( isset($_POST['txtnombre']) && isset($_POST['txtruc']) && isset($_POST['txtdireccion'])){
//$obj2-> ins_empresa("insert into mi_empresa (nombre,ruc,direccion) values ('$nom','$ruc','$dire')");
//$obj2-> ins_empresa("call USP_I_AgregarEmpresa ('$nom','$ruc','$dire')");
$obj2->ins_Prove($_POST["txtnombre"], $_POST["txtruc"],$_POST["txtdireccion"]);
}

// MODIFICAR 
if(isset($_GET["nombre_editar"]) && isset($_GET["ruc_editar"]) && isset($_GET["direccion_editar"])){

$obj2->mod_Prove($_GET["nombre_editar"],$_GET["ruc_editar"],$_GET["direccion_editar"],$_GET["id"]);
//header("Refresh:0; url=../vistas/Ver_Empresa.php");

}
//header ("Location:../vistas/Ver_Empresa");

//ELIMINAR 

if(isset($_GET["id_eliminar"])){
    
    $obj2->Eliminar_Prove($_GET["id_eliminar"]);
}
