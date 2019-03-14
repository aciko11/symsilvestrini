<?php

    class Intervento{

        public $tempDataIntervento = array();
        public $date;
        public $id = null;

        function create($sheet, $rowOffset, $idPaziente, $idRicovero, $num){
            $insert = new InsertData();
            $findMatch = new FindMatch;
            

            $tempData = new Column;
            $tempData->colName = "data";
            if($num == 1){
                $tempData->colValue = $sheet->getCell('E'.$rowOffset)->getValue();    //data intervento
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
                echo("test1".$tempData->colValue);
            }
            elseif($num == 2){
                $tempData->colValue = $sheet->getCell('G'.$rowOffset)->getValue();    //data reintervento
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
            }
            elseif($num == 3){
                $tempData->colValue = $sheet->getCell('AV'.$rowOffset)->getValue();    //data reintervento
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
            }
            $this->date = $tempData->colValue;           
            $this->tempDataIntervento[] = $tempData;


            $tempData = new Column();
            $tempData->colName = "idChirurgo";
            if($num == 1){
                $tempMedico = $sheet->getCell('EC'.$rowOffset)->getValue();
                $tempData->colValue = $findMatch->idMedico($tempMedico);    //idChirurgo
            }
            elseif($num == 2){
                $tempData->colValue = $findMatch->idMedico(null);    //idChirurgo
            } 
            elseif($num == 3){
                $tempData->colValue = $findMatch->idMedico(null);    //idChirurgo
            }
            $this->tempDataIntervento[] = $tempData;           

            //riferimento id del paziente
            $tempData = new Column();
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;   
            $this->tempDataIntervento[] = $tempData;

            $tempData = new Column();
            $tempData->colName = "idTipoIntervento";
            if($num == 1){
                $idTipoIntervento = $findMatch->idTipoIntervento("EVAR");
                $tempData->colValue = $idTipoIntervento;    //idTipoIntervento
            }
            elseif($num == 2){
                $idTipoIntervento = $findMatch->idTipoIntervento("migrato-ND");
                $tempData->colValue = $idTipoIntervento;    //da aggiornare 
            }     
            elseif($num == 3){
                $idTipoIntervento = $findMatch->idTipoIntervento("migrato-ND");
                $tempData->colValue = $idTipoIntervento;    //da aggiornare
            }     
            $this->tempDataIntervento[] = $tempData;

            //codice ICD9 intervento
            $tempData = new Column;
            $tempData->colName = "codiceICD9";
            if($num == 1){
                //$codiceICD9 = $findMatch->codiceICD9("ANEURISMA AORTA ADDOMINALE ROTTO");
                $codiceICD9 = null;
                $tempData->colValue = $codiceICD9;    
            }
            elseif($num == 2){
                $tempData->colValue = 0;    //Per reintervento?   
            } 
            elseif($num == 3){
                $tempData->colValue = 0;    //Per reintervento2?   
            }          
            $this->tempDataIntervento[] = $tempData;

            //codice ICD9 della patologia che ha causato l'intervento
            $tempData = new Column;
            $tempData->colName = "causa1";
            if($num == 1){
                $idTipoPatologia = $findMatch->idTipoPatologia("ANEURISMA AORTA ADDOMINALE ROTTO"); //riferimento tipo patologia.
                $tempData->colValue = $idTipoPatologia;
            }
            elseif($num == 2){
                $idTipoPatologia = $findMatch->idTipoPatologia("migrato-ND");
                $tempData->colValue = $idTipoPatologia;    //da aggiornare
            }  
            elseif($num == 3){
                $idTipoPatologia = $findMatch->idTipoPatologia("migrato-ND");
                $tempData->colValue = $idTipoPatologia;    //da aggiornare
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
            if($num == 1){
                $tempData->colValue = $sheet->getCell('FP'.$rowOffset)->getValue();   //esito
            }
            elseif($num == 2){
                $tempData->colValue = null;
            }
            elseif($num == 3){
                $tempData->colValue = null;
            }
            $this->tempDataIntervento[] = $tempData;    

            $tempData = new Column;
            $tempData->colName = "noteEsito";
            if($num == 1){
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

            if($num == 1){
                $tempData = new Column;
                $tempData->colName = "gradoAsa";
                $tempData->colValue = $sheet->getCell('CH'.$rowOffset)->getValue();   //gradoAsa
                $this->tempDataIntervento[] = $tempData;
            }
            
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