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
	require ("../../modelo/MiEmpresa.php");
	$objModelo = new MiEmpresa();
?>

<!DOCTYPE html>
<html>
    <head>
        
         <!-- BOOTSTRAP -->
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
         <!-- FIN BOOTSTRAP -->
         <!-- ESTILOS -->
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
         <!-- FIN ESTILOS -->
         <!-- JS -->
        <script type="text/javascript" src="../../ajax/ajax.js"></script>
          
         <!-- FIN DE JS -->
         
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
               
        <title>Editar</title>
        
        <script type="text/javascript">
                var nombre = "", ruc="", direccion="";	

                function ModificarInformacion(){
                        nombre = document.getElementById("nombre_editar").value;
                        ruc = document.getElementById("ruc_editar").value;
                        direccion = document.getElementById("direccion_editar").value;

                        id = document.getElementById("id_editar").value;

                        if(nombre!="" && ruc!="" ){
                                ajax_("../../controlador/EmpresaController.php?nombre_editar="+nombre+"&ruc_editar="+ruc+"&direccion_editar="+direccion+"&id="+id);

                        }else{
                                alert("Ingrese toda la informacion.");
                        }		
                }
        </script>

  
    </head>

    <body>
        <form>
          <?php	
                        if(isset($_GET["nombre"]) && isset($_GET["ruc"]) && isset($_GET["direccion"])){
                                $id=$_GET["id"];
                                $nombre=$_GET["nombre"];
                                $ruc=$_GET["ruc"];
                                $direccion=$_GET["direccion"];

                                }
                ?>
          
            <div class="table-responsive">
                <table width="200" border="0" align="center" class="table table-hover">
                    <tr>
                        <td><input type="hidden" name="id_editar" id="id_editar" value="<?php echo $id; ?>" /> </td>
                    </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><input type="text" name="nombre_editar" id="nombre_editar" class="form-control" value="<?php echo $nombre; ?>" autocomplete="off" /></td>
                    </tr>
                    <tr>
                      <td>Ruc</td>
                      <td><input title="SOLO NUMEROS"  type="text" name="ruc_editar" class="form-control" id="ruc_editar" value="<?php echo $ruc; ?>" pattern="[0-9]+" autocomplete="off"/></td>
                    </tr>
                    <tr>
                      <td>Direccion</td>
                      <td><input type="text" name="direccion_editar" class="form-control" id="direccion_editar"  value="<?php echo $direccion; ?>" autocomplete="off" /></td>
                    </tr>
                    
                </table>
                <div id="resultado" align="center"></div><br>
                      <input type="button" value="Modificar" onclick="ModificarInformacion();"  class="btn btn-success btn-lg btn-block"/>
                    
            </div>
          
       </form> 
    </body>
</html>