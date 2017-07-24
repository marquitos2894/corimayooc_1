<?php


class ordencompra
{
    
    var $datos;

    function imprimircombo($codigocombo)
    {
        $this->datos = mysql_query($codigocombo);
        while ($reg=mysql_fetch_array($this->datos))
        {  
        echo '<option value="'. $reg[0] .'">'.$reg[1].'</option>'; 
        }
    }
    
     function imprimirGeneral($querycombo,$pos)
    {
        $this->datos = mysql_query($querycombo);
        while ($reg=mysql_fetch_array($this->datos))
        {  
        echo '<option value="'. $reg[0] .'">'.$reg[$pos].'</option>'; 
        }
    }
        
    function imprimircombo_ruc($codigocombo)
    {
        $this->datos = mysql_query($codigocombo);
        $reg=mysql_fetch_array($this->datos);

        echo  $reg[2];

    }
    function imprimircombo_dir($codigocombo)
    {

    $this->datos = mysql_query($codigocombo);
    $reg=mysql_fetch_array($this->datos);

    echo  $reg[3];
    } 

    function imprimircombo_EmpProv($codigocombo)
    {

    $this->datos = mysql_query($codigocombo);
        while ($reg=mysql_fetch_array($this->datos))
        {  
        echo '<option value="'. $reg[0] .'"> '.$reg[2].'</option>'; 
        }

    }
    
          
    function imprimir_dirPro($codigocombo)
    {

    $this->datos = mysql_query($codigocombo);
    $reg=mysql_fetch_array($this->datos);

    echo  $reg[3];

    }
        
        
    function ins_detalle_Oc($id_oc,$com,$nparte,$cant,$precio,$total)
    {

        for ($i=0;$i<sizeof($com)-1;$i++ )
        {
        $this->datos = mysql_query("insert into detalle_oc (id_oc,componente,n_parte,cant,precio,total_compo)
        values(ltrim(rtrim('".$id_oc."')),'".$com[$i]."','".$nparte[$i]."','".$cant[$i]."','".$precio[$i]."','".$total[$i]."')");
        }
    if($this->datos)
        {
         header("Location: ../reportes/reportes/reporteOC.php?id=".$id_oc);
    //       header ("Location:../vistas/Ver_Empresa.php");
    //echo '<a href="../reportes/reportes/reporteOC.php?id='.$id_oc.' ">Ver ficha del cliente</a>';

        }    
        else 
        {
    echo 'error al insertar'; 
        } 

    }
   
    function ins_oc($idusu,$id_prove,$id_mi_empresa,$id_empleado,$fecha,$formapago,$lugarEntrega,$cotizacion,$Equipo,$Subtotal,$Igv,$Completo,$Referencia,$Moneda)
    {
        $this->datos = mysql_query("insert into oc (id_usu,id_prove,id_mi_empresa,id_empleado,fecha,formapago,lugarEntrega,cotizacion,Id_Equipo,subtotal,igv,total,referenciaoc,moneda)
                   values('".$idusu."' ,'".$id_prove."','".$id_mi_empresa."','".$id_empleado."','".$fecha."','".$formapago."','".$lugarEntrega."','".$cotizacion."','".$Equipo."','".$Subtotal."','".$Igv."','".$Completo."','".$Referencia."','".$Moneda."')");
        
//        echo mysql_insert_id();
        
        if($this->datos)
        {
        echo '';
        }    
        else 
        {
        echo 'error al insertar'; 
        } 
        
    }
    
     function ins_detalle_Oc2($id_oc,$com)
    {

        for ($i=0;$i<sizeof($com);$i++ )
        {
            $this->datos = mysql_query("insert into detalle_oc (id_oc,componente)
            values('".$id_oc."','".$com[$i]."')");
        }
    if($this->datos)
        {
           
            //echo '<a href="../reportes/reportes/reporteOC.php?id="'.$id_oc.'" ">Ver ficha del cliente</a>';
        }    
        else 
        {
            echo 'error al insertar'; 
        } 

    }
    
    function Eliminar_oc($id_eliminar){
    
    $this->datos = mysql_query("update oc set estado = 'NO' where id_oc = '".$id_eliminar."'");
   if($this->datos){
//       header ("Location:../vistas/Ver_Empresa.php");
        echo '<script type="text/javascript"> location.href="../vistas/Ordenesdecompras/Ocview.php"; alert ("Orde de compra Anulada");</script>';
      
    }    else {
        
       echo 'error al Eliminar'; } 
    
}
    
    function id_de_oc()
    {
        $rs = mysql_query("SELECT MAX(id_oc)+1 AS id FROM oc");
        if ($row = mysql_fetch_array($rs)) 
        {
            $id = trim($row[0]);
        }        
            echo '0'.$id.'-';
            $hoy = @getdate();
            $añoarray=($hoy[year]);
            $año = substr($añoarray,-2);
            echo $año;
        
    }
    
    function datosOcprevio($query,$pos)
    {
        $this->datos= mysql_query($query);
        $reg=mysql_fetch_array($this->datos);
                    
         echo $reg[$pos];  
        
        
    }
//   
//    function imp_oc()
//    {
//       
//        $this->datos= mysql_query("select * from oc");
//        
//         while($reg = mysql_fetch_array($this->datos));
//             
//        
//        
//    }
    
    
   function buscarOc($b)
    {
             
     $this->datos = mysql_query("select o.id_oc,
        mem.nombre,
        pro.nombre,
        emp.nombre, 
        o.total,o.fecha,o.referenciaoc
        from oc o 
        inner join mi_empresa mem
        on o.id_mi_empresa = mem.id_mi_empresa 
        inner join proveedor pro 
        on o.id_prove = pro.id_prove 
        inner join empleado emp
        on emp.id_empleado = o.id_empleado 
        where mem.nombre like '%".$b."%' and mem.estado = 'SI' and o.estado = 'SI' or "
             . "pro.nombre like '%".$b."%' and pro.estado = 'SI' and o.estado = 'SI' or "
             . "emp.nombre like '%".$b."%' and emp.estado = 'SI' and o.estado = 'SI' or  "
             . "o.referenciaoc like '%".$b."%' and o.estado = 'SI' or "

             . "o.id_oc like '%".$b."%' and o.estado = 'SI'"

             ." order by o.id_oc desc ");

        $num_campos = mysql_num_fields($this->datos);
        $num_datos = mysql_num_rows($this->datos);
        
        if($num_datos==0)
        {

            echo "<h1 align='center'>No se encontraron registros</h1>";
            echo "<h2 align='center'> Caracter: ".$b."<h2/><br>" ;
           
   
            
        }
        else 
        {
             $i=1;
            
        echo  '<h4>' .'N° de Registros: '.$num_datos.'</h4>' ;  
            
        ?>  
            <script type="text/javascript">
                var p = new Paginador(
                    document.getElementById('paginador'),
                    document.getElementById('tblDatos'),
                    15
                );
                p.Mostrar();
            </script>

            <div id="cuadro" class="table-responsive">
                <div id="paginador"></div> 
            <table  border="1" align="center" class="table table-hover"  id="tblDatos">
                <thead> 
                    <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                     <th>FECHA</th>
                    <th>OC</th>
                    <th>EMPRESA</th>
                    <th>PROVEEDOR</th>
                    <th>REFERENCIA</th>
                    <th>ATENCIA A</th>
                    <th>TOTAL</th>
                    <th>REPORTE</th>
                    <th>ANULAR</th>

                    </tr>
                </thead>
               
                <tbody>
            <?php
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($this->datos)))
                    {

                        echo '<tr>';
                        echo "<td align='center'>".$i; $i++ ."</td>";
                        echo "<td align='center'>".$reg[5]."</td>";
                        echo "<td align='center'>".$reg[0]."</td>";
                        echo "<td align='center'>".$reg[1]."</td>";
                        echo "<td align='center'>".$reg[2]."</td>";
                        echo "<td align='center'>".$reg[6]."</td>";
                        echo "<td align='center'>".$reg[3]."</td>";
                        echo "<td align='center'>".$reg[4]."</td>";
                        echo "<td rowspan='1'>"
                            . "<a class='btn btn-primary btn-xs' href='../../reportes/reportes/reporteOC.php?id=".$reg[0]."' target='_blank'>VER PDF</a>"
                            . "<a class='btn btn-default btn-xs' href='../../reportes/exportar.php?id=".$reg[0]."' target='_blank' >VER EXCEL</a>"
                            . "<a class='btn btn-danger btn-xs' href='OcSeg_View.php?id=".$reg[0]."&prove=".$reg[2]."&fecha=".$reg[5]."&empre=".$reg[1]." ' target='_blank' >Seguimiento</a>"
                            . "</td>";             
                       
                        echo "<td><a class='btn btn-warning' href='../../Controlador/ocController.php?id_anular=".$reg["id_oc"]."'>ANULAR</a></td>";       
                    }
                        echo '</tr>';
                        echo "</tbody>";
                        echo "</table>";
        }     
    }
    
    function FiltroOc($ano,$mes,$empresa,$proveedor,$equipo)
    {
             
     $this->datos = mysql_query(" select o.fecha,o.id_oc,
        mem.nombre,
        pro.nombre,eq.Nombre_Equipo,
        o.total,o.referenciaoc
        from oc o 
        inner join mi_empresa mem
        on o.id_mi_empresa = mem.id_mi_empresa 
        inner join proveedor pro 
        on o.id_prove = pro.id_prove
        inner join equipos eq
        on eq.Id_Equipo = o.Id_Equipo 
        where   eq.Nombre_Equipo LIKE '%".$equipo."%'  and o.estado = 'SI'  and  
        mem.nombre like '%".$empresa."%' and o.estado = 'SI'  and pro.nombre like '%".$proveedor."%'  and o.estado = 'SI'  and 
        o.fecha like '%$ano-$mes%' and o.estado = 'SI'
        order by o.id_oc desc
         ");

        $num_campos = mysql_num_fields($this->datos);
        $num_datos = mysql_num_rows($this->datos);
        
        if($num_datos==0)
        {
                    
            
            echo "<h1 align='center'>No se encontraron registros con lo siguiente</h1>";
            echo "<h3 align='center'> Año: ".$ano."<h3/><br>" ;
            echo "<h3 align='center'> Mes: ".$mes."<h3/><br>" ;
            echo "<h3 align='center'>Empresa: ".$empresa."<h3/><br>" ;
            echo "<h3 align='center'>Proveedor: ".$proveedor."<h3/><br>" ;
            echo "<h3 align='center'>Equipo: ".$equipo."<h3/><br>" ; 
           
        
            
            
        }
        else 
        {
             $i=1;
            
        echo  '<h4>' .'N° de Registros: '.$num_datos.'</h4>' ;  
            
        ?>  
            <script type="text/javascript">
                var p = new Paginador(
                    document.getElementById('paginador2'),
                    document.getElementById('tblDatos2'),
                    15
                );
                p.Mostrar();
            </script>           
            <div id="cuadro" class="table-responsive">
                <div id="paginador2"></div> 
             <?php 
             
             echo '<td align="center"> <a class="btn btn-primary"  href="../../reportes/reportes/ReporteFiltrosOc.php?Ano='.$ano.'&Mes='.$mes.'&Empresa='.$empresa.'&Prov='.$proveedor.'&Equipo='.$equipo.'"  target="_blank" >Ver</a></td>';
             ?>
                
            <table  border="1" align="center" class="table table-hover" id="tblDatos2">
                <thead> 
                    <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                     <th>FECHA</th>
                    <th>OC</th>
                    <th>EMPRESA</th>
                    <th>PROVEEDOR</th>
                    <th>EQUIPO</th>
                    <th>REFERENCIA</th>
                    <th>TOTAL</th>
                    <th>REPORTE</th>
                    <th>ANULAR</th>

                    </tr>
                </thead>
               
                <tbody>
            <?php
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($this->datos)))
                {

                    echo '<tr>';
                    echo "<td align='center'>".$i; $i++ ."</td>";
                    echo "<td align='center'>".$reg[0]."</td>";
                    echo "<td align='center'>".$reg[1]."</td>";
                    echo "<td align='center'>".$reg[2]."</td>";
                    echo "<td align='center'>".$reg[3]."</td>";
                    echo "<td align='center'>".$reg[4]."</td>";
                    echo "<td align='center'>".$reg[6]."</td>";
                    echo "<td align='center'>".$reg[5]."</td>";

                    echo "<td><a class='btn btn-danger' href='../../reportes/reportes/reporteOC.php?id=".$reg[1]."' target='_blank' >VER</a></td>";            
                    echo "<td><a class='btn btn-warning' href='../../Controlador/ocController.php?id_anular=".$reg["id_oc"]."'>ANULAR</a></td>";        
                }
                    echo '</tr>';
                    echo "</tbody>";
                    echo "</table>";
        }     
    } 
    
    function buscar_oc_x_items($b)
    {
             
  $this->datos = mysql_query("select  o.fecha,o.id_oc,doc.componente,
        doc.n_parte,doc.cant,eq.Nombre_Equipo,
        mem.nombre,
        pro.nombre
from oc o 
   inner join mi_empresa mem
   	on o.id_mi_empresa = mem.id_mi_empresa 
   inner join proveedor pro 
      on o.id_prove = pro.id_prove 
   inner join equipos eq
      on eq.Id_Equipo = o.Id_Equipo 
   inner join detalle_oc doc
      on doc.id_oc = o.id_oc
      
  where doc.componente like '%".$b."%' and o.estado = 'SI' or 
      	doc.n_parte like '%".$b."%' and o.estado = 'SI' or  o.id_oc like '%".$b."%' and o.estado = 'SI' or
        eq.Nombre_Equipo like '%".$b."%' and o.estado='SI' order by o.id_oc desc");

        $num_campos = mysql_num_fields($this->datos);
        $num_datos = mysql_num_rows($this->datos);
        
        if($num_datos==0)
        {

            echo "<h1 align='center'>No se encontraron registros con el siguiente</h1>";
            echo "<h2 align='center'> Caracter: ".$b."<h2/><br>" ;

   
            
        }
        else 
        {
             $i=1;
            
        echo  '<h4>' .'N° de Registros: '.$num_datos.'</h4>' ;  
        
       
        ?>  
            <script type="text/javascript">
                var p = new Paginador(
                    document.getElementById('paginador3'),
                    document.getElementById('tblDatos3'),
                    15
                );
                p.Mostrar();
            </script>           
  
                    
            <div id="cuadro" class="table-responsive">
                 <div id="paginador3"></div>
            <table  border="1" align="center" class="table table-hover" id="tblDatos3">
                <thead> 
                    <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                     <th>FECHA</th>
                    <th>OC</th>
                    <th>COMPONENTE</th>
                    <th>NPARTE</th>
                    <th>CANT</th>
                    <th>EQUIPO</th>
                    <th>EMPRESA</th>
                    <th>PROVEEDOR</th>
                    <th>REPORTE</th>
                    <th>ANULAR</th>

                    </tr>
                </thead>
               
                <tbody>
            <?php
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($this->datos)))
                    {

                        echo '<tr>';
                        echo "<td align='center'>".$i; $i++ ."</td>";
                        echo "<td align='center'>".$reg[0]."</td>";
                        echo "<td align='center'>".$reg[1]."</td>";
                        echo "<td align='center'>".$reg[2]."</td>";
                        echo "<td align='center'>".$reg[3]."</td>";
                        echo "<td align='center'>".$reg[4]."</td>";
                        echo "<td align='center'>".$reg[5]."</td>";
                        echo "<td align='center'>".$reg[6]."</td>";
                        echo "<td align='center'>".$reg[7]."</td>";
                        echo "<td><a class='btn btn-danger' href='../../reportes/reportes/reporteOC.php?id=".$reg[1]."' target='_blank' >VER</a></td>";             
                        echo "<td><a class='btn btn-warning' href='../../Controlador/ocController.php?id_anular=".$reg["id_oc"]."'>ANULAR</a></td>";        
                    }
                        echo '</tr>';
                        echo "</tbody>";
                        echo "</table>";
        }     
    }
    
    
    
    
    
    
    
    
        function Bus_oc_x_i_Det($ano,$mes,$comp,$nparte,$equipo)
    {
             
     $this->datos = mysql_query("select o.fecha,o.id_oc,doc.componente,doc.n_parte,doc.cant,
mem.nombre,
pro.nombre,eq.Nombre_Equipo
from oc o 
inner join mi_empresa mem
on o.id_mi_empresa = mem.id_mi_empresa 
inner join proveedor pro 
on o.id_prove = pro.id_prove
inner join equipos eq
on eq.Id_Equipo = o.Id_Equipo
inner join detalle_oc doc
on doc.id_oc = o.id_oc  
where   doc.componente LIKE '%".$comp."%'  and o.estado = 'SI' and  
doc.n_parte like '%".$nparte."%' and o.estado = 'SI' and eq.Nombre_Equipo like '%".$equipo."%' and o.estado = 'SI'  and 
o.fecha like '%$ano-$mes%'  and o.estado = 'SI'
order by o.id_oc desc
         ");

        $num_campos = mysql_num_fields($this->datos);
        $num_datos = mysql_num_rows($this->datos);
        
        if($num_datos==0)
        {

            
            
            echo "<h1 align='center'>No se encontraron registros Con:</h1>";
            echo "<h2 align='center'> Año: ".$ano."<h2/><br>" ;
              echo "<h2 align='center'> Mes: ".$mes."<h2/><br>" ;
              echo "<h2 align='center'>Componente: ".$comp."<h2/><br>" ;
             echo "<h2 align='center'>N parte: ".$nparte."<h2/><br>" ;
             echo "<h2 align='center'>Equipo: ".$equipo."<h2/><br>" ;  
           
        
            
            
        }
        else 
        {
             $i=1;
            
        echo  '<h4>' .'N° de Registros: '.$num_datos.'</h4>' ;  
            
        ?>  
                         <script type="text/javascript">
                var p = new Paginador(
                    document.getElementById('paginador4'),
                    document.getElementById('tblDatos4'),
                    15
                );
                p.Mostrar();
            </script>           
  
  
                    
            <div id="cuadro" class="table-responsive">
                   <div id="paginador4"></div>
             <?php 
             
                     
             echo '<td align="center"> <a class="btn btn-primary"  href="../../reportes/reportes/Reporte_X_I_Deta.php?Ano='.$ano.'&Mes='.$mes.'&Compo='.$comp.'&Nparte='.$nparte.'&Equipo='.$equipo.'"  target="_blank" >Ver</a></td>';
             ?>
                
            <table  border="1" align="center" class="table table-hover" id="tblDatos4" >
                <thead> 
                    <tr class="centro" style="text-align: center">
                    <th>ITEM</th>
                    <th>FECHA</th>
                    <th>OC</th>
                    <th>COMPONENTE</th>
                    <th>NPARTE</th>
                    <th>CANT</th>
                    <th>EQUIPO</th>
                    <th>EMPRESA</th>
                    <th>PROVEEDOR</th>
                    <th>REPORTE</th>
                    <th>ANULAR</th>
                    </tr>
                </thead>
               
                <tbody>
            <?php
            while(($i<=$num_datos) && ($reg=mysql_fetch_array($this->datos)))
                {

                    echo '<tr>';
                    echo "<td align='center'>".$i; $i++ ."</td>";
                    echo "<td align='center'>".$reg[0]."</td>";
                    echo "<td align='center'>".$reg[1]."</td>";
                    echo "<td align='center'>".$reg[2]."</td>";
                    echo "<td align='center'>".$reg[3]."</td>";
                    echo "<td align='center'>".$reg[4]."</td>";
                    echo "<td align='center'>".$reg[5]."</td>";
                    echo "<td align='center'>".$reg[6]."</td>";
                    echo "<td align='center'>".$reg[7]."</td>";

                    echo "<td><a class='btn btn-danger' href='../../reportes/reportes/reporteOC.php?id=".$reg[1]."' target='_blank' >VER</a></td>";            
                    echo "<td><a class='btn btn-warning' href='../../Controlador/ocController.php?id_anular=".$reg["id_oc"]."'>ANULAR</a></td>";        
                }
                    echo '</tr>';
                    echo "</tbody>";
                    echo "</table>";
        }     
    } 
    
    
    function AutoCompletePro($q)
    {
        
        $this->datos=mysql_query("select * from proveedor where nombre like '%".$q."%' and estado = 'si' limit 5 ");
 
        $datos = array();
 
        while ($row =  mysql_fetch_array($this->datos))
        {
             $datos[] = $row[1];
        }
 
        echo json_encode($datos);
        
    }
    
        function AutoCompleteEquipo($q)
    {
        
        $this->datos=mysql_query("select * from equipos where nombre_equipo like '%".$q."%' and estado='si' limit 5 ");
 
        $datos = array();
 
        while ($row =  mysql_fetch_array($this->datos))
        {
             $datos[] = $row[1];
        }
 
        echo json_encode($datos);
        
    }
    
    
    
      function traer_id_prov($nom)
    {

    $this->datos = mysql_query("select * from proveedor where nombre = '".$nom."' and estado='si'");
    $reg=mysql_fetch_array($this->datos);

    echo  $reg[0];

    }
    
    function Mostrar_dato_usu($pos,$id)
{
      $this->datos = mysql_query("select * from usuario where id_usu= '".$id."'"); 
      $reg = mysql_fetch_array($this->datos);
      
      echo $reg[$pos];
}

    function Extraer_id($nom) // EXTRAE EL ID DE EQUIPO WHERE NOMBRE
{ 
      $this->datos = mysql_query("select * from equipos where nombre_equipo = '".$nom."'"); 
      $reg = mysql_fetch_array($this->datos);
      
      echo $reg[0];
}
    
   
}

?>