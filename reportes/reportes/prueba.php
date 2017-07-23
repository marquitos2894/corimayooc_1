<?php
require_once('../../conexion/conexion.php');
$conex = new conex();
$conex->conectar();
//
//include("../../modelo/ocModels.php");
//$oc = new ordencompra();
//$oc->imp_oc();
//$id_oc = $_GET['id'];
$id_oc = 46;
//$query = mysql_query("select * from oc where id_oc = ".$id_oc." ");

//$query = mysql_query("select o.id_oc,
//o.fecha,
//mem.nombre,mem.direccion,mem.ruc,
//pro.nombre,pro.direccion,pro.ruc,
//emp.nombre, 
//o.formapago, o.lugarEntrega,o.cotizacion,o.referenciaoc,o.Equipo,
//o.subtotal,o.igv,o.total
//from oc o 
//inner join detalle_oc doc 
//on o.id_oc = doc.id_oc
//inner join mi_empresa mem
//on o.id_mi_empresa = mem.id_mi_empresa 
//inner join proveedor pro 
//on o.id_prove = pro.id_prove 
//inner join empleado emp
//on emp.id_empleado = o.id_empleado
//where o.id_oc = ".$id_oc." ");

$query2 = mysql_query("select * from detalle_oc where id_oc = 48 ");

//while($reg=  mysql_fetch_array($query)){

             
//echo $reg[6];


require("../lib/mpdf/mpdf.php");

$html='    <header class="clearfix">
                      
      <table>
        <thead>
          <tr>
            <th class="service">ITEM</th>
            <th class="desc">COMPONENTE</th>
            <th>NPARTE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>'; while($reg2=mysql_fetch_array($query2))
                {
                $html.='
                  <tr>
                    <td class="service">Design</td>
                    <td class="desc">'.$reg2[0].'</td>
                    <td class="unit">'.$reg2[1].'</td>
                    <td class="qty">'.$reg2[2].'</td>
                    <td class="total">'.$reg2[3].'</td>
                  </tr>';
                }
        $html.=' 
         
       </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>';
   

//}
$mpdf = new mPDF('c','A4');
$css = file_get_contents('../css/style.css');
$mpdf ->WriteHTML($css,1);
$mpdf ->WriteHTML($html);
$mpdf->Output('reporteoc.pdf','I')



?>
