<?php

    class Complicanza{
        public $tempDataComplicanza = array();
        public $id;

        function create($sheet, $rowOffset, $descComplicanza, $idIntervento, $dataInizio, $intraOp, $protesiRelata){
            $insert = new InsertData;
            $findMatch = new FindMatch;

            $tempData = new Column;                       
            $tempData->colName = "idTipoComplicanza";
            $idComplicanza = $findMatch->idTipoComplicanza($descComplicanza);
            $tempData->colValue = $idComplicanza;
            $this->tempDataComplicanza[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idIntervento";
            $tempData->colValue = $idIntervento;
            $this->tempDataComplicanza[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "intraOperatoria";
            if($intraOp){
                $tempData->colValue = 1;
            }
            else{
                $tempData->colValue = 0;
            }                              
            $this->tempDataComplicanza[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "protesiRelata";
            if($protesiRelata){
                $tempData->colValue = 1;
            }
            else{
                $tempData->colValue = 0;
            }
            $this->tempDataComplicanza[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "dataInizio";
            $tempData->colValue = $dataInizio;
            $this->tempDataComplicanza[] = $tempData;

            $this->id = $insert->insert($this->tempDataComplicanza, "complicanza");
            echo("<br>".$this->id."<br>");
        }

    }


?>