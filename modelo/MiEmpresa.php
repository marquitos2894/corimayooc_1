<?php
//   include_once"../conexion/conexion.php";
//      $obj = new conex();
//    $obj->conectar();




class MiEmpresa{
var $datos;
		

   
function ins_empresa($nom,$ruc,$dire)
    {
    
    echo '<link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>';
        $quer2=mysql_query("select * from mi_empresa where ruc = '".$ruc."' and estado = 'SI'  " );
    //    $num_datos = mysql_num_rows($this->datos);

        $reg=mysql_fetch_array($quer2);

            $Nombre_Emp_Repetido = $reg[1];         
            $varRuc = $reg["ruc"];        


        if($ruc == $varRuc  and $ruc != "" )
            {
              echo '<div class="alert alert-danger"> El RUC <strong> "'.$ruc.'"  </strong> ya esta registrado por <strong> "'.$Nombre_Emp_Repetido.'"</strong> </div>';
              echo '<center><a class="btn btn-primary" href="../vistas/MiEmpresa/InsEmpresaV.php">Registrar Nueva Empresa </a></center> ';
            
              //echo '<script type="text/javascript"> location.href="../vistas/MiEmpresa/InsEmpresaV.php"; alert ("EL RUC '.$ruc.' ya esta registrado por: '.$Nombre_Emp_Repetido.'  ");</script>';
            }

       else{
    //       header ("Location:../vistas/Ver_Empresa.php");
           $this->datos = mysql_query("insert into mi_empresa (nombre,ruc,direccion) values ('".$nom."', '".$ruc."', '".$dire."')")or die ("error de comsulta");
            
           //echo '<script type="text/javascript"> location.href="../vistas/MiEmpresa/InsEmpresaV.php"; alert ("Registrado");</script>';
            
           echo '<div class="alert alert-success"> <strong> Empresa '.$nom.' Registrada Correctamente !! </strong> </div>';
           echo '<center><a class="btn btn-primary" href="../vistas/MiEmpresa/InsEmpresaV.php">Registrar Nueva Empresa </a></center> ';
           }  
    }    

function  mod_empresa($nombre,$ruc,$direccion,$id){
    
         //EL QUERY0 ME TRAE LOS REGISTROS ORIGINALES DEL EQUIPO PARA PONER EL NOMBRE COMO PARAMETRO EN QUERY2
        $query0= mysql_query("select * from mi_empresa where id_mi_empresa = '".$id."' ");
        $reg0 = mysql_fetch_array($query0);
        $ruc_bd_miemp=$reg0[2];
        
        //QUERY2 QUE TRAE UN SOLO DATO PARA SER COMPARADO
        $quer2=mysql_query("select * from mi_empresa 
        where  not (ruc = '".$ruc_bd_miemp."') and  estado= 'si' 
        and ruc = '".$ruc."'" );
    
       $reg2=mysql_fetch_array($quer2);
        $varruc = $reg2[2];
       ///////////    
        
   if($ruc == $varruc  and $ruc != "" )
       {
       
       
        echo '<font color="red" > * El ruc  <strong>"'.$ruc. '" </strong> ya esta registrado por <strong> "'.$reg2[1].'" </strong></font>'  ;
       } 

   else
     {
       
       $this->datos = mysql_query("update mi_empresa set nombre =  '".$nombre."', ruc = '".$ruc."',direccion = '".$direccion."' where id_mi_empresa = '".$id."'");
        echo 'Modificado' ;
     }
   
}

function Eliminar_empresa($id){
    
    $this->datos = mysql_query("update mi_empresa set estado = 'NO' where id_mi_empresa = '".$id."'");
   if($this->datos){
//       header ("Location:../vistas/Ver_Empresa.php");
        echo '<script type="text/javascript"> location.href="../vistas/MiEmpresa/Ver_Empresa.php"; alert ("Eliminado");</script>';
      
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
 
function buscar2($b)
    {
             
 $this->datos = mysql_query("select * from mi_empresa where nombre like '%".$b."%' and estado = 'SI' OR ruc like '%".$b."%' and estado = 'SI' OR direccion like '%".$b."%' and estado = 'SI'  ");

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

            <div id="cuadro" class="table-responsive">
                 
            <table  border="1" align="center" class="table table-hover">
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

                echo '<td align="center"> <a class="fancybox fancybox.iframe, btn btn-primary"  href="../MiEmpresa/fancyBoxModificar.php?id='.$reg["id_mi_empresa"].'&nombre='.$reg["nombre"].'&ruc='.$reg["ruc"].'&direccion='.$reg["direccion"].'&estado='.$reg["estado"].'" >Editar</a></td>';
                echo "<td><a class='btn btn-danger' href='../../controlador/EmpresaController.php?id_eliminar=".$reg["id_mi_empresa"]."'>Eliminar</a></td></tr>";       
                    }
                echo '</tr>';
                echo "</tbody>";
                echo "</table>";
        }     
    }


    
    
        function imprimirGeneral($querycombo,$pos1,$pos2)
    {
        $this->datos = mysql_query($querycombo);
        while ($reg=mysql_fetch_array($this->datos))
        {  
        echo '<option value="'. $reg[$pos1] .'">'.$reg[$pos2].'</option>'; 
        }
    }
    

function cerrar() {
        mysql_close();
    }
 
}

?>