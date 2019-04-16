<?php

    class Controllo_telefonico{
        public $tempDataAccertamento = array();
        public $id;

        function create($sheet, $rowOffset, $idAccertamento, $inVita){
            global $lineSeparator;
            $insert = new insertData;

            $tempData = new Column;
            $tempData->colName = "id";
            $tempData->colValue = $idAccertamento;
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "inVita";
            $tempData->colValue = $inVita;
            $this->tempDataAccertamento[] = $tempData;

            $this->id = $idAccertamento;
            $insert->insert($this->tempDataAccertamento, "controllo_telefonico");
            echo($this->id."<br>".$lineSeparator);
        }
    }


?>