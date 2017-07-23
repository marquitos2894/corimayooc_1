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
	include '../../conexion/conexion.php';
$conex = new conex();
$conex->conectar();


include '../../modelo/unidadmodels.php';
$modelunidad = new unidad();
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
                var nombre = "", tipo="", marca=""
                , modelo="", nserie="",  unidad="";	

                function ModificarInformacion(){
                        nombre = document.getElementById("nombre_editar").value;
                        tipo = document.getElementById("tipo_editar").value;
                        marca = document.getElementById("marca_editar").value;
                        modelo = document.getElementById("modelo_editar").value;
                        nserie = document.getElementById("nserie_editar").value;
                        unidad = document.getElementById("combounidad").value;

                        id = document.getElementById("id_editar").value;

                        if(nombre!="" && unidad!=""){
                                ajax_("../../controlador/EquiposController.php?nombre_editar="+nombre+"&tipo_editar="+tipo+"&marca_editar="+marca+"&modelo_editar="+modelo+"&nserie_editar="+nserie+"&unidad_editar="+unidad+"&id="+id);

                        }else{
                                alert("Ingrese toda la informacion.");
                        }		
                }
        </script>


    </head>

    <body>
        <form>
          <?php	
                        if(isset($_GET["nombre"]) && isset($_GET["tipo"]) && isset($_GET["marca"])){
                                $id=$_GET["id"];
                                $nombre=$_GET["nombre"];
                                $tipo=$_GET["tipo"];
                                $marca=$_GET["marca"];
                                $modelo=$_GET["modelo"];
                                $nserie=$_GET["nserie"];
                                $unidad=$_GET["unidad"];
                                }
          
         
                ?>
          
            <div class="table-responsive">
                <table width="200" border="0" align="center" class="table table-hover">
                    <tr>
                        <td><input type="hidden" name="id_editar" id="id_editar" value="<?php echo $id; ?>" /> </td>
                    </tr>
                    <tr>
                      <td>NOMBRE</td>
                      <td><input type="text" name="nombre_editar" id="nombre_editar" class="form-control" value="<?php echo $nombre; ?>" autocomplete="off" /></td>
                    </tr>
                    <tr>
                      <td>TIPO</td>
                      <td><input type="text" name="tipo_editar" class="form-control" id="tipo_editar" value="<?php echo $tipo; ?>" autocomplete="off"/></td>
                    </tr>
                    <tr>
                      <td>MARCA</td>
                      <td><input type="text" name="marca_editar" class="form-control" id="marca_editar"  value="<?php echo $marca; ?>" autocomplete="off" /></td>
                    </tr>
                    <tr>
                      <td>MODELO</td>
                      <td><input type="text" name="modelo_editar" class="form-control" id="modelo_editar"  value="<?php echo $modelo; ?>" autocomplete="off" /></td>
                    </tr>
                    <tr>
                      <td>N SERIE</td>
                      <td><input type="text" name="nserie_editar" class="form-control" id="nserie_editar"  value="<?php echo $nserie; ?>" autocomplete="off" /></td>
                    </tr>
<!--                    <tr>
                      <td>ESTADO</td>
                        <td><select name="ComboEstado_editar22" class="text2" id="ComboEstado_editar" value="">
                                <option value="<?php //echo $estado;?>" selected><?php //echo $estado;?></option>
                                     <option value="TALLER">TALLER</option>
                                     <option value="MINA">MINA</option>
                                     </select></td>
                    </tr>-->
                    
                    <tr>
                        <td>UNIDAD </td>
                        <td><select  required name="combounidad" id="combounidad" class="text2" required>
                                <option value="<?php echo $unidad ?>" selected><?php $modelunidad->Extraer_nom($unidad) ?></option>
                            <?php $modelunidad->imprimir_combo_general("select * from unidad where estado= 'si'",0,1); ?>
                            </select>
                        </td>
                    </tr>
                                        
                    
                </table>
                <div id="resultado" align="center"></div><br>
                      <input type="button" value="Modificar" onclick="ModificarInformacion();"  class="btn btn-success btn-lg btn-block"/>
                    
            </div>
          
       </form> 
    </body>
</html>