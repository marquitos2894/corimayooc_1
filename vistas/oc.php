<?php

include_once '../conexion/conexion.php';
$obj2 = new conex ();
$obj2->conectar();

include("../modelo/ocModels.php");
$obj= new ordencompra;


$id_ProV = $_POST["id_Prov"];
$id=$_POST["id"]; 

?>

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
<!DOCTYPE html>
<html lang="es">
    <head>
       
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

       <!-- ESTILOS CSS -->
        
        <link rel="stylesheet" type="text/css" href="../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.css?v=2.0.6" media="screen" /> 
        <style type="text/css">
        .fancybox-custom .fancybox-skin {
	box-shadow: 0 0 50px #222;
        }
        </style>
        <!-- FIN ESTILOS -->
         <!-- JS -->
        <script type="text/javascript" src="../jquery/jquery-latest.js"></script>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery-1.7.2.min.js"></script>
        
        <script type="text/javascript" src="../js/FuncionesFancyBox.js"></script> 
        <script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.js?v=2.0.6"></script>
        


<!--         EMPIEZAN LOS JS Y JQUERY -->
        <script src="../js/fecha.js" type="text/javascript"></script>
<!--        <script type="text/javascript" src="../jquery/jquery-latest.js"></script> BLOQUEA EL FANCY-->
<!--        <script type="text/javascript" src="../js/jquery.min.js"></script> BLOQUEA EL FANCY-->
        <script type="text/javascript" src="../js/Calculos.js"></script>
        <script type="text/javascript" src="../js/jquery.addfield2.js"></script>
        <script type="text/javascript" src="../ajax/AjaxOC.js"></script> 
       
      <script src="../ajax/ajaxdatos.js" type="text/javascript"></script>
    
<!--             TERMIN LOS JS Y JQUERY NA-->
         
<!--              Add jQuery library -->
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery-1.7.2.min.js"></script>
	
<!--         Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	
<!--         Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.js?v=2.0.6"></script>
        
        <link rel="stylesheet" type="text/css" href="../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.css?v=2.0.6" media="screen" />
        <script type="text/javascript" src="../js/FuncionesFancyBox.js"></script>
<!--        <script language="JavaScript" src="../jquery/jquery-1.5.1.min.js"></script> BLOQUEA EL FANCY-->
        
<!--         BOOTSTRAP-->
        <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
        
<!--           AUTO COMPLETADO-->
        <link href="../jquery-iu/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="../jquery-iu/jquery-ui.min.js" type="text/javascript"></script>
        <script src="../ajax/ajax_auto_completado.js" type="text/javascript"></script>
        
<!--                 ESTILOS PARA EL FORM-->
        <link href="../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>

        <script type="text/javascript" >

        
    
            
               function ValidaSoloNumeros() 
          {
             if ((event.keyCode < 46) || (event.keyCode > 57)) 
             event.returnValue = false;
          }
          
          </script>
               
        
        <link rel="stylesheet" type="text/css" href="../css/fuente.css" />
        <meta charset="UTF-8">
        <title>Emision de OC <?php $obj->id_de_oc(); ?></title>
        
   <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="../img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Orden de Compra <?php $obj->id_de_oc(); ?> </span>
                        <hr class="star-light">
                        <span class="skills">Realize la Orden de Compra</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    </head>
    
    <body onload="getDate()" id="page-top" class="index" >  
        
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Inicio.php" onclick="if (confirm('ESTAS SEGURO DE SALIR;    perderas tus datos')) commentDelete(1); return false">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a><?php echo $obj->Mostrar_dato_usu(3,$id_us) ?> </a>
                    </li>
                    <li class="page-scroll">
                        <a href="oc.php">Nueva OC</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
        
        
        
        <!--  ONLOAD DE LA FECHA-->
               
        <div class="container" >
            <div class="content">
                
       
        <form id="form2" name="form2" method="post" action="ocprevio.php"  target="ventanaForm" onsubmit="open('ocprevio.php', 'ventanaForm', 'top=10,left=100,width=600,height=500')" >
<!--         <form id="form2" name="form2" method="post" action="ocprevio.php" target="ventanaForm" onsubmit="class='fancybox fancybox.iframe' href='ocprevio.php'">    -->
                  <!--  LOS DISPLAY OCULTOS QUE UTILIZO PARA TRAER DATOS CON AJAX Y ALMACENARLOS EN LOS COMBOS Y TEXTBOX-->      
            <div style="display:none;" id='resp'></div>
            <div style="display:none;" id='resp2'></div>
            <div style="display:none;" id='resp4'></div>
            <div  style="display:none;" id='resp5'></div>
            <div  style="display:none;" id='idp_ajax'></div>

            <h3>Emision de Orden de Compra <?php $obj->id_de_oc(); ?> </h3>
             <!--  LA FECHA-->  
            <table border="1">
            <tr>
            <td>Fecha</td>
            <td> <input type="date" name="fecha" id="fecha"  readonly ></td>
            </tr>
            </table>
             
             
            <div class="form-group has-success"> 
            <!--  MIS EMPRESAS-->  
            <section class="MiEmpresa" id="oc">
                <h2>Datos de mi Empresa</h2>
            <table border="1" class="table">
            <tr>   
            <td>Empresa</td>
            <td>
                <select name="comboEmpresa" id="comboEmpresa"  onchange="enviar(),enviar2()" required class="form-control" >
                    <option> SELECIONE UNA OPCION ......</option>
                    <?php
                    $obj->imprimircombo("select * from mi_empresa where estado= 'SI'");
                    ?>
                </select>
            </td>
            </tr>
                
           
      
            
            <tr>
            <!--  RUC DE MIS EMPRESAS-->                 
            <td>Ruc</td>
            <td><input type="text" value= ""   name="EmpresaRuc" id="RucEm" placeholder="RUC DE LA EMPRESA" readonly class="form-control"/></td>
            </tr>
            <tr>
            <!--  DIRECCION MIS EMPRESAS-->  
            <td>Direccion</td>
            <td><input type="text"  value="" name="EmpresaDir" id="EmpresaDir" placeholder="DIRECCION DE LA EMPRESA" readonly class="form-control" /></td>
            </tr>   
            </table>
            </section>   
            </div>
            <div class="form-group has-success">
            <section class="proveedor">
                <h2>Datos de Proveedor <a class="fancybox fancybox.iframe; btn btn-warning" href='Proveedor/Ver_Proveedor.php' >Nuevo Provedor </a> <a class="fancybox fancybox.iframe; btn btn-info" href='Empleado_Prov/Ver_Emp_Prov.php' >Nuevo Trabajador </a></h2> 
                  <!--  PROVEEDORES--> 
              <input type="hidden" name="idp" id="idp">
              <table border="1" class="table">
              
              <tr><td>Proveedor</td> 
                  <td><input type="search"  id="idbuscaprovedor"   placeholder="Busca su proveedor"  class="form-control" ><input type="button" name="ver"  onclick="ajax_traer_id_prove(),enviarDirPro(),enviarPro()" value="Ver" class="btn btn-success" required> </td>
                  
              </tr>
                          
            <tr> 
              <td>Atencion</td>           <!--  ATENCION A PROVEEDORES-->   
              <td><div id='resp3' name="empleProv" ></div></td>
            </tr>
            <tr>       
            <td>Direccion</td>
            <td><input type="text" value="" name="ProDir" id="ProDir" placeholder="DIRECCION DE PROVEEDOR" onkeyup="" class="form-control"  readonly  autocomplete="off" /> </td>
            </tr>
            </table>
            </section>
            </div>
            <div class="form-group has-success">
            <section class="extra" id="ext">  
                <h2>Datos Generales <a class="fancybox fancybox.iframe; btn btn-info" href='Equipos/Ver_Equipos.php' >Nuevo Equipo </a> </h2>
            <table border="1" class="table" >
              <tr>
            <!--  FORMA DE PAGO --> 
            <td>Forma de Pago</td>
            <td><input list="Fpago" style=”text-transform:uppercase;” name="Fpago" class="form-control" placeholder="Elija Forma de pago; Ejemplo: Factura a 30 dias"></td>
            
            <datalist id="Fpago" class="select">
                <option value="Factura inmediata">
                <option value="Factura a 15 dias">
                <option value="Factura a 30 dias">
                <option value="Factura a 45 dias">
                <option value="Leasing Bancario">
                <option value="Aplicar al Bono">  
            </datalist>
            
            </tr>
            <tr>
            <!--  LUGAR DE ENTREGA--> 
            <td>Lugar de Entrega</td>
            <td><input list="LugarEntrega" name="LugarEntrega" class="form-control" placeholder="Elija donde se llevara la mercaderia; Ejemplo: Ca. Machu Picchu Mz L lote 9 - Chorrillos"></td>
            <datalist id="LugarEntrega" class="text">
                <option value="Ca. Machu Picchu Mz L lote 9 - Chorrillos"/>
                <option value="Ca. Albert Einstein 334 - Surquillo"/>
                <option value="Ca Modigliani 133 - Surquillo"/>
                <option value="Cliente Recoge"/>    
            </datalist>
            </tr>    
             <!--  REFERENCIA DE COTIZACION-->   
            <tr>    
            <td>REF. Cotizacion</td>
            <td><input type="text" style=”text-transform:uppercase;” value="" name="RefCot" id="RefCot" placeholder="REFERENCIA DE COTIZACION" class="form-control"  autocomplete="off" /></td>
           
            </tr>    
            <tr>
             <!--  REFERENCIA -->        
            <td>Rerencia OC</td>
            <td><input type="text" value="" name="Referencia" autocomplete="off" id="RefCot" placeholder="REFERENCIA DE ORDEN DE COMPRA" class="form-control" /></td>                                   
            </tr>
            <tr>
            <!--  EQUIPOS--> 
            <td>Equipo </td>
<!--            <td>
                <select name="ComboEquipos" class="form-control" required >
                    <option>Seleccione Equipo</option>   
                    <?php 
                    //$obj->imprimircombo("select * from equipos  WHERE Estado = 'MINA' OR  Estado = 'TALLER'"); 
                    ?>
                </select>
            </td>-->
            <td><input type="text" name="txtEquipo" id="IdEquipo2"  class="form-control"  placeholder="Ingrese Equipo" required ></td>
            
            </tr>    
            </table>
          
            </section> 
            
                
            </div>
                          
             <!--  EMPIEZA A AGREGAR LOS ITEMS/SUMAR/ MULTIPLICAR/TOTAL/IGV/SUBTOTAL -->        
               
             
             
                         
              <h2>Ingresar componentes</h2>
             <table  border="1" style="text-align: center" align="center" class="table table-hover">
                <thead> 
                  <tr class="centro" style="text-align: center">
                    <th style="width:45%;">COMPONENTE</th>
                    <th style="width:15%;">NPARTE</th>
                    <th style="width:10%;">CANT</th>
                    <th style="width:10%;">PRECIO</th>
                    <th style="width:10%;">TOTAL</th>
                  </tr>
                </thead>
             </table>
             
   
             <div id="div_1" class="grupo">
                <!--  CAJAS DE TEXTO--> 
           
                    <input  type="text"  name="componente[]" id="componente1" style="width:50%;" placeholder="Componente" class="text2"   />
                    <input  type="text"  name="nparte[]" id="nparte" style="width:15%;" placeholder="N Parte"  class="text2" />
                    <input  title="SOLO NUMEROS" name="cantidad[]" type="text" value="0"  id="cantidad1" style="width:10%;" placeholder="Cantidad" pattern="[0-9]+" onkeypress="ValidaSoloNumeros() " class="text2" />
                    <input  title="SOLO NUMEROS"  type="text"  name="precio[]"  value="0"  id="precio1" style="width:10%;" placeholder="Precio"  onkeypress="ValidaSoloNumeros() "  class="text2" />
                    <input  type="text"  value="0"  name="total[]" id="total1" style="width:10%;" placeholder="total"  readonly  class="text2"/>
               
            <span  hidden class="total">0</span>
           
                <!--  BOTON + -->      
                <input class="bt_plus" id="1" type="button"  value="+"  />
              
                <div class="error_form"></div>
            
                
                  
            </div>
                
            <!--  ACA SE HACEN LAS OPERACION DE SUBTOTAL/IGV/TOTAL--> 
            <div class="row">
            <div  class="total" >
                <div class="col-xs-2">
                <label>Subtotal</label><input  type="text"  value="0"  name="subtotal" id="subtotal" style="width:100%;" placeholder="subtotal" onkeyup="operacion()" class="text3" readonly />
                <div id="sub" hidden class="total">0</div>
                </div>
                <div class="col-xs-2">
                <label>IGV</label><input  type="text"  value="0"   name="igv" id="igv"  style="width:100%;" placeholder="igv"  onkeyup="operacion()" class="text3" readonly />
                </div>
                <div class="col-xs-2">
                <label>Total</label><input  type="text"  value="0"   name="completo" id="completo" style="width:100%;" placeholder="completo" class="text3" readonly />
                </div>
                   <div class="col-xs-2">
                <label>Moneda</label>
                <select required name="Moneda"  style="width:150%;" class="text3"  >
                    <option value="">Selecione Moneda</option>
                    <option value="Nuevos Soles S/."> Nuevos Soles S/. </option>
                    <option value="Dolares Americanos  $">Dolares Americanos $ </option>
                    <option value="Euros               €">Euros € </option>  
                </select>
                </div>
                
                
            </div>
           </div>
            <!--TERMINA LO DE AGREGAR ITEMS--> 

            <input type="submit" value="Listo" class="btn btn-success btn-lg btn-block"/>
                 <div  class="spacer"></div>
        </form> 
     </div>
    </div>
        
    <!----------------------->

         
    </body>  
    
       
                 <!-- jQuery -->

<!--    <script src="../css/bootstrap/js/jquery.js" type="text/javascript"></script>-->
    <!-- Bootstrap Core JavaScript -->
<!--    <script src="../js/js/bootstrap.min.js"></script>

     Plugin JavaScript 
    
    <script src="../js/js/classie.js"></script>
    <script src="../js/js/cbpAnimatedHeader.js"></script>

     Contact Form JavaScript 
    <script src="../js/js/jqBootstrapValidation.js"></script>
    <script src="../js/js/contact_me.js"></script>

     Custom Theme JavaScript 
    <script src="../js/js/freelancer.js"></script>-->
    
</html> 
    
    
    
    
