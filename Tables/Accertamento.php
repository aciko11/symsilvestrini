<?php

    class Accertamento{

        public $tempDataAccertamento = array();
        public $id;

        function create($sheet, $rowOffset, $idPaziente){
            global $lineSeparator;
            $insert = new insertData;
            $findMatch = new FindMatch;

            $tempData = new Column;
            $tempData->colName = "idTipoAccertamento";
            $accertamento = $sheet->getCell('AA'.$rowOffset)->getValue();
            $tempData->colValue = $findMatch->idAccertamento($accertamento);
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "data";
            $dateAccertamento = $sheet->getCell("Y".$rowOffset)->getValue();
            $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dateAccertamento));
            $this->tempDataAccertamento[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataAccertamento, "accertamento");
            echo($this->id."<br>".$lineSeparator);
        }

        function createTacIntervento($sheet, $rowOffset, $idPaziente, $dataIntervento){
            global $lineSeparator;
            $insert = new insertData;
            $findMatch = new FindMatch;

            $tempData = new Column;
            $tempData->colName = "idTipoAccertamento";
            $tempData->colValue = $findMatch->idAccertamento("Tac");
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "data";
            $tempData->colValue = $dataIntervento;
            $this->tempDataAccertamento[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataAccertamento, "accertamento");
            echo($this->id."<br>".$lineSeparator);
        }

    }

?>