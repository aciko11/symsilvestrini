<?php

    class Intervento{

        public $tempDataIntervento = array();
        public $id = null;

        function createData($sheet, $rowOffset, $idPaziente, $idRicovero, $num){
            $insert = new InsertData();
            

            $tempData = new Column;
            $tempData->colName = "data";
            if($num == 0){
                $tempData->colValue = $sheet->getCell('E'.$rowOffset)->getValue();    //data intervento
                $tempData->colValue = date("d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
                echo("test1".$tempData->colValue);
            }
            else{
                $tempData->colValue = $sheet->getCell('G'.$rowOffset)->getValue();    //data intervento
                $tempData->colValue = date("d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
            }           
            $this->tempDataIntervento[] = $tempData;


            $tempData = new Column();
            $tempData->colName = "idChirurgo";
            if($num == 0){
                $findMatch = new FindMatch;
                $tempMedico = $sheet->getCell('EC'.$rowOffset)->getValue();
                $tempData->colValue = $findMatch->idMedico($tempMedico);//trovare id corrispondente al medico nella colonna EC    //idChirurgo
            }
            else{
                $tempData->colValue = null;
            }            
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column();
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;  //riferimento id del paziente  
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column();
            $tempData->colName = "idTipoIntervento";
            if($num == 0){
                $tempData->colValue = 0;    //idTipoIntervento //da ricontrollare nel senso gli id dei tipi di intervento li devo fare io?
            }
            else{
                $tempData->colValue = 0;    //idTipoIntervento //da aggiornare
            }          
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "codiceICD9";
            $tempData->colValue = 0;    //codice icd9   //da ricontrollare anche questo come idTipoIntervento (anche per reintervento)
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "causa1";
            $tempData->colValue = 0;    //causa intervento (sempre 0?) (per reintervento?)
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "causa2";
            $tempData->colValue = "";    //**
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "causa3";
            $tempData->colValue = "";    //**
            $this->tempDataIntervento[] = $tempData;

            /*$tempData = new Column();
            $tempData->colName = "esito";   //deve essere ribattezzato in successoTecnico colonna FP    //per reintervento da vedere
            $tempData->colValue = $sheet->getCell('GJ'.$i+$rowOffset)->getValue();   //esito
            $j++;*/

            $tempData = new Column;
            $tempData->colName = "noteEsito";
            if($num == 0){
                $tempData->colValue = $sheet->getCell('GK'.$rowOffset)->getValue();
            }
            else{
                $tempData->colValue = "";
            }    
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idRicovero";
            $tempData->colValue = $idRicovero;    //rif tabella ricovero 
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "urgenza";
            $tempData->colValue = "migrato-ND";   //urgenza
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "migrato";
            $tempData->colValue = 1;   //migrato
            $this->tempDataIntervento[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataIntervento, "Intervento");
            echo("<br>lastRicoveroId = ".$id);
        }
    }

?>