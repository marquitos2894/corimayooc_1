<?php 
@session_start();
if(!$_SESSION)
{
    echo '<script language = javascript>
        alert("Debe iniciar Sesion")
        self.location = "../../index.php"" 
        </script>';
    
}   

$id_usu = $_SESSION['id_usu'];
?>


<?php 
include_once '../../conexion/conexion.php';
$obj2 = new conex ();
$obj2->conectar();

?>

<html>
    
    <head>
        
        <!-- BOOTSTRAP -->
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
        <!-- FIN BOOTSTRAP -->
       
        <!-- CSS -->
        <link href="../../css/estiloBusqueda.css" rel="stylesheet" type="text/css"/>
         <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <!-- FIN CSS -->
        <script src="../../jquery/jquery-1.5.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../ajax/AjaxOC.js"></script>  
        <script src="../../ajax/ajaxdatos.js" type="text/javascript"></script>
           <!-- FIN JS Y JQUERY  -->
           
            <!-- AUTO COMPLETADO-->
          <script src="../../ajax/ajax_auto_completado.js" type="text/javascript"></script>
        <link href="../../jquery-iu/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="../../jquery-iu/jquery-ui.min.js" type="text/javascript"></script>
         
  
    </head>
    <body>
        <form name="Frm_Ins_Emp_Prov" method="POST" action="../../controlador/Empleado_Controller.php" onsubmit="return ajax_traer_id_prove_mod_emp()">

       
            <center><h2>NUEVO TRABAJADOR </h2></center>
            <input type="text"  id="IdPr"  name="IdPr"  placeholder=""  value=""  class="form-control" readonly>               
             <div  style="display:none;" id='idp_ajax_mod_emp'></div>
            <div class="table-responsive">
                
                <table class="table table-hover">
                    <tr>
                        <td><input type="text" name="txtnombre" id="idnom" placeholder="NOMBRE DE EMPLEADO" class="form-control" autocomplete="off" required/></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="txtcorreo" id="idcorreo" placeholder="CORREO ELECTRONICO ejemplo : example@mail.com" class="form-control" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtdireccion" id="iddirec" placeholder="DIRECCION ejemplo : Av. Las Brisas 5455 - choriillos " class="form-control" autocomplete="off" /></td>
                    </tr>
                    <tr>
                        <td><input  title="SOLO NUMEROS"  type="text" name="txtdni" id="iddni" placeholder="INGRESE DNI" class="form-control" pattern="[0-9]+" autocomplete="off"/></td>
                    </tr>
                                     
                    <tr>
                        <td><input required type="search"  id="IdProveedor"   placeholder="Busca su proveedor"  value=""   class="form-control"></td>
                    </tr>
                    <tr>
                        
                        <td><input type="submit" value="Guardar"  class="btn btn-success btn-lg btn-block"  />
                    </tr>
                </table>
            </div>
        </form>
    </body>     
</html>         
         