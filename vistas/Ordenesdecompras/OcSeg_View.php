<?php 
//@session_start();
//if(!$_SESSION)
//{
//    echo '<script language = javascript>
//        alert("Debe iniciar Sesion")
//        self.location = "../../index.php" 
//        </script>';
//    
//}   
//
//$id_usu = $_SESSION['id_usu'];
?>

<?php

include_once ("../../conexion/conexion.php");
$obj=new conex();
$obj->conectar();

include_once ("../../modelo/Seg_Models.php");
$obj2= new Seg_Models();

$id_oc = $_GET["id"];
$prove = $_GET["prove"];
$empre = $_GET["empre"];
$fecha = $_GET["fecha"];
?>
<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="UTF-8">
<!--        <meta http-equiv="refresh" content="0">-->  
           <title>Reporte de oc</title>
    
            <!-- Add jQuery library -->

	<script type="text/javascript" src="../../jquery/fancyapps-fancyBox-3a66a9b/lib/jquery-1.7.2.min.js"></script>
    
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
        <script src="../../js/fecha.js" type="text/javascript"></script>
        
        <style type="text/css">
            .fancybox-custom .fancybox-skin 
            {
            box-shadow: 0 0 50px #222;
            }
            
        </style>
     
        <script>
            $(document).ready(function(){
            $("tr").each(function(){
            $(this).children("td").each(function(){
            switch ($(this).html()) 
            {
                case '0':
                    $(this).css("background-color", "#00E700");
                break;
//                case 'B':
//                    $(this).css("background-color", "#0F0");
//                break;
//                case 'C':
//                    $(this).css("background-color", "#00F");
//                break;
            }
                        })
                                })
                                        });
</script>
       
        
         
    </head>
    <body class="index"  > 
        
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
                    <a class="navbar-brand">OC <?php echo $id_oc ?></a>
                </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll">
                            <a href="#OcView"><?php echo $empre ?></a>
                        </li>
                        <li class="page-scroll">
                        <a href="#OcFiltros"><?php echo $prove ?></a>
                        </li>
                         <li class="page-scroll" >
                        <a href="#OcporItem"><?php echo $fecha ?></a>
                         </li>
                        <li class="page-scroll">
                        <a href="#Ocporitemsdeta"></a>
                         </li>
                          <li class="page-scroll">
                        <a href="../../Desconectar.php" onclick="if (confirm(' ¿ DESEA CERRAR SESION ?')) commentDelete(1); return false" >Cerrar Sesion</a>
                         </li>
                    </ul>
                </div>
            <!-- /.navbar-collapse -->
            </div>
        <!-- /.container-fluid -->
        </nav><br><br><br><br><br><br><br> <br><br><br><br>
     
             
        <form name="Frm_Oc_view"  method="post">
                         
           <div id="cuadro" class="table-responsive"/>
             
            <table  border="1" align="center" class="table table-hover"  id="tblDatos">
                <thead> 
                    <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                    <th>COMPONENTE</th>
                    <th>N PARTE</th>
                    <th>CANT SOL</th>
                    <th>CANT RES</th>
                    <th>REGISTRAR</th>
                    <th>HISTORIAL</th>

                    </tr>
                </thead>
               
                <tbody>
            <?php
            
            $id_oc = $_GET["id"];
            //$id_oc = '1850';
            //$sql = $obj2->Ver_Seg_Oc();
           
            $sql2=mysql_query("select * from seguimiento_oc where id_oc ='".$id_oc."' ");
             
            $num_datos = mysql_num_rows($sql2);
            
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($sql2)))
                    { ?>

                    <tr> 
                        <td align='center'><?php echo $i+1;$i++ ?></td>
                        <td align='center'><?php echo $reg[2] ?></td>
                        <td align='center'><?php echo $reg[3] ?></td>
                        <td align='center'><?php echo $reg[5] ?></td>
                        <td align='center' style="font-weight:bold;color:red"><?php echo $reg[4] ?></td>
                        
                    <?php 
                    echo "<td><a class='fancybox fancybox.iframe, btn btn-danger btn' href='Registrar_S_View.php?id=".$reg[0]."&compo=".$reg[2]."&nparte=".$reg[3]."&cant=".$reg[4]."' target='_blank'>Registro</a></td>";
                    echo "<td><a class='fancybox fancybox.iframe, btn btn-primary btn' href='Historial_seg.php?id_seg=".$reg[0]."' target='_blank' >Historial</a></td>";
                    
                    }?>


                    </tr>
                    
                    </tbody>
                </table>

         </form>
            
    </body>
    
    
</html>