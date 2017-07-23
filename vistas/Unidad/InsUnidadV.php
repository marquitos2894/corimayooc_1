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


<html><!DOCTYPE html>
    <head>

<!--         BOOTSTRAP -->
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
<!--          FIN BOOTSTRAP -->
         
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
    </head>

    <body> 
        
        <form name="FrmInsUnidad" method="POST" action="../../controlador/UnidadController.php">
                
                <center><h2>UNIDAD</h2></center>
                <section>
                    <div class="table-responsive">
                        <table  border="1" class="table table-hover">
                            <tr>
                                <td><input title="INGRESE EL NOMBRE DE LA UNIDAD" type="text" name="txtnombre" id="idnom" placeholder="NOMBRE DE LA UNIDAD" class="form-control" autocomplete="off" required/></td>
                            </tr>
                            <tr>
                                <td><input   type="text" name="txtubicacion" id="idubicacion" placeholder="UBICACION DE LA UNIDAD : Ejem: Trujillo, pataz, parcoy, retamas " class="form-control"  autocomplete="off"/></td>
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
        