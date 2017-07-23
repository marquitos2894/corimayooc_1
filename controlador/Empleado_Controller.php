
<?php


include_once '../conexion/conexion.php';
include_once '../modelo/EmpleadoModels.php';


$obj = new conex ();
$obj->conectar();

      
$obj2 = new Emp_Proveedor();

  if(isset($_POST['b'])){
      
      $obj2->buscar_Emp_Prove($_POST['b']);
  }

// INSERTAR
if( isset($_POST['txtnombre']) && isset($_POST['txtcorreo']) && isset($_POST['txtdireccion']) && isset($_POST['txtdni'])&& isset($_POST['IdPr'])){
//$obj2-> ins_empresa("insert into mi_empresa (nombre,ruc,direccion) values ('$nom','$ruc','$dire')");
//$obj2-> ins_empresa("call USP_I_AgregarEmpresa ('$nom','$ruc','$dire')");
$obj2->ins_Emp_Prove($_POST["IdPr"],$_POST["txtnombre"], $_POST["txtcorreo"],$_POST["txtdireccion"],$_POST["txtdni"]);
}

// MODIFICAR 
if(isset($_GET["nombre_editar"]) && isset($_GET["correo_editar"]) && isset($_GET["direccion_editar"])){

$obj2->mod_Emp_Prove($_GET["IdPr"],$_GET["nombre_editar"],$_GET["correo_editar"],$_GET["direccion_editar"],$_GET["dni_editar"],$_GET["id"]);
//header("Refresh:0; url=../vistas/Ver_Empresa.php");

}
//header ("Location:../vistas/Ver_Empresa");

//ELIMINAR 

if(isset($_GET["id_eliminar"])){
    
    $obj2->Eliminar_Emp_Prove($_GET["id_eliminar"]);
}

if(isset($_POST["id_nom"])){
    $id_emp_prov=$_POST["id_nom"];
    
    $obj2->nom_prov("select * from proveedor where id_prove=".$id_emp_prov."");
}

if(isset($_POST["id_prov_edita"])){
    $id_emp_prov=$_POST["id_prov_edita"];
    
    $obj2->nom_prov("select * from proveedor where id_prove=".$id_emp_prov."");
}


if(isset($_POST['nomproveedor']) ) //BUSQUEDA DETALLADA DE OC
{
     
  $obj2->traer_id_prov($_POST['nomproveedor']);  
       
}



