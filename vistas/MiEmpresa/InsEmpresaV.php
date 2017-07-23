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
        
            <form name="FrmInsEmpresa" method="POST" action="../../controlador/EmpresaController.php">
                
                <center><h2>NUEVA EMPRESA</h2></center>
                <section>
                    <div class="table-responsive">
                        <table  border="1" class="table table-hover">
                            <tr>
                                <td><input title="INGRESE EL NOMBRE DE LA EMPRESA" type="text" name="txtnombre" id="idnom" placeholder="NOMBRE DE EMPRESA" class="form-control" autocomplete="off" required/></td>
                            </tr>
                            <tr>
                                <td><input title="SOLO NUMEROS"  type="text" name="txtruc" id="idruc" placeholder="RUC" class="form-control" pattern="[0-9]+" autocomplete="off"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="txtdireccion" id="iddirec" placeholder="DIRECCION" class="form-control" autocomplete="off" /></td>
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
        