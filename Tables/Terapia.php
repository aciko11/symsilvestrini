<?php

    class Terapia{
        public $tempDataTerapia = array();
        public $idPaziente = null;
        public $idAtc = null;

        function create($sheet, $rowOffset, $idPaziente, $descAtc, $idIntervento, $dataIntervento){
            $insert = new InsertData();
            $findMatch = new FindMatch;

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;
            $this->tempDataTerapia[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idAtc";
            $idAtc = $findMatch->idAtc($descAtc);
            $tempData->colValue = $idAtc;
            $this->tempDataTerapia[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "annoInizio";
            $date = DateTime::createFromFormat("Y-m-d", $dataIntervento);
            $tempData->colValue = $date->format("Y");
            $this->tempDataTerapia[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idIntervento";
            $tempData->colValue = $idIntervento;
            $this->tempDataTerapia[] = $tempData;

            $this->idAtc = $idAtc;
            $this->idPaziente = $idPaziente;

            $insert->insert($this->tempDataTerapia, "Terapia");
            echo("lastTerapia idPaziente = ".$this->idPaziente.", idAtc = ".$this->idAtc."<br>");

        }
    }



?>