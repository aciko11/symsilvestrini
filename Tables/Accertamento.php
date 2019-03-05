<?php

    class Accertamento{
        
        public $tempDataAccertamento = array();
        public $id;

        function create($sheet, $rowOffset, $idPaziente){
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
            $tempData->colValue = $sheet->getCell("Y".$rowOffset)->getValue();
            $this->tempDataAccertamento[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataAccertamento, "accertamento");
            echo("<br>".$this->id."<br>");
        }

    }

?>