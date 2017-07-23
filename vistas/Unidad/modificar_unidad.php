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
                var nombre = "", ubicacion="";	

                function ModificarInformacion(){
                        nombre = document.getElementById("nombre_editar").value;
                        ubicacion = document.getElementById("ubicacion_editar").value;
                        id = document.getElementById("id_editar").value;

                        if(nombre != "" ){
                               
                                ajax_("../../controlador/UnidadController.php?nombre_editar="+nombre+"&ubicacion_editar="+ubicacion+"&id="+id);
                        }else{
                                alert("Ingrese el nombre de la unidad");
                        }		
                }
        </script>

  
    </head>

    <body>
        <form>
                          <?php	
                        if(isset($_GET["id"])){
                            
                                $id=$_GET["id"];
                                $nombre=$_GET["nombre"];
                                $ubicacion=$_GET["ubicacion"];
                       

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
                      <td>Ubicacion</td>
                      <td><input  type="text" name="ubicacion_editar" class="form-control" id="ubicacion_editar" value="<?php echo $ubicacion; ?>"  autocomplete="off"/></td>
                    </tr>
            
                    
                </table>
                <div id="resultado" align="center"></div><br>
                      <input type="button" value="Modificar" onclick="ModificarInformacion();"  class="btn btn-success btn-lg btn-block"/>
                    
            </div>
          
       </form> 
    </body>
</html>