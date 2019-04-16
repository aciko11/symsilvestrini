<?php

    class Rx{
        public $tempDataAccertamento = array();
        public $id;

        function create($sheet, $rowOffset, $idAccertamento){
            global $lineSeparator;
            $insert = new insertData;

            $tempData = new Column;
            $tempData->colName = "id";
            $tempData->colValue = $idAccertamento;
            $this->tempDataAccertamento[] = $tempData;

            $this->id = $idAccertamento;
            $insert->insert($this->tempDataAccertamento, "rx");
            echo($this->id."<br>".$lineSeparator);
        }
    }


?>