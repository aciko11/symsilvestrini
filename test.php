<?php
 
    //PHPExcel class
    require "PHPExcel-1.8/Classes/PHPExcel.php";
    
    require "insertData.php"; 
 
    //clearing the table
    $query = "delete from paziente";
    mysqli_query($connect, $query) or die(mysqli_error($connect));

    //reference to the file
    $file = "files/Cook database 27feb17.xlsx"; 

    //creating a reader for the file
    $excelReader = PHPExcel_IOFactory::createReaderForFile($file); 

    //creating an excel object
    $excelObj = $excelReader->load($file); 

    //getting the sheet we want. getSheet(index) returns the sheet with the specified index
    $sheet = $excelObj->getSheet(0);

    //$lastRow = $sheet->getHighestRow();   
    //$lastCol = $sheet->getHighestColumn();
    $lastColString = $sheet->getHighestDataColumn();    //returns the last column with data in string format eg. DH
    $lastColNumber = PHPExcel_Cell::columnIndexFromString($lastColString);  //converts the string into a number format

    //it's the offset for the first line of data in the file
    $rowOffset = 3;

    echo($sheet->getCell('A'.$rowOffset)->getValue());
    $data = array();
    //getCell(coordinate) returns an object of the desidered cell
    //getValue() returns the value of the cell
    $data[0] = $sheet->getCell('A'.$rowOffset)->getValue();   //id
    $data[1] = $sheet->getCell('C'.$rowOffset)->getValue();  //nome
    $data[2] = $sheet->getCell('B'.$rowOffset)->getValue();  //cognome
    $data[3] = $sheet->getCell('E'.$rowOffset)->getValue();  //data nascita (prendo il campo dataintervento per test)

    //in case of a date getValue() returns a numeric value that needs to be converted in the right format
    //for the database. With $format we decide the format of the date, in this case year-month-day
    $data[3] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($data[3])); 
    echo($data[3]);
    $data[4] = $sheet->getCell('BK'.$rowOffset)->getValue(); //sesso
    $data[5] = "";
    $data[6] = "";

    //creating a insertData object and calling the method to insert the data into the database
    $temp = new insertData();
    $temp->insert($data);
    echo("done");
    
?>