<?php

    class Patologia{
        public $tempDataPatologia;
        public $id;

        function create($sheet, $rowOffset, $idPaziente, $patologia){

            $insert = new InsertData();
            $findMatch = new FindMatch;
          

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;  //rif idPaziente
            $this->tempDataPatologia[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idTipoPatologia";
            $idTipoPatologia = $findMatch->idTipoPatologia($patologia);
            $tempData->colValue = $idTipoPatologia;  //rif idTipoPatologia
            $this->tempDataPatologia[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "migrato";
            $tempData->colValue = 1;  //migrato
            $this->tempDataPatologia[] = $tempData;

            $insert->insert($this->tempDataPatologia, "patologia");
            $this->id = $idTipoPatologia;
            echo("lastPatologiaId = ".$this->id."<br>");

        }
    }

?>