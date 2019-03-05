<?php

    class Intervento{

        public $tempDataIntervento = array();
        public $id = null;

        function createData($sheet, $rowOffset, $idPaziente, $idRicovero, $num){
            $insert = new InsertData();
            $findMatch = new FindMatch;
            

            $tempData = new Column;
            $tempData->colName = "data";
            if($num == 0){
                $tempData->colValue = $sheet->getCell('E'.$rowOffset)->getValue();    //data intervento
                $tempData->colValue = date("d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
                echo("test1".$tempData->colValue);
            }
            else{
                $tempData->colValue = $sheet->getCell('G'.$rowOffset)->getValue();    //data reintervento
                $tempData->colValue = date("d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
            }           
            $this->tempDataIntervento[] = $tempData;


            $tempData = new Column();
            $tempData->colName = "idChirurgo";
            if($num == 0){
                $tempMedico = $sheet->getCell('EC'.$rowOffset)->getValue();
                $tempData->colValue = $findMatch->idMedico($tempMedico);    //idChirurgo
            }
            else{
                $tempData->colValue = null;
            } 
            $this->tempDataIntervento[] = $tempData;           

            //riferimento id del paziente
            $tempData = new Column();
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;   
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column();
            $tempData->colName = "idTipoIntervento";
            if($num == 0){
                $idTipoPatologia = $findMatch->idTipoIntervento("EVAR");
                $tempData->colValue = $idTipoPatologia;    //idTipoIntervento
            }
            else{
                $tempData->colValue = 0;    //da aggiornare per il reintervento (colonna H)
            }          
            $this->tempDataIntervento[] = $tempData;

            //codice ICD9 intervento
            $tempData = new Column;
            $tempData->colName = "codiceICD9";
            if($num == 0){
                //$codiceICD9 = $findMatch->codiceICD9("ANEURISMA AORTA ADDOMINALE ROTTO");
                $codiceICD9 = null;
                $tempData->colValue = $codiceICD9;    
            }
            else{
                $tempData->colValue = 0;    //Per reintervento?   
            }          
            $this->tempDataIntervento[] = $tempData;

            //codice ICD9 della patologia che ha causato l'intervento
            $tempData = new Column;
            $tempData->colName = "causa1";
            if($num == 0){
                //$idTipoPatologia = $findMatch->idTipoPatologia("ANEURISMA AORTA ADDOMINALE ROTTO"); //riferimento tipo patologia.
                $idTipoPatologia = null;
                $tempData->colValue = $idTipoPatologia;
            }
            else{
                $tempData->colValue = null; //Per reintervento invece?
            }   
            $this->tempDataIntervento[] = $tempData;

            /*
            $tempData = new Column;
            $tempData->colName = "causa2";
            $tempData->colValue = null;    //**
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "causa3";
            $tempData->colValue = null;    //**
            $this->tempDataIntervento[] = $tempData;
            */

            $tempData = new Column();
            $tempData->colName = "esito";   //deve essere ribattezzato in successoTecnico colonna FP
            if($num == 0){
                $tempData->colValue = $sheet->getCell('GJ'.$rowOffset)->getValue();   //esito
            }
            else{
                $tempData->colValue = null;
            }
            $this->tempDataIntervento[] = $tempData;    

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
            echo("lastInterventoId = ".$this->id."<br>");
        }
    }

?>