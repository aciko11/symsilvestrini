<?php

    require "PHPExcel-1.8/Classes/PHPExcel.php";
    require "insertData.php";    

    //clearing the table
    $query = "delete from paziente";
    mysqli_query($connect, $query) or die(mysqli_error($connect));

    $file = "files/Cook database 27feb17.xlsx"; //reference to the file
    $excelReader = PHPExcel_IOFactory::createReaderForFile($file);
    $excelObj = $excelReader->load($file);
    $sheet = $excelObj->getSheet(0);

    //$lastRow = $sheet->getHighestRow();
    //$lastCol = $sheet->getHighestColumn();
    $lastColString = $sheet->getHighestDataColumn();    //returns the last column with data in string format eg. DH
    $lastColNumber = PHPExcel_Cell::columnIndexFromString($lastColString);  //converts the string into a number format

    $rowOffset = 3; //offset where the data starts

    echo($sheet->getCell('A'.$rowOffset)->getValue());
    $data = array();
    $data[0] = $sheet->getCell('A'.$rowOffset)->getValue();   //id
    $data[1] = $sheet->getCell('C'.$rowOffset)->getValue();  //nome
    $data[2] = $sheet->getCell('B'.$rowOffset)->getValue();  //cognome
    $data[3] = $sheet->getCell('E'.$rowOffset)->getValue();  //data nascita prendo il campo dataintervento per test
    $data[3] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($data[3])); //converte il 
    echo($data[3]);
    $data[4] = $sheet->getCell('BK'.$rowOffset)->getValue(); //sesso
    $data[5] = "";
    $data[6] = "";

    $temp = new insertData();
    $temp->insert($data);
    echo("done");

?>