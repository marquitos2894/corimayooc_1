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

include_once ("../../conexion/conexion.php");
$obj=new conex();
$obj->conectar();

include_once ("../../modelo/MiEmpresa.php");
$obj2= new MiEmpresa();


?>
<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="UTF-8">
<!--        <meta http-equiv="refresh" content="0">-->  
           <title>Reporte de oc</title>
    
<!--        <style rel="stylesheet" type="text/css" src="../../css/EncabezadoCss/EncabezadoCss.css"></style>-->
        

    <!-- PAGINACION JS Y CSS -->
        <script src="../../js/paginartabla/paginacion_de_tablas.js" type="text/javascript"></script>
        <link href="../../css/paginartabla/paginacion_css.css" rel="stylesheet" type="text/css"/>
        <!-- jQuery  Y JS -->
           
        <!-- jQuery  Y JS -->
        <script type="text/javascript" src="../../jquery/jquery-latest.js"></script>
        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script src="../../jquery/jquery-3.0.0.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../../ajax/AjaxOC.js"></script>  
        <script src="../../ajax/ajax_auto_completado.js" type="text/javascript"></script>
	
        <script src="../../ajax/busqueda_oc.js" type="text/javascript"></script>
        <script src="../../ajax/busqueda_oc.js" type="text/javascript"></script>
        
        <!-- FIN DE JQUEY Y JS -->
	

	<!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.js?v=2.0.6"></script>
	<link rel="stylesheet" type="text/css" href="../../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.css?v=2.0.6" media="screen" />
        <script type="text/javascript" src="../../js/FuncionesFancyBox.js"></script>
                 
        <!-- INICIA BOOTSTRAP -->
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
         <!-- FIN BOOTSTRAP -->
         
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
         
        <!-- AUTO COMPLETADO-->
        <link href="../../jquery-iu/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="../../jquery-iu/jquery-ui.min.js" type="text/javascript"></script>
        
      
        
        
        <style type="text/css">
            .fancybox-custom .fancybox-skin 
            {
            box-shadow: 0 0 50px #222;
            }
        </style>
           
     
         
    </head>
    <body id="page-top" class="index" > 
        
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
                    <a class="navbar-brand" href="../../Inicio.php">Inicio</a>
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="#OcView">OC rapida</a>
                        </li>
                        <li class="page-scroll">
                        <a href="#OcFiltros">OC Detallada </a>
                        </li>
                         <li class="page-scroll">
                        <a href="#OcporItem">OC por Item Rapida</a>
                         </li>
                        <li class="page-scroll">
                        <a href="#Ocporitemsdeta">OC por Item Detallada</a>
                         </li>
                          <li class="page-scroll">
                        <a href="../../Desconectar.php" onclick="if (confirm(' ¿ DESEA CERRAR SESION ?')) commentDelete(1); return false" >Cerrar Sesion</a>
                         </li>
                    </ul>
                </div>
            <!-- /.navbar-collapse -->
            </div>
        <!-- /.container-fluid -->
        </nav><br><br><br><br><br><br><br>
     
        <section id="OcView"><br><br><br>       
        <form name="FrmBuscar" action="" method="post">
                         
            <h1 align="center">Buscar Ordenes de Compras</h1>
            <input type="search" name="buscar" autocompleye="off" placeholder="BUSCA POR: ORDEN DE COMPRA, EMPRESA, PROVEEDOR y ATENCION A" id="busquedaOC" value="" class="form-control" autofocus="" />
              
        
            
            <?php 
                    //----------------------BUSCAR---------------------------------------------------------------------------	
            if($_POST["buscar"]=="")
                {?>
                                               
                    <div id="resultado"></div>
            

          <?php } ?> 

                   
                   
        </form>
            

        </section>
        <hr  style="color: #11866f;" />
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        
        <section id="OcFiltros"><br><br><br>
        
            
            <h2>BUSQUEDA DE OC DETALLADA</h2>
            <form action="">    
                <table>
                   <tr>
                        <th>FECHA</th>
                   </tr>
                    <tr>
                        <td>
                       <select size="1" name="mes" id="idmes" class="dropdown">
                       <option value="">Elige mes</option>
                          <option value="01">Enero</option>
                          <option value="02">Febrero</option>
                          <option value="03">Marzo</option>
                          <option value="04">Abril</option>
                          <option value="05">Mayo</option>
                          <option value="06">Junio</option>
                          <option value="07">Julio</option>
                          <option value="08">agosto</option>
                          <option value="09">septiembre</option>
                          <option value="10">octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                         </select></td>
                     <td>       
                         <input type="number" name="año" style="width:35%"  class="" value="<?=  date('Y') ?>" id="idano" min="2014" placeholder="AÑO">
                    </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th>EMPRESA</th>
                        <th>PROVEEDOR</th>
                        <th>EQUIPO</th>
                    </tr>
                    <tr>
                        <td><select id="IdEmpresa">
                                <option value="">Selecciona Empresa</option>
                                <?php  $obj2->imprimirGeneral("select * from mi_empresa where estado = 'si'",1,1)  ?>
                            </select>
                        </td>
                        <td><input type="search" id="IdProveedor" placeholder="Ingrese Proveedor"></td>
                        <td><input type="text" name="txtEquipo" id="IdEquipo"  placeholder="Ingrese equipo"</td>
                    </tr>
                    <tr>
                        <td><input type="button"  class="btn btn-info" value="Buscar" onclick="FiltroOC($('#idmes').val(), $('#idano').val(), $('#IdEmpresa').val(), $('#IdProveedor').val(), $('#IdEquipo').val() );return false; "/></td>
                    </tr>


                </table>
                
                <div id="ResultadoOcFiltros"></div>
            </form>        
        </section>
        
        
        <hr  style="color: black;" />
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        
        <section id="OcporItem"><br><br><br>    
        <form name="FrmBuscar" action="" method="post">
            
            <h1 align="center">Buscar Ordenes de Compras por item</h1>
                <input type="search" name="buscar" autocompleye="off" placeholder="BUSCA POR COMPONENTE, NPARTE, EQUIPO y ORDEN DE COMPRA" id="busquedaOCxItems" value="" class="form-control" />
              
        
            
            <?php 
                    //----------------------BUSCAR---------------------------------------------------------------------------	
            if($_POST["buscar"]=="")
                {?>
                    
                                    
                    <div id="resultado_bus_x_Items"></div>
            

          <?php } ?> 

                   
                   
        </form>
        
        </section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <section id="Ocporitemsdeta">
            
            <h2>BUSQUEDA DE OC POR ITEMS DETALLADA</h2>
            <form action="">    
                <table>
                    <tr>
                        <th>FECHA</th>
                    </tr>
                    <tr>
                        <td>
                       <select size="1" name="mes" id="idmes_i_d" >
                        <option value="">Elige mes</option>
                          <option value="01">Enero</option>
                          <option value="02">Febrero</option>
                           <option value="03">Marzo</option>
                          <option value="04">Abril</option>
                           <option value="05">Mayo</option>
                          <option value="06">Junio</option>
                           <option value="07">Julio</option>
                          <option value="08">agosto</option>
                          <option value="09">septiembre</option>
                          <option value="10">octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                         </select>
                          </td>
                     <td>   <input type="number" name="año" id="idano_i_d" style="width:35%"  value="<?=date('Y')?>" min="2014" placeholder="AÑO">
                    </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th>COMPONENTE</th>
                        <th>NPARTE</th>
                        <th>EQUIPO</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtCompo" id="IdCompo" placeholder="Empresa"</td>
                        <td><input type="search" id="IdParte" placeholder="Ingrese NParte"></td>
                        <td><input type="text" name="txtEquipo" id="IdEquipo_i_d"  placeholder="Ingrese Equipo"</td>
                    </tr>
                    <tr>
                        <td><input type="button"  class="btn btn-info"  value="Buscar" onclick="Bus_oc_item_det($('#idmes_i_d').val(), $('#idano_i_d').val(), $('#IdCompo').val(), $('#IdParte').val(), $('#IdEquipo_i_d').val() );return false; "/></td>
                    </tr>


                </table>
                
                <div id="ResultadoOc_x_item_det"></div>
            </form>        
        </section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 
        
<!-- BLOQUEA EL FANCYBOX     <script src="../../css/bootstrap/js/jquery.js" type="text/javascript"></script>-->
        <script src="../../css/bootstrap/js/freelancer.js" type="text/javascript"></script>
        <script src="../../css/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        
        <script src="../../css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../css/bootstrap/js/cbpAnimatedHeader.js" type="text/javascript"></script>
        
        <script src="../../css/bootstrap/js/cbpAnimatedHeader.min.js" type="text/javascript"></script>
        <script src="../../css/bootstrap/js/classie.js" type="text/javascript"></script>
        <script src="../../css/bootstrap/js/contact_me.js" type="text/javascript"></script>
        <script src="../../css/bootstrap/js/npm.js" type="text/javascript"></script>
        <script src="../../css/bootstrap/js/jqBootstrapValidation.js" type="text/javascript"></script>
    </body>
    
    
</html>

