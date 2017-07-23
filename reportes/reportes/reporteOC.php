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
$id_oc = $_GET['id'];
//$id_oc = 48;
//$query = mysql_query("select * from oc where id_oc = ".$id_oc." ");

$query = mysql_query("select o.id_oc,
o.fecha,
mem.nombre,mem.direccion,mem.ruc,
pro.nombre,pro.direccion,pro.ruc,
emp.nombre, 
o.formapago, o.lugarEntrega,o.cotizacion,o.referenciaoc,eq.Nombre_Equipo,
o.subtotal,o.igv,o.total,o.moneda,o.id_usu,usu.nombre
from oc o 
inner join mi_empresa mem
on o.id_mi_empresa = mem.id_mi_empresa
inner join usuario usu
on o.id_usu = usu.id_usu
inner join proveedor pro 
on o.id_prove = pro.id_prove 
inner join empleado emp
on emp.id_empleado = o.id_empleado
inner join equipos eq
on eq.Id_Equipo = o.Id_Equipo
where o.id_oc = ".$id_oc." ");

$query2 = mysql_query("select * from detalle_oc where id_oc =".$id_oc." ");

$query3 = mysql_query(" select round(SUM(doc.total_compo),2), round(SUM(doc.total_compo) * 0.18,2) as igv, 
round(SUM(doc.total_compo) + SUM(doc.total_compo) * 0.18,2) as total
FROM detalle_oc doc where id_oc=".$id_oc." ");
$i=1;
$num_datos = mysql_num_rows($query2);
while($reg= mysql_fetch_array($query)){

//echo $reg[6];
    


require("../lib/mpdf/mpdf.php");

$html='   
    <header>
      <div id="logo">
        <img src="../img/'.$reg[4].'.jpg ">
      </div>
     
      
      <h1>Orden de Compra - 0'.$id_oc.'</h1>
      <div id="company" class="clearfix">
        <div>'.$reg[2].'</div>
        <div>'.$reg[3].'</div>
        <div>'.$reg[4].'</div>
      </div>
      <div id="project">
        <div><span>FECHA: </span>'.$reg[1].'</div><br>
        <div><span>PROVEEDOR: </span>'.$reg[5].'</div>
        <div><span>DIRECCION: </span>'.$reg[6].'</div>
        <div><span>RUC: </span>'.$reg[7].'</div><br>
        <div><span>ATENCION A : </span>'.$reg[8].'</div><br>
            
        <div><span>FORMA DE PAGO: </span>'.$reg[9].' </div>
        <div><span>LUGAR DE ENTREGA: </span> '.$reg[10].'</div>
        <div><span>COTIZACION: </span> '.$reg[11].'</div>
        <div><span>REFERENCIA: </span> <title>'.$reg[12].'</title></div>     
        <div><span>EQUIPO: </span> '.$reg[13].'</div>        
      </div>
    </header>
    <main>
        <table border="1">
          <thead>
          <tr>
            <th class="service">ITEM</th>
            <th class="desc">COMPONENTE</th>
            <th>NPARTE</th>
            <th>QTY</th>
            <th>PRECIO</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>';   
                    $sim =substr($reg[17],-4); 

                    while( ($i<=$num_datos) && ($reg2=mysql_fetch_array($query2)))
                {
                $html.='
                  <tr>
                    <td class="service">'.$i++.'</td>
                    <td class="desc">'.$reg2[1].'</td>
                    <td class="unit">'.$reg2[2].'</td>
                    <td class="qty">'.$reg2[3].'</td>
                    <td class="total">'.$sim.' '.$reg2[4].'</td>
                    <td class="total">'.$sim.' '.$reg2[5].'</td>
                  </tr>';
                }
        $html.=' 
           </table>
             <table>';

                  while($reg3= mysql_fetch_array($query3))
                  {

             $html.='
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">'.$sim.' '.$reg3[0].'</td>
          </tr>
          <tr>
            <td colspan="4">IGV 18%</td>
            <td class="total">'.$sim.' '.$reg3[1].'</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="Precio total">'.$sim.' '.$reg3[2].'</td>
          </tr>
        </tbody>
         </table>';
                  }
         $html.='         
        <div id="notices">
         <div class="notice"> Cesar Garcia Chacaltana  </div>
      </div>

    </main>';
}

$mpdf = new mPDF('utf-8', array(190,370));
$css = file_get_contents('../css/style.css');
$mpdf ->WriteHTML($css,1);
$mpdf ->WriteHTML($html);
$mpdf->Output('0'.$id_oc.' Orden de Compra.pdf','I')

  




?>
