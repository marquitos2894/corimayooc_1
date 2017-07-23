<?php
//   include_once"../conexion/conexion.php";
//      $obj = new conex();
//    $obj->conectar();

class Proveedor {
var $datos;
		
function listar_Proveedor($codigo){
     $this->datos=mysql_query($codigo) or die ('error de consulta');
    }
   
function imprimir(){
      
        $num_reg= mysql_num_rows($this->datos);
        $num_campos = mysql_num_fields($this->datos);
//        echo $num_campos;
        echo "N° de registros: ". $num_reg;
        
        $i=1;
       
            while(($i<=$num_reg) && ($reg = mysql_fetch_array($this->datos)) ){
            echo '<tr>';
//            for ($i=0;$i<$num_campos;$i++){
//            echo '<td>' . $reg[$i] . '</td>';
//            echo "<td align='center'>".$reg["id_mi_empresa"]."</td>";
             
//            echo "<td align='center'>". for($i=1;$i<=$num_reg; $i++)  ."</td>";
             
            echo "<td align='center'>".$i; $i++ ."</td>";	
            echo "<td align='center'>".$reg["nombre"]."</td>";	
            echo "<td align='center'>".$reg["ruc"]."</td>";
            echo "<td align='center'>".$reg["direccion"]."</td>";
           
            echo '<td align="center"> <a class="fancybox fancybox.iframe" href="../Proveedor/fancyBoxModificar_Prove.php?id='.$reg["id_prove"].'&nombre='.$reg["nombre"].'&ruc='.$reg["ruc"].'&direccion='.$reg["direccion"].'&estado='.$reg["estado"].'" >Editar</a></td>';
            echo "<td><a href='../../controlador/ProveedorController.php?id_eliminar=".$reg["id_prove"]."'>Eliminar</a></td></tr>";       

             }
        
            echo '</tr>';
        }
   
function ins_Prove($nom,$ruc,$dire){
    
    $quer2=mysql_query("select * from proveedor where ruc = '".$ruc."' and estado = 'SI'  " );
//    $num_datos = mysql_num_rows($this->datos);
   
    $reg=mysql_fetch_array($quer2);
    
        $NonbreProveRepetido = $reg[1];         
        $varRuc = $reg["ruc"];        
     if($ruc == $varRuc  and $ruc != "" )
     {   
//         echo $reg[2].'<br>';
            
    //echo '<script type="text/javascript"> location.href="../vistas/Proveedor/InsProveedorV.php"; alert ("RUC YA ESTA REGISTRADO POR '.$NonbreProveRepetido.'"); </script>';
   
    echo '<div class="alert alert-danger">  * El ruc  <strong>"'.$ruc.'" </strong>  ya esta registrado por  <strong>"'.$NonbreProveRepetido.'"  </strong> </div>';
    echo '<center><a class="btn btn-primary" href="../vistas/Proveedor/InsProveedorV.php">Registrar Nuevo Proveedor</a></center> ';
     }
     else if ($ruc == "" )
         {
         
          $this->datos = mysql_query("insert into proveedor (nombre,ruc,direccion) values ('".$nom."', '".$ruc."', '".$dire."')");
          
          echo '<div class="alert alert-warning"> <strong>Falto el ruc pero el  Proveedor  "'.$nom.'" se registro Correctamente !! </strong> </div>';
          echo '<center><a class="btn btn-primary" href="../vistas/Proveedor/InsProveedorV.php">Registrar Nuevo Proveedor</a></center> ';
          
          //echo '<script type="text/javascript"> location.href="../vistas/Proveedor/InsProveedorV.php"; alert ("FALTO EL RUC, PROVEEDOR REGISTRADO "); </script>';
         }
     
    else  //if ($ruc != $varRuc)
   {
      
    $this->datos = mysql_query("insert into proveedor (nombre,ruc,direccion) values ('".$nom."', '".$ruc."', '".$dire."')");
       
         echo '<div class="alert alert-success"> <strong> Proveedor  "'.$nom.'"  Registrado Correctamente !! </strong> </div>';
          echo '<center><a class="btn btn-primary" href="../vistas/Proveedor/InsProveedorV.php">Registrar Nuevo Proveedor</a></center> ';
    
      // echo '<script type="text/javascript"> location.href="../vistas/Proveedor/InsProveedorV.php"; alert ("Registrado");</script>';
      
       
   }
       
    
    
}

function  mod_Prove($nombre,$ruc,$direccion,$id){
    
     //EL QUERY0 ME TRAE LOS REGISTROS ORIGINALES DEL EQUIPO PARA PONER EL NOMBRE COMO PARAMETRO EN QUERY2
        $query0= mysql_query("select * from proveedor where id_prove = '".$id."' ");
        $reg0 = mysql_fetch_array($query0);
        $ruc_bd_pro=$reg0[2];
        
        //QUERY2 QUE TRAE UN SOLO DATO PARA SER COMPARADO
        $quer2=mysql_query("select * from proveedor 
        where  not (ruc = '".$ruc_bd_pro."') and  estado= 'si' 
        and ruc = '".$ruc."'" );
    
       $reg2=mysql_fetch_array($quer2);
        $varruc = $reg2[2];
       ///////////    
        
   if($ruc == $varruc  and $ruc != "" )
       {
         echo '<font color="red" > * El ruc  <strong>"'.$ruc. '" </strong> ya esta registrado por <strong> "'.$reg2[1].'" </strong></font>'  ;
       }     
   
   else {
        $this->datos = mysql_query("update proveedor set nombre =  '".$nombre."', ruc = '".$ruc."',direccion = '".$direccion."' where id_prove = '".$id."'");
       echo 'Proveedor Modificado' ;
        }
  
}

function Eliminar_Prove($id){
    
    $this->datos = mysql_query("update proveedor set estado = 'NO' where id_prove = '".$id."'");
   if($this->datos){
//       header ("Location:../vistas/Ver_Empresa.php");
        echo '<script type="text/javascript"> location.href="../vistas/Proveedor/Ver_Proveedor.php"; alert ("Eliminado");</script>';
      
    }    else {
        
       echo 'error al Eliminar'; } 
    
}
//
//
//
//function Buscar($dato){
//    $this->datos = mysql_query("select * from proveedor where nombre like '%".$dato."%' and estado = 'SI' OR ruc like '%".$dato."%' and estado = 'SI' OR direccion like '%".$dato."%' and estado = 'SI'  ");
//
//    $num_campos = mysql_num_fields($this->datos);
//    $num_datos = mysql_num_rows($this->datos);
//    if($num_reg=mysql_num_rows($this->datos)<1){
//        echo "No se encontraron registros ";
//    }
//    else    
//        $i=1;
//        echo $num_datos;
//        while(($i<=$num_datos) && ($reg = mysql_fetch_array($this->datos))){
//            echo '<tr>';
////            for ($i=0;$i<$num_campos;$i++){
////            echo '<td>' . $reg[$i] . '</td>';
////            echo "<td align='center'>".$reg["id_mi_empresa"]."</td>";
//            echo "<td align='center'>".$i; $i++ ."</td>";
//            echo "<td align='center'>".$reg["nombre"]."</td>";	
//            echo "<td align='center'>".$reg["ruc"]."</td>";
//            echo "<td align='center'>".$reg["direccion"]."</td>";
//           
//            echo '<td align="center"> <a class="fancybox fancybox.iframe" href="fancyBoxModificar_Prove.php?id='.$reg["id_mi_empresa"].'&nombre='.$reg["nombre"].'&ruc='.$reg["ruc"].'&direccion='.$reg["direccion"].'&estado='.$reg["estado"].'" >Editar</a></td>';
//            echo "<td><a href='../../controlador/ProveedorController.php?id_eliminar=".$reg["id_mi_empresa"]."'>Eliminar</a></td></tr>";       
//                }
//            echo '</tr>';
//    }
// 
function buscarProve($b)
    {
             
        $this->datos = mysql_query("select * from proveedor where nombre like '%".$b."%' and estado = 'SI' OR ruc like '%".$b."%' and estado = 'SI' OR direccion like '%".$b."%' and estado = 'SI'  ");

        $num_campos = mysql_num_fields($this->datos);
        $num_datos = mysql_num_rows($this->datos);
        
        if($num_datos==0){

            echo "<h1 align='center'>No se encontraron registros</h1>";
            
            
        }
        else {
             $i=1;
            echo 'N° de Registros: '.$num_datos;
            ?>  

             <script type="text/javascript">
                var p = new Paginador(
                    document.getElementById('paginador'),
                    document.getElementById('tabprov'),
                    20
                );
                p.Mostrar();
            </script>

            <div id="cuadro" class="table-responsive"  >
                 <div id="paginador"></div> 
            <table  border="1" align="center" id="tabprov" class="table table-hover">
                <thead> 
                <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                    <th>NOMBRE</th>
                    <th>RUC</th>
                    <th>DIRECCION</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>

                </tr>
                </thead>
                <tbody>
            <?php
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($this->datos))){

                echo '<tr>';
                echo "<td align='center'>".$i; $i++ ."</td>";
                echo "<td align='center'>".$reg["nombre"]."</td>";	
                echo "<td align='center'>".$reg["ruc"]."</td>";
                echo "<td align='center'>".$reg["direccion"]."</td>";

                echo '<td align="center"> <a class="fancybox fancybox.iframe, btn btn-primary" href="../Proveedor/fancyBoxModificar_Prove.php?id='.$reg["id_prove"].'&nombre='.$reg["nombre"].'&ruc='.$reg["ruc"].'&direccion='.$reg["direccion"].'&estado='.$reg["estado"].'" >Editar</a></td>';
                echo "<td><a  class='btn btn-danger' href='../../controlador/ProveedorController.php?id_eliminar=".$reg["id_prove"]."'>Eliminar</a></td></tr>";       
                    }
                echo '</tr>';
                echo "</tbody>";
                echo "</table>";
        
            
        } 
        
         echo '<div id="paginador"></div>';   
      }
        
function cerrar() {
        mysql_close();
    }
 
}

?>