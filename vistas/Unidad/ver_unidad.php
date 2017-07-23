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

<html>
    
<?php

include_once ("../../conexion/conexion.php");
$obj=new conex();
$obj->conectar();

include_once ("../../modelo/MiEmpresa.php");
$obj2= new MiEmpresa();


//$obj2->listar_empresa("select * from mi_empresa where estado = 'SI'");

?>
    
    <head>
    
        <meta charset="UTF-8">
<!--        <meta http-equiv="refresh" content="0">-->  
           <title>Manto de Mis empresas</title>
    
<!--        <style rel="stylesheet" type="text/css" src="../../css/EncabezadoCss/EncabezadoCss.css"></style>-->
        
        <!-- Add jQuery library -->
        <script type="text/javascript" src="../../jquery/jquery-latest.js"></script>
        <script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../../ajax/AjaxOC.js"></script>    
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
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
         
        <style type="text/css">
            .fancybox-custom .fancybox-skin 
            {
            box-shadow: 0 0 50px #222;
            }
        </style>
        
        <header id="main-header">
<!--            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-responsive" src="../../img/profile.png" alt="">
                        <div class="intro-text">
                            <span class="name">Mantenimiento de Mis Empresas</span>
                            <hr class="star-light">
                            <span class="skills">Registra-Modifica-Elimina-Busca</span>
                        </div>
                    </div>
                </div>
             </div>-->
        </header><!-- / #main-header -->
    
         
         
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
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="../Menu_Mantenimiento.php">Menu Mantenimiento</a>
                        </li>
                      
                </div>
            <!-- /.navbar-collapse -->
            </div>
        <!-- /.container-fluid -->
        </nav><br><br><br><br>
     
               
        <form name="FrmBuscar" action="" method="post">
            
            <h1 align="center"><a class="fancybox fancybox.iframe; btn btn-warning" href='InsUnidadV.php'>Nuevo Unidad</a></h1>  
            <h1 align="center">Mantenimiento de Mis Unidades</h1>
            <input type="search" name="buscar" autocompleye="off" placeholder="INGRESE NOMBRE DE LA UNIDAD A BUSCAR" id="busquedaunidad" value="" class="form-control" />
              
        
            
            <?php 
                    //----------------------BUSCAR---------------------------------------------------------------------------	
            if($_POST["buscar"]=="")
                {?>
                    
                    <center><h1>UNIDAD</h1></center>
                            
                    <div id="resultado"></div>
            

          <?php } ?> 

                   
                   
        </form>
       
 
        
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

