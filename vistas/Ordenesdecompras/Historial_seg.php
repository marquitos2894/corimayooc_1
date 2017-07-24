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


?>
<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="UTF-8">
<!--        <meta http-equiv="refresh" content="0">-->  
           <title>Historial</title>
    
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
         
        <style type="text/css">
            .fancybox-custom .fancybox-skin 
            {
            box-shadow: 0 0 50px #222;
            }
        </style>
        
         
    </head>
    <body id="page-top" class="index" > 
        
        <!-- /.container-fluid -->
            
        <form name="Frm_Oc_view" action="" method="post">
                         
           <div id="cuadro" class="table-responsive"/>
             
            <table  border="1" align="center" class="table table-hover"  id="tblDatos">
                <thead> 
                    <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                    <th>COMPONENTE</th>
                    <th>N PARTE</th>
                    <th>CANT</th>
                    <th>FECHA</th>
                    <th>GUIA REMISION</th>

                    </tr>
                </thead>
               
                <tbody>
            <?php
            
            $id_seg = $_GET["id_seg"];
            //$id_oc = '1850';
            //$sql = $obj2->Ver_Seg_Oc();
           
            $sql2=mysql_query("select so.componente,so.n_parte,hs.cant,hs.fecha,hs.gr from historial_seg hs
            inner join seguimiento_oc so on so.id_seg = hs.id_seg
            where hs.id_seg = '".$id_seg."' ");
             
            $num_datos = mysql_num_rows($sql2);
            
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($sql2)))
                    { ?>

                    <tr>
                        <td align='center'><?php echo $i+1;$i++ ?></td>
                        <td align='center'><?php echo $reg[0] ?></td>
                        <td align='center'><?php echo $reg[1] ?></td>
                        <td align='center'><?php echo $reg[2] ?></td>
                        <td align='center'><?php echo $reg[3] ?></td>
                        <td align='center'><?php echo $reg[4] ?></td>
                        
                    <?php 
                               
                    }?>


                    </tr>
                    
                    </tbody>
                </table>

         </form>
            
    </body>
    
    
</html>
