<?php

    require "PHPExcel-1.8/Classes/PHPExcel.php";
    require "insertData.php";    

    $file = "files/Cook database 27feb17.xlsx"; //reference to the file
    $excelReader = PHPExcel_IOFactory::createReaderForFile($file);
    $excelObj = $excelReader->load($file);
    $sheet = $excelObj->getSheet(0);

    //$lastRow = $sheet->getHighestRow();
    $lastCol = $sheet->getHighestColumn();
    $rowDimension = $sheet->getRowDimension(1);

    $rowIndex = 3;
    echo($sheet->getCell('A'.$rowIndex)->getValue());
    $data = array();
    $data[0] = $sheet->getCell('A'.$rowIndex)->getValue();   //id
    $data[1] = $sheet->getCell('C'.$rowIndex)->getValue();  //nome
    $data[2] = $sheet->getCell('B'.$rowIndex)->getValue();  //cognome
    $data[3] = $sheet->getCell('E'.$rowIndex)->getValue();  //data nascita prendo il campo dataintervento per test
    $data[3] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($data[3])); //converte il 
    echo($data[3]);
    $data[4] = $sheet->getCell('BK'.$rowIndex)->getValue(); //sesso
    $data[5] = "";
    $data[6] = "";
    
    for($i = 0; $i < $lastCol; $i++){

    }
    echo("ok");


    $temp = new insertData();
    $temp->insert($data);
    echo("done");

?>