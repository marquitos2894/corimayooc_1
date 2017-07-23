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

include '../../conexion/conexion.php';
$conex = new conex();
$conex->conectar();


include '../../modelo/unidadmodels.php';
$modelunidad = new unidad();


?>

<html><!DOCTYPE html>
    
        <head>

        <!-- BOOTSTRAP -->
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
         <!-- FIN BOOTSTRAP -->
         
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
    </head>

    <body> 
        
        <form name="FrmInsEmpresa" method="POST" action="../../controlador/EquiposController.php">
                <center><h2>NUEVO EQUIPO</h2></center>
                <section>
                    <div class="table-responsive">
                        <table  border="1" class="table table-hover">
                            <tr>
                                <td><input type="text" name="txtnombre" id="idnom" placeholder="NOMBRE DE EQUIPO : Ejm DD311/JUA25" class="form-control"  required/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="txttipo" id="idruc" placeholder="TIPO : Ejm SCOOP O JUMBO O SCALER , ETC " class="form-control" /></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="txtmarca" id="iddirec" placeholder="MARCA: Ejm CAT, SANDVIK, ATLAS COPCO ,ETC" class="form-control"  /></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="txtmodelo" id="iddirec" placeholder="MODELO :  Ejm R1300, DD311 , QUASAR" class="form-control"  /></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="txtnserie" id="iddirec" placeholder="Num SERIE" class="form-control" autocomplete="off" /></td>
                            </tr>
                         
                            <tr>
                                <td><select  required name="combounidad" class="text2" required>
                                     <option> SELECIONE UNIDAD</option>
                                    <?php $modelunidad->imprimir_combo_general("select * from unidad where estado= 'si'",0,1); ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><input type="submit" value="GUARDAR" name="btnGuardar" class="btn btn-success btn-lg btn-block"/></td>

                            </tr> 
                        </table>
                    </div>
                </section>
            </form>

    </body>
    
    <footer>
    
    
    </footer>
</html>
     <!-- INICIA BOOTSTRAP -->
        