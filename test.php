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
    require 'Tables/Complicanza.php';
    require 'Tables/Accertamento.php';
    require 'Tables/Decesso.php';

    require 'Scripts/FindMatch.php';

    #endregion

    #region Clearing Tables

    //if imported all the tables will be cleared 
    //require 'clearAllTables.php';

    //$query = "delete from intervento";
    //mysqli_query($connect, $query) or die(mysqli_error($connect));
    //$query = "delete from ricovero";
    //mysqli_query($connect, $query) or die(mysqli_error($connect));
    //$query = "delete from paziente";
    //mysqli_query($connect, $query) or die(mysqli_error($connect));
    //$query = "delete from tipo_complicanza";
    //mysqli_query($connect, $query) or die(mysqli_error($connect));
    #endregion
    

    //reference to the file
    $file = "files/Cook database 27feb17.xlsx"; 
    //$file = "files/test.xlsx";

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

    //this has to stay out of the for
    $tipo_decesso = new Tipo;
    $tipo_decesso->tipo_decesso($sheet, $rowOffset);

    for($rowOffset = 3; $rowOffset<=$rowsNumber; $rowOffset++){
    //Paziente.php only does 1 line of the database to do the others simply do a for cycle
    $paziente = new Paziente();
    $paziente->createData($sheet, $rowOffset, 0);

    $ricovero = new Ricovero();
    $ricovero->create($sheet, $rowOffset, $paziente->id, 1);

    $intervento = new Intervento();
    $intervento->create($sheet, $rowOffset, $paziente->id, $ricovero->id, 1);

    if($sheet->getCell('F'.$rowOffset)->getValue() == 1){
        $ricovero2 = new Ricovero;
        $ricovero2->create($sheet, $rowOffset, $paziente->id, 2);

        $intervento2 = new Intervento;
        $intervento2->create($sheet, $rowOffset, $paziente->id, $ricovero2->id, 2);
    }

    echo($paziente->tempDataPaziente[7]->colName);
    $size = sizeof($paziente->tempDataPaziente);
    echo("array size = ".$size);
    for ($i = 0; $i < $size; $i++){
        if($paziente->tempDataPaziente[$i]->colName == "codiceDbCook"){
            echo("dbCookValue".$paziente->tempDataPaziente[$i]->colValue."<br>");
        }
    }

    //$tipo = new Tipo;
    //$tipo->tipo_complicanza($sheet, $rowOffset);
    //gli endoleak già ci sono

    //columns J-K-L -> leakTipo#Intraop
    if($sheet->getCell("J".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleak di tipo Ia";   //da cambiare in futuro
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, true, true);
    }
    if($sheet->getCell("K".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleak di tipo II"; 
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, true, true);
    }
    if($sheet->getCell("L".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleak di tipo III"; 
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, true, true);
    }
    if($sheet->getCell("P".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "Migrazione graft"; 
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false, true);
    }
    if($sheet->getCell("Q".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "Occlusione di branca iliaca"; 
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false, false);
    }
    if($sheet->getCell("R".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "sanguinamento"; 
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue;
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false, false);
    }


    //columns V-W-X -> LeakTipo#
    $dataComplicanza = "";

    //setting the date for each case
    if($sheet->getCell("FT".$rowOffset)->getValue() == 1){
        $dataComplicanza = $intervento->tempDataIntervento[0]->colValue + 29;
    }
    elseif($temp = $sheet->getCell("Z".$rowOffset)->getValue() != "#NULL!"){
        $dataComplicanza = $temp;
    }
    else{
        $dataComplicanza = $sheet->getCell("Y".$rowOffset)->getValue();
    }

    //columns V-W-X -> endoleakTipo#
    if($sheet->getCell("V".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleak di tipo Ia";
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false, true);
    }
    if($sheet->getCell("W".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleak di tipo II";
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false, true);
    }
    if($sheet->getCell("X".$rowOffset)->getValue() == 1){
        $complicanza = new Complicanza;
        $descComplicanza = "endoleak di tipo III";
        $complicanza->create($sheet, $rowOffset, $descComplicanza, $intervento->id, $dataComplicanza, false, true);
    }

    //accertamento
    $accertamento = new Accertamento;
    $accertamento->create($sheet, $rowOffset, $paziente->id);

    //decesso
    $deathColumns = array("AF", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP");
    foreach($deathColumns as $column){
        $cell = $sheet->getCell($column.$rowOffset)->getValue();
        if($cell == 1){
            $decesso = new Decesso;
            $decesso->create($sheet, $rowOffset, $paziente->id, $column);
        }
    }

    //reintervento2
    $check = $sheet->getCell('AU'.$rowOffset)->getValue();
    if($check == 1){
        $ricovero3 = new Ricovero;
        $ricovero3->create($sheet, $rowOffset, $paziente->id, 3);

        $intervento3 = new Intervento;
        $intervento3->create($sheet, $rowOffset, $paziente->id, $ricovero3->id, 3);
    }

    //complicanza obesità
    /*$check = $sheet->getCell('CJ'.$rowOffset)->getValue();
    if($chek == 1){
        $patologia = new Patologia;
        $patologia->create();
    }*/

    }
    mysqli_close($connect) or die(mysqli_error($connect));
    echo("done");
    
?>