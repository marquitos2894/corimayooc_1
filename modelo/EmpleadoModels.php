
<?php
//   include_once"../conexion/conexion.php";
//      $obj = new conex();
//    $obj->conectar();

class Emp_Proveedor {
var $datos;
		

function ins_Emp_Prove($id_prov,$nombre,$correo,$direccion,$dni){
    
     $quer2=mysql_query("select * from empleado where dni = '".$dni."' and estado = 'SI'  " );
//    $num_datos = mysql_num_rows($this->datos);
   
    $reg=mysql_fetch_array($quer2);
        
        $nom_emp_rep = $reg[2];
        $vardni = $reg["dni"];
    
    if($dni == $vardni && $dni != "")
        {
        //echo 'El DNI  "'.$dni.'"  ya esta registrado por  "'.$nom_emp_rep.'"'  ;
        echo '<div class="alert alert-danger"> El DNI <strong> "'.$dni.'"  </strong> ya esta registrado por <strong> "'.$nom_emp_rep.'"</strong> </div>';
        echo '<center><a class="btn btn-primary" href="../vistas/Empleado_Prov/InsEmp_ProvV.php">Registrar Nuevo Trabajador</a></center> ';
        }
   
   else{
//       header ("Location:../vistas/Ver_Empresa.php");
        $this->datos = mysql_query("insert into empleado (id_prove,nombre,correo,direccion,dni) values ('".$id_prov."','".$nombre."','".$correo."', '".$direccion."','".$dni."')");
        echo '<link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>';
        echo '<div class="alert alert-success"> <strong> Trabajador Registrado Correctamente !! </strong> </div>';
        echo '<center><a class="btn btn-primary" href="../vistas/Empleado_Prov/InsEmp_ProvV.php">Registrar Nuevo Trabajador</a></center> ';
     }    
    
}

function  mod_Emp_Prove($id_prov,$nombre,$correo,$direccion,$dni,$id_Emp){
    
    //EL QUERY0 ME TRAE LOS REGISTROS ORIGINALES DEL EQUIPO PARA PONER EL NOMBRE COMO PARAMETRO EN QUERY2
        $query0= mysql_query("select * from empleado where id_empleado = '".$id_Emp."' ");
        $reg0 = mysql_fetch_array($query0);
        $dni_bd_pro=$reg0['dni'];
        
        //QUERY2 QUE TRAE UN SOLO DATO PARA SER COMPARADO
        $quer2=mysql_query("select * from empleado 
            where  not (dni = '".$dni_bd_pro."') and  estado= 'si' 
            and dni = '".$dni."'" );
        
        $reg2=mysql_fetch_array($quer2);
        $nom_emp_rep = $reg2[2];
        $vardni = $reg2['dni'];

  if($dni == $vardni  and $dni != "" )
       {
        echo ' <font color="red" > * El DNI  <strong>"'.$dni. '"</strong>  ya esta registrado por <strong> "'.$nom_emp_rep.'" </strong></font> '  ;
       }
    
    
   
   else 
       {
       $this->datos = mysql_query("update empleado set id_prove = '".$id_prov."' ,nombre ='".$nombre."',correo ='".$correo."',direccion='".$direccion."',dni='".$dni."' where id_empleado='".$id_Emp."'");
        echo 'Empleado Modificado';
       
       }
       
}

function Eliminar_Emp_Prove($id){
    
    $this->datos = mysql_query("update empleado set estado = 'NO' where id_empleado = '".$id."'");
   if($this->datos){
//       header ("Location:../vistas/Ver_Empresa.php");
        echo '<script type="text/javascript"> location.href="../vistas/Empleado_Prov/Ver_Emp_Prov.php"; alert ("Eliminado");</script>';
      
    }    else {
        
       echo 'error al Eliminar'; } 
    
}
function nom_prov($codigo)
{
    $this->datos=  mysql_query($codigo);
    $reg=mysql_fetch_array($this->datos);
    
        echo $reg[1];
   
}



//function Buscar($dato){
//    $this->datos = mysql_query("select * from empleado where nombre like '%".$dato."%' and estado = 'SI' OR ruc like '%".$dato."%' and estado = 'SI' OR direccion like '%".$dato."%' and estado = 'SI'  ");
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

function buscar_Emp_Prove($b)
    {             
        $this->datos = mysql_query("select e.id_empleado,e.nombre, e.dni, e.correo,e.direccion,p.nombre,p.id_prove from empleado e
inner join proveedor p on e.id_prove = p.id_prove where e.nombre like '%".$b."%' and e.estado = 'SI' OR e.correo like '%".$b."%' and e.estado = 'SI'  OR e.dni like '%".$b."%' and e.estado = 'SI'  OR e.direccion like '%".$b."%' and e.estado = 'SI' OR p.nombre like '%".$b."%' and e.estado = 'SI'   ");

//        $num_campos = mysql_num_fields($this->datos);
        $num_datos = mysql_num_rows($this->datos);
        
        if($num_datos==0)
        {

            echo "<h1 align='center'>No se encontraron registros</h1>";
            
            
        }
        else 
        {
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
            <div id="cuadro" class="table-responsive" >
                 <div id="paginador"></div> 
            <table  border="1" align="center" id="tabprov" class="table table-hover" > 
                <thead> 
                <tr class="centro">
                    <th>ITEM</th>
                    <th>EMPRESA</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>DIRECCION</th>
                    <th>DNI</th>
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
                echo "<td align='center'>".$reg["1"]."</td>";
                echo "<td align='center'>".$reg["correo"]."</td>";
                echo "<td align='center'>".$reg["direccion"]."</td>";
                echo "<td align='center'>".$reg["dni"]."</td>";

                echo '<td align="center"> <a class="fancybox fancybox.iframe, btn btn-primary" href="../Empleado_Prov/fancyBoxModificar_Emp_Prove.php?id_emple='.$reg["id_empleado"]. '&id_prove='.$reg["id_prove"].'&nombre='.$reg["1"].'&correo='.$reg["correo"].'&direccion='.$reg["direccion"].'&dni='.$reg["dni"].'&estado='.$reg["estado"].'" >Editar</a></td>';
                 echo "<td><a  class='btn btn-danger' href='../../controlador/Empleado_Controller.php?id_eliminar=".$reg["id_empleado"]."'>Eliminar</a></td></tr>";     
                    }
                echo '</tr>';
                echo "</tbody>";
                echo "</table>";
        
        }    
    } 
    
         function traer_id_prov($nom)
    {

    $this->datos = mysql_query("select * from proveedor where nombre = '".$nom."' and estado='si'");
    $reg=mysql_fetch_array($this->datos);

    echo  $reg[0];

    }
    
    function datos_prove($id_pr,$pos)
    {
        
        $this->datos = mysql_query("select * from proveedor where id_prove = $id_pr and estado='si'");
        $reg=mysql_fetch_array($this->datos);
        echo $reg[$pos];
    }
    
       function datos_pro($query,$pos)
    {
        $this->datos= mysql_query($query);
        $reg=mysql_fetch_array($this->datos);
                    
         echo $reg[$pos];  
        
        
    }
            


function cerrar() {
        mysql_close();
    }
 
}

?>

