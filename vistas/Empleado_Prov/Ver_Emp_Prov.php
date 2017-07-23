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
<html>
    
<?php

include_once ("../../conexion/conexion.php");
$obj=new conex();
$obj->conectar();

include_once ("../../modelo/EmpleadoModels.php");
//      $obj2= new Proveedor();
//      $obj2->listar_Proveedor("select * from empleado where estado = 'SI'");
?>
    
    <head>
         <!-- PAGINACION -->
        <script src="../../js/paginartabla/paginacion_de_tablas.js" type="text/javascript"></script>
        <link href="../../css/paginartabla/paginacion_css.css" rel="stylesheet" type="text/css"/>
          
        
        <!-- BOOTSTRAP -->
        <link href="../../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
        <!-- FIN BOOTSTRAP -->
        
        <!-- ESTILOS CSS -->
        <link rel="stylesheet" type="text/css" href="../../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.css?v=2.0.6" media="screen" />
        <link href="../../css/fuente.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/formularios/formOc.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
        .fancybox-custom .fancybox-skin {
	box-shadow: 0 0 50px #222;
        }
        </style>
      
        <!-- FIN CSS -->
        
        <!-- JS -->
        <script type="text/javascript" src="../../jquery/jquery-latest.js"></script>
                  <script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../../ajax/AjaxOC.js"></script>    
	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/source/jquery.fancybox.js?v=2.0.6"></script>
	<script type="text/javascript" src="../../js/FuncionesFancyBox.js"></script>
        <!-- FIN JS -->
        
        <header>


        </header>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <title>Trabajadores</title>

    </head>
    <body> 
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
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="../Menu_Mantenimiento.php">Menu Mantenimiento</a>
                        </li>

                    </ul>
                </div>
            </div>
       
        </nav><br><br><br><br>    

        <form name="FrmBuscar" action="" method="post">
            
            <h1 align="center"><a class="fancybox fancybox.iframe; btn btn-warning" href='InsEmp_ProvV.php' >Nuevo Trabajador</a></h1>
            <h2 align="center"> Mantenimiento de Trabajadores de Proveedores</h2>
            <input type="search" autocomplete="off" name="buscar" placeholder="INGRESE UN DATO" id="busqueda_Emp_Provee" value="" class="form-control"/>
              
          
            
            <?php 
                    //----------------------BUSCAR---------------------------------------------------------------------------	
            if($_POST["buscar"]=="")
                {?>
                  
                            <center><h1>EMPLEADOS DE PROVEEDORES </h1></center>
                           
                       <div id="resultado_Emp_Provee"></div>
            
      
          <?php } ?> 
                        
                   <div id="resultado_Emp_Provee"></div>
        </form>
       
 
    </body>
</html>
