<?php
//   include_once"../conexion/conexion.php";
//      $obj = new conex();
//    $obj->conectar();




class unidad{
var $datos;
		

   
function ins_unidad($nom,$ubicacion)
    {
    
        $quer2=mysql_query("select * from unidad where nomunidad = '".$nom."' and estado = 'si'  " );
    //    $num_datos = mysql_num_rows($this->datos);

        $reg=mysql_fetch_array($quer2);

                   
            $varNom = $reg[1];        


        if($nom == $varNom  and $nom != "" )
            {
              echo '<div class="alert alert-danger"> La unidad <strong> "'.$varNom.'"  </strong> ya esta registrada </div>';
              echo '<center><a class="btn btn-primary" href="../vistas/Unidad/InsUnidadv.php">Registrar Nueva Unidad </a></center> ';
            
              //echo '<script type="text/javascript"> location.href="../vistas/MiEmpresa/InsEmpresaV.php"; alert ("EL RUC '.$ruc.' ya esta registrado por: '.$Nombre_Emp_Repetido.'  ");</script>';
            }

       else{
    //       header ("Location:../vistas/Ver_Empresa.php");
           $this->datos = mysql_query("insert into unidad (nomunidad,ubicacion) values ('".$nom."', '".$ubicacion."')")or die ("error de comsulta");
            
           //echo '<script type="text/javascript"> location.href="../vistas/MiEmpresa/InsEmpresaV.php"; alert ("Registrado");</script>';
            
           echo '<div class="alert alert-success"> <strong> Unidad '.$nom.' Registrada Correctamente !! </strong> </div>';
           echo '<center><a class="btn btn-primary" href="../vistas/Unidad/InsUnidadv.php">Registrar Nueva Empresa </a></center> ';
           }  
    }    

function  mod_unidad($nombre,$ubicacion,$id){
    
         //EL QUERY0 ME TRAE LOS REGISTROS ORIGINALES DEL EQUIPO PARA PONER EL NOMBRE COMO PARAMETRO EN QUERY2
        $query0= mysql_query("select * from unidad where idunidad = '".$id."' ");
        $reg0 = mysql_fetch_array($query0);
        $nom_unidad=$reg0[1];
        
        //QUERY2 QUE TRAE UN SOLO DATO PARA SER COMPARADO
        $quer2=mysql_query("select * from unidad
        where  not (nomunidad = '".$nom_unidad."') and  estado= 'si' 
        and nomunidad = '".$nombre."'" );
    
       $reg2=mysql_fetch_array($quer2);
        $varnom = $reg2[1];
       ///////////    
        
   if($nombre == $varnom  and $nombre != "" )
       {
       
       
        echo '<font color="red" > * La Unidad  <strong>"'.$nombre. '" </strong> ya esta registrada </font>'  ;
       } 

   else
     {
       
       $this->datos = mysql_query("update unidad set nomunidad =  '".$nombre."', ubicacion = '".$ubicacion."' where idunidad = '".$id."'");
        echo 'Unidad Modificada' ;
     }
   
}

function eliminar_unidad($id){
    
    $this->datos = mysql_query("update unidad set estado = 'no' where idunidad = '".$id."'");
   if($this->datos){
//       header ("Location:../vistas/Ver_Empresa.php");
        echo '<script type="text/javascript"> location.href="../vistas/Unidad/ver_unidad.php"; alert ("Eliminado");</script>';
      
    }    else {
        
       echo 'error al Eliminar'; } 
    
}


function buscar_unidad($b)
    {
             
 $this->datos = mysql_query("select * from unidad where nomunidad like '%".$b."%' and estado = 'si'  ");

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
                    <th>UBICACION</th>
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
               

                echo '<td align="center"> <a class="fancybox fancybox.iframe, btn btn-primary"  href="../Unidad/modificar_unidad.php?id='.$reg[0].'&nombre='.$reg[1].'&ubicacion='.$reg[2].'&estado='.$reg["estado"].'" >Editar</a></td>';
                echo "<td><a class='btn btn-danger' href='../../controlador/UnidadController.php?id_eliminar=".$reg[0]."'>Eliminar</a></td></tr>";       
                    }
                echo '</tr>';
                echo "</tbody>";
                echo "</table>";
        }     
    }

 
    
        function imprimir_combo_general($querycombo,$pos1,$pos2)
    {
        $this->datos = mysql_query($querycombo);
        while ($reg=mysql_fetch_array($this->datos))
        {  
        echo '<option value="'.$reg[$pos1].'">'.$reg[$pos2].'</option>'; 
        }
    }
    
        function Extraer_nom($unidad) // EXTRAE EL NOMBRE UNIDADPOR ID
{ 
      $this->datos = mysql_query("select * from unidad where idunidad = '".$unidad."'"); 
      $reg = mysql_fetch_array($this->datos);
      
      echo $reg[1];
}
    

    

function cerrar() {
        mysql_close();
    }
 
}

?>