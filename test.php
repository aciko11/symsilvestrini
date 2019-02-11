<?php
    
    #region Import

    //PHPExcel class
    require 'PHPExcel-1.8/Classes/PHPExcel.php';
    //connection class
    require 'connection.php';
    //insert query class 
    require 'insertData.php';
    //column structure class
    require 'Classes/column.php';
    
    require 'Tables/Paziente.php';
    require 'Tables/tipo_.php';
    require 'Tables/Ricovero.php';
    require 'Tables/Intervento.php';

    require 'Scripts/FindMatch.php';

    #endregion

    #region Clearing Tables

    //if imported all the tables will be cleared 
    //require 'clearAllTables.php';

    $query = "delete from ricovero";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from intervento";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from paziente";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from tipo_complicanza";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    #endregion
    

    //reference to the file
    $file = "files/test.xlsx"; 

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
    $rowsNumber = $sheet->getHighestDataRow();
    //it's the offset for the first line of data in the file
    $rowOffset = 1;

    echo($sheet->getCell('A'.$rowOffset)->getValue());
    $data = array();
    
    /*
    $data[0] = $sheet->getCell('C'.$rowOffset)->getValue(); //nome
    $data[1] = $sheet->getCell('B'.$rowOffset)->getValue(); //cognome 
    $data[2] = $sheet->getCell('D'.$rowOffset)->getValue(); //dataNascita
    //$data[2] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($data[2])); //converte il 
    echo($data[2]);
    $data[3] = $sheet->getCell('BK'.$rowOffset)->getValue();    //sesso  
    $data[4] = $sheet->getCell('CF'.$rowOffset)->getValue(); //altrePatologie
    $data[5] = $sheet->getCell('A'.$rowOffset)->getValue(); //codiceDbCook
    $data[6] = 1;   //migratoDbCook */

    /*
    $tempData = array();
    $tempData[0] = new Column();
    $tempData[0]->colName = "nome";
    $tempData[0]->colValue = "abc";
    $temp = new insertData();
    $temp->insert($tempData, "paziente");
    */

    $currentRow = array(array("idPaziente"=>"aaa"));
    //echo($currentRow[0]['idPaziente']);

    //Paziente.php only does 1 line of the database to do the others simply do a for cycle
    $paziente = new Paziente();
    $paziente->createData($sheet, $rowOffset, 0);

    $ricovero = new Ricovero();
    $ricovero->createData($sheet, $rowOffset, $paziente->id, 0);

    $intervento = new Intervento();
    $intervento->createData($sheet, $rowOffset, $paziente->id, $ricovero->id, 0);

    if($sheet->getCell('F'.$rowOffset)->getValue() == 1){
        $ricovero2 = new Ricovero;
        $ricovero2->createData($sheet, $rowOffset, $paziente->id, 1);

        $intervento2 = new Intervento;
        $intervento2->createData($sheet, $rowOffset, $paziente->id, $ricovero2->id, 1);
    }

    echo($paziente->tempDataPaziente[7]->colName);
    $size = sizeof($paziente->tempDataPaziente);
    echo("array size = ".$size);
    for ($i = 0; $i < $size; $i++){
        if($paziente->tempDataPaziente[$i]->colName == "codiceDbCook"){
            echo("dbCookValue".$paziente->tempDataPaziente[$i]->colValue."<br>");
        }
    }

    $tipo = new Tipo;
    $tipo->tipo_complicanza($sheet, $rowOffset);

    //ricontrollare email SALTA TUTTO GUARDA APPUNTI
    //columns J-K-L -> leakTipo#Intraop
    if($sheet->getCell("J".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleakTipo1";
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->createData($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, true);
    }
    if($sheet->getCell("K".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleakTipo2";
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->createData($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, true);
    }
    if($sheet->getCell("L".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleakTipo3";
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->createData($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, true);
    }


    //columns V-W-X -> LeakTipo#
    if($sheet->getCell("V".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleakTipo1";
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->createData($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false);
    }
    if($sheet->getCell("W".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleakTipo3";
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->createData($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false);
    }
    if($sheet->getCell("X".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleakTipo2";
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->createData($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false);
    }

    mysqli_close($connect) or die(mysqli_error($connect));
    echo("done");
    
?>