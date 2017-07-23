<?php
$id = $_GET['id'];

if (PHP_SAPI == 'cli')
	die('Este ejemplo sólo se puede ejecutar desde un navegador Web');

/** Incluye PHPExcel */
require_once('../Classes/PHPExcel.php');

// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Obed Alvarado")
							 ->setLastModifiedBy("Obed Alvarado")
							 ->setTitle("Office 2010 XLSX Documento de prueba")
							 ->setSubject("Office 2010 XLSX Documento de prueba")
							 ->setDescription("Documento de prueba para Office 2010 XLSX, generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo con resultado de prueba");

// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:D1');
 
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'REPORTE OC '.$id)
            ->setCellValue('A2', '')
            ->setCellValue('A3', 'ITEM')
            ->setCellValue('B3', 'COMPONENTE')
            ->setCellValue('C3', 'NPARTE')
	    	->setCellValue('D3', 'CANT')
	    	->setCellValue('E3', 'PRECIO')
	    	->setCellValue('F3', 'TOTAL');
	 
			
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
 
$objPHPExcel->getActiveSheet()->getStyle('A1:F2')->applyFromArray($boldArray);

//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);	
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);	
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);	
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(8);	
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(8);		


/*Extraer datos de MYSQL*/
	# conectare la base de datos
require_once('../conexion/conexion.php');
$conex = new conex();
$conex->conectar();
        
 	$sql="select * from detalle_oc where id_oc =".$id.".";
	$query=mysql_query($sql);
	$cel=4;//Numero de fila donde empezara a crear  el reporte
	while ($row=mysql_fetch_array($query))
        {
            
		$Id_oc=$row[0];
		$compo=$row[1];
		$nparte=$row[2];
		$cant=$row[3];
		$prec =$row[4];
		$tot =$row[5];
		
		
			$a="A".$cel;
			$b="B".$cel;
			$c="C".$cel;
			$d="D".$cel;
			$e="E".$cel;
			$f="F".$cel;
			
			// Agregar datos
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($a, $Id_oc)
            ->setCellValue($b, $compo)
            ->setCellValue($c, $nparte)
            ->setCellValue($d, $cant)
            ->setCellValue($e, $prec)
            ->setCellValue($f, $tot);
			
			
	$cel+=1;
	}
 
/*Fin extracion de datos MYSQL*/
        
$rango="A3:$d";
$styleArray = array('font' => array( 'name' => 'Calibri', 'size' => 12),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);

/*******************************///

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('OC '.$id);

// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte OC '.$id);
 
 
// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);

/***************//// Finalmente agregamos el código para que el usuario pueda descargar el archivo excel

// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');
 
// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

/**************** */

