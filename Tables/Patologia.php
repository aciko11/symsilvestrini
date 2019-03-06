<?php

    class Patologia{
        public $tempDataPatologia;
        public $id;

        function create($sheet, $rowOffset, $idPaziente){

            $insert = new InsertData();
            $findMatch = new FindMatch;
          

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;  //rif idPaziente
            $this->tempDataPatologia[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idTipoPatologia";
            $idTipoPatologia = $findMatch->idTipoPatologia("OBESITA'");
            $tempData->colValue = $idTipoPatologia;  //rif idTipoPatologia
            $this->tempDataPatologia[] = $tempData;

        }
    }

?>