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
<?php
require_once('../../conexion/conexion.php');
$conex = new conex();
$conex->conectar();
//
//include("../../modelo/ocModels.php");
//$oc = new ordencompra();
//$oc->imp_oc();
$ano = $_GET['Ano'];
$mes = $_GET['Mes'];
$comp = $_GET['Compo'];
$nparte = $_GET['Npate'];
$equipo = $_GET['Equipo'];
//$id_oc = 48;
//$query = mysql_query("select * from oc where id_oc = ".$id_oc." ");

$query = mysql_query("select o.fecha,o.id_oc,doc.componente,doc.n_parte,doc.cant,
mem.nombre,
pro.nombre,eq.Nombre_Equipo,o.total,o.moneda
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
order by o.id_oc desc");

$query2 = mysql_query("select SUM(o.total)
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
order by o.id_oc desc");


//echo $reg[6];
    
    
require("../lib/mpdf/mpdf.php");

$html='    
    <main>
    <h1>REPORTES DE ORDENES DE COMPRA</h2>
        <table>
          <thead>
          <tr>
            <th class="service">FECHA</th>
            <th class="desc">OC</th>
            <th>COMPO</th>
            <th>NPARTE</th>
            <th>CANT</th>
            <th>EMPRESA</th>
            <th>PROVEEDOR</th>
            <th>EQUIPO</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>';   
                   $sim =substr($reg[9],-3); 
                while($reg = mysql_fetch_array($query))
    {
                $html.='
                  <tr>
                    
                    <td class="desc">'.$reg[0].'</td>
                    <td class="unit">'.$reg[1].'</td>
                    <td class="qty">'.$reg[2].'</td>
                    <td class="total">'.$reg[3].'</td>
                    <td class="total">'.$reg[4].'</td>
                    <td class="total">'.$reg[5].'</td>
                    <td class="total">'.$reg[6].'</td>
                    <td class="total">'.$sim.''.$reg[7].'</td>
                    <td class="total ">'.$sim.''.$reg[8].'</td>
                        
                  </tr>';
    }
    while($reg2=  mysql_fetch_array($query2))
    {
        $html.='
            
           <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="Precio total">'.$sim.''.$reg2[0].'</td>
          </tr>
         </table>

    </main>';
    }

$mpdf = new mPDF('c','A4');
$css = file_get_contents('../css/style.css');
$mpdf ->WriteHTML($css,1);
$mpdf ->WriteHTML($html);
$mpdf->Output('reporte.pdf','I')



?>


