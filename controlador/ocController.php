<?php

include_once '../conexion/conexion.php';
$obj2 = new conex ();
$obj2->conectar();

include("../modelo/ocModels.php");
$obj= new ordencompra();

include("../modelo/Seg_Models.php");
$Seg_m = new Seg_Models();

if(isset($_POST['fecha']) && isset($_POST['IdEmpresa']) && isset($_POST['EmpresaRuc']) && isset($_POST['componen']) )
    {
     
    $nom = $_POST["nom"];
    $fecha = $_POST["fecha"];
    $id_empresa= $_POST["IdEmpresa"];
    $EmpRuc= $_POST["EmpresaRuc"];
    $EmpDir= $_POST["EmpesaDir"];

    $EmpProv=$_POST["IdProve"];
    $EmpleProv= $_POST["EmpleadoProv"];
    $ProvDir= $_POST["ProDir"];

    $Fpago= $_POST["Fpago"];
    $LugarEntrega= $_POST["LugEntrega"];
    $RefCot= $_POST["RefCot"];
    $Equipo= $_POST["Equipo"];
    $Referencia = $_POST["Referencia"];
    
    $Subtotal= $_POST["Subtotal"];
    $Igv=$_POST["Igv"];
    $Completo= $_POST["Completo"];
    $Moneda= $_POST["Moneda"];
    $idusu= $_POST["idusu"];
    

        
    $obj->ins_oc($idusu,$EmpProv,$id_empresa,$EmpleProv,$fecha,$Fpago,$LugarEntrega,$RefCot,$Equipo,$Subtotal,$Igv,$Completo,$Referencia,$Moneda);
    $id = mysql_insert_id();
    
    
    if(isset($_POST['componen']))
        {

        $comp = ($_POST['componen']);
        $compo = ltrim($comp);
        $com = explode(',',($compo)); // LO SEPARO CON UN DELIMITADOR POR COMAS

        // RECIBOS DATOS DEL ARREGLO NPARTE
        $npart = ($_POST['nparte']);
        $nparte = ltrim($npart);
        $npart = explode(',',($nparte));

        // RECIBOS DATOS DEL ARREGLO CANTIDAD
        $cantidad = ($_POST['cant']);
        $cant = explode(',',$cantidad);

        // RECIBOS DATOS DEL ARREGLO PRECIO
        $precio = ($_POST['precio']);
        $pre = explode(',',$precio);

        // RECIBOS DATOS DEL ARREGLO TOTAL
        $total = ($_POST['total']);
        $tot = explode(',',$total);

        //for ($index = 0; $index < count($com) - 1 ; $index++)
        //    {
        //    echo $com[$index].'<br>';
        //    echo $npart[$index].'<br>';
        //    echo $cant[$index].'<br>';
        //    echo $pre[$index].'<br>';
        //    echo $tot[$index].'<br>';

            $obj->ins_detalle_Oc($id,$com, $npart, $cant, $pre, $tot);
            $Seg_m->ins_seg($id,$com, $npart, $cant);
           // } 

        }
    }    

    
    
    if(isset($_GET['id_anular']))
        {
        
        $obj->Eliminar_oc($_GET['id_anular']);
      
        }
    

if(isset($_POST['idEm'])){
    $id_emp = $_POST['idEm']; 
    
        $obj->imprimircombo_ruc("select * from mi_empresa where id_mi_empresa ='".$id_emp."'");
      
}

if(isset($_POST['idEm2'])){
    $id_emp2 = $_POST['idEm2']; 
    
        
        $obj->imprimircombo_dir("select * from mi_empresa where id_mi_empresa ='".$id_emp2."'");
    
}

if(isset($_POST['idPro'])){
    
                        $id_Pro = $_POST['idPro'];
                       
                     
               echo '<td>';
                echo '<select  name="comboEmp_Pro" class=form-control required>';
                    echo '<option value=""> SELECCIONE ...</option>'; 
                        $obj->imprimircombo_EmpProv("select * from empleado where id_prove = ".$id_Pro." and estado = 'SI' ");
                   echo '</select>';
                       echo '</td>';
                       }

if(isset($_POST['idProDir'])){
    
    $id_Pro = $_POST['idProDir'];
    $obj->imprimir_dirPro("select * from proveedor where id_prove = ".$id_Pro." ");
}


if(isset($_POST['b'])){
      
      $obj->buscarOc($_POST['b']);
}


if(isset($_POST['mes'])) //BUSQUEDA DETALLADA DE OC
{
  $obj->FiltroOc($_POST['ano'],$_POST['mes'],$_POST['Empresa'],$_POST['Prov'],$_POST['Equipo']);  
    
    
}
  

if(isset($_GET['q'])) //AUTO COMPLETA PROVEEDOR
{
    $color = $_GET['q'];
    
    $obj->AutoCompletePro($color);
    
}

if(isset($_GET['q2'])) //AUTO COMPLETA PROVEEDOR
{
    $color = $_GET['q2'];
    
    $obj->AutoCompletePro($color);
    
}

if(isset($_GET['autoEquipo'])) //AUTO COMPLETA EQUIPO
{
    $equipo = $_GET['autoEquipo'];
    
    $obj->AutoCompleteEquipo($equipo);
    
}

if(isset($_GET['autoEquipoocphp'])) //AUTO COMPLETA EQUIPO PARA OC.PHP
{ 
    $equipo = $_GET['autoEquipoocphp'];
    
    $obj->AutoCompleteEquipo($equipo);
    
}





if(isset($_POST['bxi'])) //BUSQUEDA RAPIDA DE OC X ITEM
{
      
    $obj->buscar_oc_x_items($_POST['bxi']);
    
}


if(isset($_POST['mesdet']) ) //BUSQUEDA DETALLADA DE OC
{
 
  $obj->Bus_oc_x_i_Det($_POST['ano'],$_POST['mesdet'],$_POST['compo'],$_POST['nparte'],$_POST['equipo']);  
    
    
}


if(isset($_POST['nomproveedor']) ) //BUSQUEDA DETALLADA DE OC
{
 
    
  $obj->traer_id_prov($_POST['nomproveedor']);  
    
    
}





//---------------------------------------------------------------

