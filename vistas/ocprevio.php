<?php 
@session_start();
if(!$_SESSION)
{
    echo '<script language = javascript>
        alert("Debe iniciar Sesion")
        self.location = "../index.php" 
        </script>';
    
}   

$id_usu = $_SESSION['id_usu'];
?>


<?php
include_once '../conexion/conexion.php';
$obj2 = new conex ();
$obj2->conectar();


include("../modelo/ocModels.php");
$obj= new ordencompra;

    if(isset($_POST['componente']) && ($_POST['componente']))
        {
        //DATOS PARA TABLE DETALLE OC
       $componente=$_POST["componente"];
        $nparte= $_POST["nparte"];
        $cantidad= $_POST["cantidad"];
        $precio= $_POST["precio"];
        $total= $_POST["total"];
        
        
       // DATOS TABLE OC
        $fecha = $_POST["fecha"];
        
        
        //// EMPRESA////
        $id_empresa= $_POST["comboEmpresa"];
        $EmpRuc= $_POST["EmpresaRuc"];
        $EmpDir= $_POST["EmpresaDir"];
        
        

        ////// PROVEEDOR/////
        
        $EmpProv= $_POST["idp"] ; 
        $EmpleProv= $_POST["comboEmp_Pro"];
        $ProvDir= $_POST["ProDir"];

        
        /////DATOS GENERALES///
        $Fpago= $_POST["Fpago"];
        $LugarEntrega= $_POST["LugarEntrega"];
        $RefCot= $_POST["RefCot"];
        $Referencia= $_POST["Referencia"];
        $Equipo= $_POST["txtEquipo"];
        
          ///DATOS COSTO
        
        $Subtotal= $_POST["subtotal"];
        $igv= $_POST["igv"];
        $completo= $_POST["completo"];
        $moneda= $_POST["Moneda"];
        
        
        
        
     ?>


<script type="text/javascript">
    function recargar()
    {
   window.opener.location.href='oc.php';
    }
</script>

<html>
    
    <head>
        
    <!-- BOOTSTRAP -->
        <link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
         <!-- FIN BOOTSTRAP -->
         
        <link href="../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <link href="../css/fuente.css" rel="stylesheet" type="text/css"/>    
        
        
    </head>
    
    
    <body onload="">
                
        <h2 align="center">Emision de Orden de Compra <?php $obj->id_de_oc(); ?> </h2><br
        
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">fecha</div>
              <input type="text" class="form-control"  readonly value="<?php echo $fecha ?>">
            </div>
        </div><br> 
        
        <h3>Empresa</h3>
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Empresa</div>
              <input type="text" class="form-control" readonly value="<?php echo  $obj->datosOcprevio("select * from mi_empresa where id_mi_empresa = '".$id_empresa."'",1); ?>">
            </div>
        </div>
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Ruc</div>
              <input type="text" class="form-control" readonly value="<?php echo $EmpRuc; ?>">
            </div>
        </div>   
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Direccion</div>
              <input type="text" class="form-control" readonly value="<?php echo $EmpDir ?>">
            </div>
        </div><br> 
        
         <h3>Proveedor</h3>
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Proveedor</div>
              <input type="text" class="form-control" readonly value="<?php echo $obj->datosOcprevio("select * from proveedor where id_prove = '".$EmpProv."'",1); ?>">
            </div>
        </div>
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Atencion a</div>
              <input type="text" class="form-control" readonly value="<?php echo $obj->datosOcprevio("select * from empleado where id_empleado = '".$EmpleProv."'",2);; ?>">
            </div>
        </div>   
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Direccion</div>
              <input type="text" class="form-control" readonly value="<?php echo $ProvDir ?>">
            </div>
        </div><br>
        
                 <h3>Datos Generales</h3>
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Forma de pago</div>
              <input type="text" class="form-control" readonly value="<?php echo $Fpago; ?>">
            </div>
        </div>
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Lugar de Entrega</div>
              <input type="text" class="form-control"  readonly value="<?php echo $LugarEntrega; ?>">
            </div>
        </div>           
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Referencia Cot</div>
              <input type="text" class="form-control" autocomplete="off" readonly value="<?php echo $RefCot; ?>">
            </div>
        </div>   
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Referencia</div>
              <input type="text" class="form-control" autocomplete="off" readonly value="<?php echo $Referencia ?>">
            </div>
        </div>
        <div class="form-group">
              <div class="input-group">
              <div class="input-group-addon">Equipo</div>
              <input type="text" class="form-control" readonly value="<?php echo $Equipo ?>">
            </div>
        </div><br>         
          
            
            
        
         <?php
        //  MI ENCABEZADO DE MI TABLA
        echo '<div class="table-responsive"/>';
            echo  '<table class="table table-hover" align="center" >';
                echo '<tr>';
                    echo '<th>ITEM</th>';
                    echo '<th>COMPONENTE</th>';
                    echo '<th>N PARTE</th>';		
                    echo '<th>CANTIDAD</th>';
                    echo '<th>PRECIO</th>';
                    echo '<th>TOTAL</th>';
                echo '</tr>';

    //          $lista = array($componente);  
                for($j=1; $j<count($componente)+1; $j++)
                {
                    for($i=0; $i<count($componente); $i++)
                    {

                        echo '<tr>';

                            echo  '<td>'.$j++.'</td>';
                            echo  '<td align="center">'.$componente[$i].'</td>';
                            echo  '<td align="center">'.$nparte[$i].'</td>'; 
                            echo  '<td align="center">'.$cantidad[$i].'</td>'; 
                            echo  '<td align="center">'.$precio[$i].'</td>'; 
                            echo  '<td align="center">'.$total[$i].'</td>'; 

                        echo '</tr>';
                    }
                }
            echo '</table>';
        echo '</div>';  
     ?>
   
        <form action="../controlador/ocController.php" method="post">

            
            <!--A QUI SE GUARDARAN LOS DATOS DE OC, SON INPUTS QUE ESTAN OCULTOS -->

            <input type="hidden" id="fecha"  name="fecha" value=" <?php echo $fecha; ?> ">

            <input type="hidden" id="idempresa"  name="IdEmpresa" value=" <?php echo $id_empresa; ?> ">    
            <input type="hidden" id="EmpresaRuc"  name="EmpresaRuc" value=" <?php echo $EmpRuc; ?> ">    
            <input type="hidden" id="EmpresaDir"  name="EmpesaDir" value=" <?php echo $EmpDir; ?> ">  

            <input type="hidden" id="Idprove"  name="IdProve" value=" <?php echo $EmpProv; ?> ">    
            <input type="hidden" id="EmpleadoProv"  name="EmpleadoProv" value=" <?php echo $EmpleProv; ?> ">    
            <input type="hidden" id="ProDir"  name="ProDir" value=" <?php echo $ProvDir; ?> "> 

            <input type="hidden" id="Fpago"  name="Fpago" value=" <?php echo $Fpago; ?> "> 
            <input type="hidden" id="LugEntrega"  name="LugEntrega" value=" <?php echo $LugarEntrega; ?> ">   
            <input type="hidden" id="RefCot"  name="RefCot" value=" <?php echo $RefCot; ?> ">    
            <input type="hidden" id="Referencia"  name="Referencia" value=" <?php echo $Referencia; ?> ">    
            <input type="hidden" id="Equipo"  name="Equipo" value=" <?php echo $obj->Extraer_id($Equipo); ?> ">      
            
            <input type="hidden" id="Subtotal"  name="Subtotal" value=" <?php echo $Subtotal; ?> ">   
            <input type="hidden" id="Igv" name="Igv" value=" <?php echo $igv; ?> ">    
            <input type="hidden" id="Completo"  name="Completo" value=" <?php echo $completo; ?> ">  
            <input type="hidden" id="moneda"  name="Moneda" value=" <?php echo $moneda; ?> ">
            <input type="hidden" id="moneda"  name="idusu" value=" <?php echo $id_usu; ?> "> 
            <!--    A PARTIR DE AQUI SE GUARDAR LOS ARREGLO DE DETALLE OC-->

            <!--    SE GUARDA AQUI EL ARREGLO DE COMPONENTES COMO UN VALUE DE UNA CAJA DE TEXTO-->
            <input type="hidden" id="compo"  name="componen" value=" 
            <?php   
            for ($index = 0; $index < count($componente)
                    ; $index++) 
            {
            echo $componente[$index].',';
            }  
            ?> ">

            <!--SE GUARDA AQUI EL ARREGLO DE N PARTE COMO UN VALUE DE UNA CAJA DE TEXTO-->
            <input type="hidden" id="nparte"  name="nparte" value=" 
            <?php   
            for ($index = 0; $index < count($componente) ; $index++) 
            {
            echo $nparte[$index].','; 
            }  
            ?> ">

            <!--SE GUARDA AQUI EL ARREGLO DE CANTIDAD COMO UN VALUE DE UNA CAJA DE TEXTO-->
            <input type="hidden" id="cant"  name="cant" value=" <?php   
            for ($index = 0; $index < count($componente) ; $index++) 
            {
            echo $cantidad[$index].','; 
            }  
            ?> ">  
            <!--SE GUARDA AQUI EL ARREGLO DE PRECIO COMO UN VALUE DE UNA CAJA DE TEXTO-->
            <input type="hidden" id="precio"  name="precio" value=" <?php   
            for ($index = 0; $index < count($componente) ; $index++) 
            {
            echo $precio[$index].','; 
            }  
            ?> ">
            <!--SE GUARDA AQUI EL ARREGLO DE TOTAL COMO UN VALUE DE UNA CAJA DE TEXTO-->
            <input type="hidden" id="total"  name="total" value=" <?php   
            for ($index = 0; $index < count($componente) ; $index++) 
            {
            echo $total[$index].','; 
            }  
            ?> "> 
            
                <div class="col-xs-2">
                <label>Subtotal</label><input  type="text"   name="subtotal" id="subtotal" style="width:120%;" placeholder="subtotal"  class="text3"  value="<?php echo $Subtotal ?>" readonly />
                <div id="sub" hidden class="total">0</div>
                </div>
                <div class="col-xs-2">
                <label>IGV</label><input  type="text"    name="igv" id="igv"  style="width:120%;" placeholder="igv"  class="text3" value="<?php echo $igv ?>" readonly />
                </div>
                <div class="col-xs-2">
                <label>Total</label><input  type="text"    name="completo" id="completo" style="width:120%;" placeholder="completo" class="text3" readonly value="<?php echo $completo ?>" />
                </div>
                <div class="col-xs-2">
                <label>Moneda</label><input  type="text"    name="completo" id="completo" style="width:250%;" placeholder="completo" class="text3" readonly value="<?php echo $moneda ?>" />
                </div>

            <input type="submit" id='btnListo' name="btnListo" value="Generar Orden de Compra" class="btn btn-success btn-lg btn-block" onclick="recargar()"/><br/>

        
        </form>
    </body>
    <?php 

    } 

    ?>

</html>


   