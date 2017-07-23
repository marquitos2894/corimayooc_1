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
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mantenimientos de datos</title>
    <!--     BOOTSTRAP -->
<!--     Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->

    <link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!--     Custom CSS -->

<link href="../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>
<link href="../css/bootstrap/css/freelancer.css" rel="stylesheet" type="text/css"/>

<!--     Custom Fonts-->

<!--     FIN DE BOOTSTRAP -->

<!--   ESTILOS GENERALES-->
<link href="../css/mantoIconoscss.css" rel="stylesheet" type="text/css"/>
<link href="../css/fuente.css" rel="stylesheet" type="text/css"/>
    

  <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="../img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">MANTENIMIENTO </span>
                        <hr class="star-light">
                        <span class="skills">Registra-Modifica-Elimina-busca</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
   
      
  </head>

  <body id="page-top" class="index">
       <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> Mis Empresas
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Inicio.php">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                                        
                   <li class="page-scroll">
                        <a href="../Desconectar.php" onclick="if (confirm(' ¿ DESEA CERRAR SESION ?')) commentDelete(1); return false" >Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class=container> 
	<div class="content">
	<section class="cuadros" id="menuprincipal">
            <center><h2>MENU MANTENIMIENTO DE DATOS</h2></center>
                    <article>
                            <h3>Mis Empresas</h3>
                            <figure>
                                <a href="MiEmpresa/Ver_Empresa.php" >		
                                    <img src="../img/manto/iconempresa2.png" alt="Radios"></a>
                            </figure>
                    </article>
                    <article >
                             <h3>Proveedores</h3>
                            <figure>
                                <a href="Proveedor/Ver_Proveedor.php" >		
                                    <img src="../img/manto/iconprovedores.png" alt="Radios"></a>
                            </figure>
                    </article>
                    <article>
                        <h3>Equipos</h3>
                            <figure>
                                <a href="Equipos/Ver_Equipos.php" >	
                                    <img src="../img/manto/iconequipos2.jpg"></a>
                            </figure>
                    </article>
                    <article>
                        <h3>Empleado</h3>
                            <figure>
                                <a href="Empleado_Prov/Ver_Emp_Prov.php" >	
                                    <img src="../img/manto/iconempleado2.jpg"></a>
                            </figure>
                    </article>
                        <article>
                        <h3>Unidad</h3>
                            <figure>
                                <a href="Unidad/ver_unidad.php" >	
                                    <img src="../img/manto/iconunidad.png"></a>
                            </figure>
                    </article>
             
             
	</section>
      </div>
  </div>
      

       <script src="../css/bootstrap/js/jquery.js" type="text/javascript"></script>
       <script src="../css/bootstrap/js/bootstrap.js" type="text/javascript"></script>
       <script src="../css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
       <script src="../css/bootstrap/js/freelancer.js" type="text/javascript"></script>
       <script src="../css/bootstrap/js/contact_me.js" type="text/javascript"></script>
       <script src="../css/bootstrap/js/jqBootstrapValidation.js" type="text/javascript"></script>
       <script src="../css/bootstrap/js/cbpAnimatedHeader.min.js" type="text/javascript"></script>
       <script src="../css/bootstrap/js/contact_me.js" type="text/javascript"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        
       
  </body>
  
</html>