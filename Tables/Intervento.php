<?php

    class Intervento{

        function createData($sheet, $rowsNumber, $rowOffset){

            $tempData = array();
            $temp = new Column();

            $insert = new InsertData();
            
            $j = 0;
            $tempData[$j] = new Column();
            $tempData[$j]->colName = "data";
            $tempData[$j]->colValue = $sheet->getCell('E'.$i+$rowOffset)->getValue();    //data
            $j++;

            $tempData[$j] = new Column();
            $tempData[$j]->colName = "idChirurgo";
            $tempData[$j]->colValue = "";//trovare id corrispondente al medico nella colonna EC    //idChirurgo
            $j++;

            $tempData[$j] = new Column();
            $tempData[$j]->colName = "idPaziente";
            $tempData[$j]->colValue = "";//riferimento id del paziente    //data
            $j++;

            $tempData[$j] = new Column();
            $tempData[$j]->colName = "idTipoIntervento";
            $tempData[$j]->colValue = 0;//**     //idTipoIntervento
            $j++;



            $tempData[$j] = new Column;
            $tempData[$j]->colName = "causa1";
            $tempData[$j]->colValue = 0;    //**
            $j++;

            $tempData[$j] = new Column;
            $tempData[$j]->colName = "causa2";
            $tempData[$j]->colValue = "";    //**
            $j++;

            $tempData[$j] = new Column;
            $tempData[$j]->colName = "causa3";
            $tempData[$j]->colValue = "";    //**
            $j++;

            /*$tempData[$j] = new Column();
            $tempData[$j]->colName = "degenzaPostOperatoria";
            $tempData[$j]->colValue = $sheet->getCell('FY'.$i+$rowOffset)->getValue();   //degenzaPostOperatoria
            $j++;*/

            /*$tempData[$j] = new Column();
            $tempData[$j]->colName = "esito";
            $tempData[$j]->colValue = $sheet->getCell('GJ'.$i+$rowOffset)->getValue();   //esito
            $j++;*/

            $tempData[$j] = new Column;
            $tempData[$j]->colName = "noteEsito";
            $tempData[$j]->colValue = $sheet->getCell('GK'.$i+$rowOffset)->getValue();    
            $j++;

            $tempData[$j] = new Column;
            $tempData[$j]->colName = "idRicovero";
            $tempData[$j]->colValue = "";    //rif tabella ricovero 
            $j++;

            $tempData[$j] = new Column;
            $tempData[$j]->colName = "urgenza";
            $tempData[$j]->colValue = "migrato-ND";   //urgenza
            $j++;

            $tempData[$j] = new Column;
            $tempData[$j]->colName = "gradoAsa";
            $tempData[$j]->colValue = $sheet->getCell('CH'.$i+$rowOffset)->getValue();   //grado ASA
            $j++;
            

        }
    }

?>