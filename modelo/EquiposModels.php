<?php
//   include_once"../conexion/conexion.php";
//      $obj = new conex();
//    $obj->conectar();




class Equipos{
var $datos;
		

   
   
function Ins_Equipos($Nom_Equi,$Tipo_Equi,$Marca_Equi,$Modelo_Equi,$NSerie_Equi,$idunidad){
    
     $quer2=mysql_query("select * from equipos where
    nombre_equipo = '".$Nom_Equi."'  and estado='si'" );
     
     $quer3=mysql_query("select * from equipos where
     nserie_equipo = '".$NSerie_Equi."' and estado='si'" );
    
     $reg=mysql_fetch_array($quer2);
                   
        $nom_equipo = $reg[1];
        
        $reg2= mysql_fetch_array($quer3);
        $nserie = $reg2[5];
     
      if($Nom_Equi == $nom_equipo  and $Nom_Equi != ""  )
     {   
//         echo $reg[2].'<br>';
         
     echo '<div class="alert alert-danger">El equipo  <strong> "'.$nom_equipo.'"  </strong>  ya esta registrado </div>';
        echo '<center><a class="btn btn-primary" href="../vistas/Equipos/InsEquiposV.php">Registrar Nuevo Equipo</a></center> ';      
          
    //echo '<script type="text/javascript"> location.href="../vistas/Equipos/InsEquiposV.php"; alert ("EQUIPO '.$nom_equipo.' YA ESTA REGISTRADO "); </script>';
   
     }
     
     else if($NSerie_Equi == $nserie and $NSerie_Equi != "")
     {
         
        echo '<div class="alert alert-warning">  El N serie <strong> "'.$nserie.'" </strong>  ya esta registrado en el equipo  <strong> "'.$nom_equipo.'" </strong> </div>';
        echo '<center><a class="btn btn-primary" href="../vistas/Equipos/InsEquiposV.php">Registrar Nuevo Equipo</a></center> ';
         
        // echo '<script type="text/javascript"> location.href="../vistas/Equipos/InsEquiposV.php"; alert ("N SERIE: '.$nserie.' YA ESTA REGISTRADO EN EL EQUIPO '.$nom_equipo.'  "); </script>';
     }
     
        
    
    else
        {
//       header ("Location:../vistas/Ver_Empresa.php");
        $this->datos = mysql_query("insert into equipos (Nombre_Equipo,Tipo_Equipo,Marca_Equipo,Modelo_Equipo,NSerie_Equipo,idunidad) values "
            . "     ('".$Nom_Equi."','".$Tipo_Equi."','".$Marca_Equi."','".$Modelo_Equi."','".$NSerie_Equi."','".$idunidad."')")or die ("error de comsulta");
  
        
             echo '<div class="alert alert-success"> <strong> Equipo Registrado Correctamente !! </strong> </div>';
        echo '<center><a class="btn btn-primary" href="../vistas/Equipos/InsEquiposV.php">Registrar Nuevo Equipo</a></center> ';
        
        
//        echo '<script type="text/javascript"> location.href="../vistas/Equipos/InsEquiposV.php"; alert ("Registrados");</script>';
      
        }
 
    
}

function  Mod_Equipos($Nom_Equi,$Tipo_Equi,$Marca_Equi,$Modelo_Equi,$NSerie_Equi,$id_equipo,$idunidad)
    {
        //EL QUERY0 ME TRAE LOS REGISTROS ORIGINALES DEL EQUIPO PARA PONER EL NOMBRE COMO PARAMETRO EN QUERY2
        $query0= mysql_query("select * from equipos where id_equipo = '".$id_equipo."' ");
        $reg0 = mysql_fetch_array($query0);
        $nom_bd_equi=$reg0[1];
        

        //QUERY2 QUE TRAE UN SOLO DATO PARA SER COMPARADO
        $quer2=mysql_query("select * from equipos "
          . "where  not (nombre_equipo = '".$nom_bd_equi."') and not estado= 'ELIMINAR'"
                . " and nombre_equipo = '".$Nom_Equi."' " );
    
       $reg2=mysql_fetch_array($quer2);
       $nom_equipo = $reg2[1];
       /////////// 
        if($Nom_Equi == $nom_equipo  and $Nom_Equi != ""  )
        {   
//         echo $reg[2].'<br>';
//         $query=mysql_query("select * from equipos "
//          . "where nombre_equipo = '".$Nom_Equi."' and not estado= 'ELIMINAR' " );    
//         $reg=  mysql_fetch_array($query);  
          
            echo ' <font color="red" > * El equipo  '.$Nom_Equi.'  ya esta registrado, por favor intentelo de nuevo </font> '   ;
          //echo '<script type="text/javascript"> location.href="../Equipos/ModificarEquipos.php?id='.$reg[0].'&nombre='.$reg[1].'&tipo='.$reg[2].'&marca='.$reg[3].'&modelo='.$reg[4].'&nserie='.$reg[5].'&estado='.$reg[6].'  "; alert ("EQUIPO '.$nom_equipo.' EQUIPO YA ESTA REGISTRADO "); </script>';
          
        }

   
        else {
         $this->datos = mysql_query("update equipos set Nombre_Equipo =  '".$Nom_Equi."', Tipo_Equipo = '".$Tipo_Equi."',Marca_Equipo = '".$Marca_Equi."',Modelo_Equipo = '".$Modelo_Equi."',NSerie_Equipo = '".$NSerie_Equi."',idunidad = '".$idunidad."' where Id_Equipo = '".$id_equipo."'");
          echo 'Modificado' ;
        }
       
     
       
   }


function Eliminar_Equipos($id_equipo){
    
    $this->datos = mysql_query("update equipos set estado = 'no' where Id_Equipo = '".$id_equipo."'");
   if($this->datos){
//       header ("Location:../vistas/Ver_Empresa.php");
        echo '<script type="text/javascript"> location.href="../vistas/Equipos/Ver_Equipos.php"; alert ("Eliminado");</script>';
      
    }    else {
        
       echo 'error al Eliminar'; } 
    
}

//function Buscar($dato)
//    {
//    $this->datos = mysql_query("select * from mi_empresa where nombre like '%".$dato."%' and estado = 'SI' OR ruc like '%".$dato."%' and estado = 'SI' OR direccion like '%".$dato."%' and estado = 'SI'  ");
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
//            echo '<td align="center"> <a class="fancybox fancybox.iframe" href="fancyBoxModificar.php?id='.$reg["id_mi_empresa"].'&nombre='.$reg["nombre"].'&ruc='.$reg["ruc"].'&direccion='.$reg["direccion"].'&estado='.$reg["estado"].'" >Editar</a></td>';
//            echo "<td><a href='../../controlador/EmpresaController.php?id_eliminar=".$reg["id_mi_empresa"]."'>Eliminar</a></td></tr>";       
//                }
//            echo '</tr>';
//    }
 
function BuscarEquipos($b)
    {
             
 $this->datos = mysql_query("select eq.Id_Equipo,eq.Nombre_Equipo,eq.Tipo_Equipo,eq.Marca_Equipo,
eq.Modelo_Equipo,eq.NSerie_Equipo,uni.nomunidad,uni.idunidad
from  equipos eq
inner join unidad uni on uni.idunidad  = eq.idunidad
where  eq.tipo_equipo like '%".$b."%' and  eq.estado='si'
OR    eq.marca_equipo like '%".$b."%'  and eq.estado='si' 
OR  eq.modelo_equipo like '%".$b."%' and  eq.estado='si'  
OR eq.nserie_equipo like '%".$b."%'  and  eq.estado='si'
OR   eq.nombre_equipo like '%".$b."%'  and  eq.estado='si' order by eq.Nombre_Equipo asc ");

        $num_campos = mysql_num_fields($this->datos);
        $num_datos = mysql_num_rows($this->datos);
        
        if($num_datos==0)
        {

            echo "<h1 align='center'>No se encontraron registros</h1>";
   
            
        }
        else 
        {
             $i=1;
            
        echo  '<h4>' .'N° de Registros: '.$num_datos.'</h4>' ;  
            
        ?>  
            <script type="text/javascript">
                var p = new Paginador(
                    document.getElementById('paginador'),
                    document.getElementById('tabprov'),
                    20
                );
                p.Mostrar();
            </script>

            <div id="cuadro" class="table-responsive">
                 <div id="paginador"></div> 
            <table  border="1" align="center"  id="tabprov" class="table table-hover">
                <thead> 
                    <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                    <th>NOMBRE</th>
                    <th>TIPO</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>NSERIE</th>
                    <th>UNIDAD</th>
                    <th>MODIFICAR</th>
                    <th>ELIMINAR</th>

                    </tr>
                </thead>
               
                <tbody>
            <?php
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($this->datos))){

                echo '<tr>';
                echo "<td align='center'>".$i; $i++ ."</td>";
                echo "<td align='center'>".$reg[1]."</td>";	
                echo "<td align='center'>".$reg[2]."</td>";
                echo "<td align='center'>".$reg[3]."</td>";
                echo "<td align='center'>".$reg[4]."</td>";
                echo "<td align='center'>".$reg[5]."</td>";
                echo "<td align='center'>".$reg[6]."</td>";
                
                
                echo '<td align="center"> <a class="fancybox fancybox.iframe, btn btn-primary"  href="../Equipos/ModificarEquipos.php?id='.$reg[0].'&nombre='.$reg[1].'&tipo='.$reg[2].'&marca='.$reg[3].'&modelo='.$reg[4].'&nserie='.$reg[5].'&unidad='.$reg[7].'  " >Editar</a></td>';
                echo "<td><a class='btn btn-danger' href='../../controlador/EquiposController.php?id_eliminar=".$reg[0]."'>Eliminar</a></td></tr>";       
                    }
                echo '</tr>';
                echo "</tbody>";
                echo "</table>";
        }     
    }

 
    

function cerrar() {
        mysql_close();
    }
 
}

?>