<?php

    class Complicanza{
        public $tempDataComplicanza;

        function createData($sheet, $rowOffset, $descComplicanza, $idIntervento, $dataInizio, $intraOp){
            $insert = new InsertData;
            $findMatch = new FindMatch;

            $tempData = new Column;
                       
            $tempData->colName = "idTipoComplicanza";
            $idComplicanza = $findMatch->idTipoPatologia($descComplicanza);
            $tempData->colValue = $idComplicanza;
            $this->tempDataComplicanza[] = $tempData;

            $tempData->colName = "idIntervento";
            $tempData->colValue = $idIntervento;
            $this->tempDataComplicanza[] = $tempData;

            $tempData->colName = "intraOperatoria";
            if($intraOp){
                $tempData->colValue = 1;
            }
            else{
                $tempData->colValue = 0;
            }                      
            $this->tempDataComplicanza[] = $tempData;

            $tempData->colName = "protesiRelata";
            $tempData->colValue = 1;
            $this->tempDataComplicanza[] = $tempData;

            $tempData->colName = "dataInizio";
            $tempData->colValue = $dataInizio;
            $this->tempDataComplicanza[] = $tempData;
        }

    }


?>