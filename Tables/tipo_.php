<?php

    class Tipo{

        public $tempDataTipo = array();

        
        function tipo_complicanza($sheet, $rowOffset){
            $insert = new InsertData;
            
            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo1";
            $this->tempDataTipo = $tempData;
            $insert->insert($this->tempDataTipo, "tipo_complicanza");

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo2";
            $this->tempDataTipo = $tempData;
            $insert->insert($this->tempDataTipo, "tipo_complicanza");

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo3";
            $this->tempDataTipo = $tempData;
            
            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Migrazione graft";
            $this->tempDataTipo = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Occlusione di branca iliaca";
            $this->tempDataTipo = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Sanguinamento";
            $this->tempDataTipo = $tempData;


            $insert->insert($this->tempDataTipo, "tipo_complicanza");
        }

        function tipo_decesso($sheet, $rowOffset){ //chiedere se se questi nominativi vanno bene
            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Aortic"; //441

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Cardiac";    //410

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Cerebrovasc";    //436

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Pulmonary";  //482.9 se trovo polmonite 491.21 altrimenti

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Gastrointestinal";   //capitolo 9 

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Renal";  //585

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Cancer"; //capitolo2 

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Other";

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "AAArupture"; //441.3
        }
    }

?>