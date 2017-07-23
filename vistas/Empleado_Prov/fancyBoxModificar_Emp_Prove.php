<?php 
@session_start();
if(!$_SESSION)
{
    echo '<script language = javascript>
        alert("Debe iniciar Sesion")
        self.location = "../../index.php" 
        </script>';
    
}   

$id_usu = $_SESSION['id_usu'];
?>



<?php 
require_once '../../conexion/conexion.php';
$objconex = new conex();
$objconex ->conectar();

	require ("../../modelo/EmpleadoModels.php");
	$objModelo = new Emp_Proveedor();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Editar</title>
        
         <!-- BOOTSTRAP -->
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
         <!-- FIN BOOTSTRAP -->
         <!-- ESTILOS -->
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/estiloBusqueda.css" rel="stylesheet" type="text/css"/>
         <!-- FIN ESTILOS -->
         <!-- JS -->
        <script type="text/javascript" src="../../ajax/ajax.js"></script>
        <script src="../../jquery/jquery-1.5.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../ajax/AjaxOC.js"></script>   
        <script src="../../ajax/ajaxdatos.js" type="text/javascript"></script>
                       
        <!-- FIN DE JS -->
        
         <!-- AUTO COMPLETADO-->
          <script src="../../ajax/ajax_auto_completado.js" type="text/javascript"></script>
        <link href="../../jquery-iu/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="../../jquery-iu/jquery-ui.min.js" type="text/javascript"></script>
        
     
        <meta name="viewport" content="width=device-width, initial-scale=1 ">
        
        <script type="text/javascript">
            var  id_prov="" ,nombre = "", correo="", direccion="" , dni="";	

            function modificarInformacion()
            {

                id_prov=document.getElementById("IdPr").value;
                nombre = document.getElementById("nombre_editar").value;
                correo = document.getElementById("correo_editar").value;
                direccion = document.getElementById("direccion_editar").value;
                dni = document.getElementById("dni_editar").value;

                id = document.getElementById("id_editar").value;
                if(nombre!="" && id_prov !="")
                {
                    ajax_("../../controlador/Empleado_Controller.php?nombre_editar="+nombre+"&correo_editar="+correo+"&direccion_editar="+direccion+"&dni_editar="+dni+"&id="+id+"&IdPr="+id_prov);
                }
                else
                {
                    alert("Ingrese toda la informacion; Obligatorio NOMBRE, DNI, PROVEEDOR.");
                }

            }
            
          function ValidaSoloNumeros() 
          {
             if ((event.keyCode < 48) || (event.keyCode > 57)) 
             event.returnValue = false;
          }

          function identidadtext()
          {

    //          document.getElementById("Text2").value = document.getElementById("Text1").value;
    //          document.getElementById("Text1").value=document.getElementById("Text2").value;
    //          document.getElementById("idprove").value = document.getElementById("id_proveedor_edita").value;
                document.getElementById("id_proveedor_editar").value = document.getElementById("idprove").value;
          }


        </script>

        
        
        	
    </head>

    <body onload="enviar_id_editaprov(),identidadtext();">
        <form name="frm_modificar_Emp_prov">
            
            
                    <?php	
                        if(isset($_GET["id_emple"])){
                            
                                $id_emple=$_GET["id_emple"];
                                $nombre=$_GET["nombre"];
                                $correo=$_GET["correo"];
                                $direccion=$_GET["direccion"];
                                $dni=$_GET["dni"];
                                $id_prove=$_GET["id_prove"];

                                }
                        ?>
            
            

            <center><h2>MODIFICAR TRABAJADOR </h2></center>
            <div class="table-responsive"> 
                  <table class="table table-hover">
                    <tr>
                         <td><input type="hidden" name="id_editar" id="id_editar" value="<?php echo  $id_emple; ?>" /> </td>
                    </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><input title="POR FAVOR INGRESE EL NOMBRE "  type="text" name="nombre_editar" id="nombre_editar" value="<?php echo $nombre; ?>" class="form-control" autocomplete="off" /></td>
                    </tr>
                    <tr>
                      <td>Correo</td>
                      <td><input type="text" name="correo_editar" id="correo_editar" value="<?php echo $correo; ?>" class="form-control" autocomplete="off"/></td>
                    </tr>
                    <tr>
                      <td>Direccion</td>
                      <td><input type="text" name="direccion_editar" id="direccion_editar"  value="<?php echo $direccion; ?>" class="form-control" autocomplete="off"/></td>
                    </tr>
                    <tr>
                      <td>DNI</td>
                      <td><input title="SOLO NUMEROS" type="text" name="dni_editar" id="dni_editar"  value="<?php echo $dni; ?>" class="form-control" autocomplete="off"  onkeypress="ValidaSoloNumeros()" /></td>
                    </tr>

                    <div  style="display:none;" id='idp_ajax_mod_emp'></div>
                    <tr><td>Proveedor </td>
                        <td><input type="search"  id="IdProveedor"   placeholder="Busca su proveedor"  value="<?php  $objModelo->datos_prove($id_prove,1); ?>"   class="form-control" required ></td>
                    <td><input type="hidden"  id="IdPr"   placeholder=""  value="<?php echo  $id_prove; ?>"  class="form-control"></td>
                    </tr>
                    
                    <tr>
                         <div id="resultado" align="center"></div>
                      <td colspan="3" align="center"><input type="button" value="Modificar" onclick="ajax_traer_id_prove_mod_emp(),modificarInformacion();" class="btn btn-success btn-lg btn-block"/></td>
                    </tr>
                    
                    
                    
                  </table>
                
                    
                 
            </div>
        </form>

    </body>
</html>