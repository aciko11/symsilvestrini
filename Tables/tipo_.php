<?php

    class Tipo{

        public $tempDataTipo = array();

        function createData($sheet, $rowsNumber, $rowOffset){

            $tempData = array();
            $insert = new InsertData();

            $columns = array("J", "K", "L", "M", "N", "O", "P", "Q", "R", "T", "U", "V", "W", "X", 
            "AP", "GO", "GP", "GT", "IB");

            $rowOffset = 1;
            //tipo_complicanza
            $lenght = sizeof($letters);
            for($i = 0; $i < $lenght; $i++){
                $tempData[$i] = new Column;
                $tempData[$i]->colName = "descrizione";
                $tempData[$i]->colValue = $sheet->getCell($letters[$i].$rowOffset)->getValue();
            }
            $insert->insert($tempData, "tipo_complicanza");

        }
        
        function tipo_complicanza($sheet, $rowOffset){
            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo1";
            $this->tempDataTipo[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo2";
            $this->tempDataTipo[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo3";
            $this->tempDataTipo[] = $tempData;

            $insert->insert($tthis->tempDataTipo, "tipo_complicanza");
        }
    }

?>