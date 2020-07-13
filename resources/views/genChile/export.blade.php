<?php
    require_once 'Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
        
    $objPHPExcel->getProperties()->setCreator("Nikken México")
                            ->setLastModifiedBy("Nikken México")
                            ->setTitle("GENEALOGIA CHILE")
                            ->setSubject("GENEALOGIA CHILE")
                            ->setDescription("Reporte genealogia chile")
                            ->setKeywords("office 2010 openxml php")
                            ->setCategory("NIKKEN");

    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:G1');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A5:G5');

    foreach($sponsor as $nombre) {
        $patrocinador = $nombre->nombre;
    }

    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Fecha de consulta: ' . Date('Y/m/d'))
                ->setCellValue('A5', $patrocinador)
                ->setCellValue('A6', 'ID ASOCIADO')
                ->setCellValue('B6', 'NIVEL')
                ->setCellValue('C6', 'NOMBRE ASOCIADO')
                ->setCellValue('D6', 'PAÍS')
                ->setCellValue('E6', 'CORREO')
                ->setCellValue('F6', 'TELÉFONO')
                ->setCellValue('G6', 'FECHA DE REGISTRO');
                
    //Ancho de las columnas
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);	
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);	
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);	
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);	
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

    $objPHPExcel->getActiveSheet()->getStyle('A5')->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()->setRGB('3CB371');

    $styleArray = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => 'ffffff'),
        'size'  => 20,
        'name'  => 'Verdana',
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ));

    $objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($styleArray);

    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

    $objPHPExcel->getActiveSheet()->getStyle("A5")->applyFromArray($style);

    $styledate = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
        )
    );

    $objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styledate);

    $gdImage = imagecreatefrompng('http://chile.nikkenlatam.com/regchileasset/img/logotiponikken.png');

    $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
    $objDrawing->setName('Sample image');$objDrawing->setDescription('Sample image');
    $objDrawing->setImageResource($gdImage);
    $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
    $objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
    $objDrawing->setHeight(58);
    $objDrawing->setCoordinates('A2');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    
    $cel=7;
    foreach($response as $row) {
        $associateid = $row->associateid;
        $Nivel = $row->Nivel;
        $ApFirstName = $row->ApFirstName;
        $Pais = $row->Pais;
        $E_Mail = $row->E_Mail;
        $Phone1 = $row->Phone1;
        $SignupDate = $row->SignupDate;

        $a = "A".$cel;
        $b = "B".$cel;
        $c = "C".$cel;
        $d = "D".$cel;
        $e = "E".$cel;
        $f = "F".$cel;
        $g = "G".$cel;

        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue($a, $associateid)
        ->setCellValue($b, $Nivel)
        ->setCellValue($c, $ApFirstName)
        ->setCellValue($d, $Pais)
        ->setCellValue($e, $E_Mail)
        ->setCellValue($f, $Phone1)
        ->setCellValue($g, $SignupDate);
            
        $cel+=1;
    }

    /*Fin extracion de datos MYSQL*/
    $rango="A2:$e";
    $styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
    'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
    );
    
    // Cambiar el nombre de hoja de cálculo
    $objPHPExcel->getActiveSheet()->setTitle('Reporte SER PRO');

    // Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
    $objPHPExcel->setActiveSheetIndex(0);

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
?>