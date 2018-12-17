<?php

    class Intervento{

        function createData($sheet, $rowsNumber, $rowOffset){

            $tempData = array();
            $temp = new Column();

            $insert = new InsertData();

            for($i = 0; $i < $rowsNumber; $i++){
                $tempData[0] = new Column();
                $tempData[0]->colName = "data";
                $tempData[0]->colValue = $sheet->getCell('E'.$i+$rowOffset)->getValue();    //data
                
                $tempData[1] = new Column;
                $tempData[1]->colName = "causa1";
                $tempData[1]->colValue = "";    //rif tabella tipo_patologia

                $tempData[2] = new Column;
                $tempData[2]->colName = "causa2";
                $tempData[2]->colValue = "";    //rif tabella tipo_patologia

                $tempData[3] = new Column;
                $tempData[3]->colName = "causa3";
                $tempData[3]->colValue = "";    //rif tabella tipo_patologia

                $tempData[4] = new Column();
                $tempData[4]->colName = "degenzaPostOperatoria";
                $tempData[4]->colValue = $sheet->getCell('FY'.$i+$rowOffset)->getValue();   //degenzaPostOperatoria

                $tempData[5] = new Column();
                $tempData[5]->colName = "esito";
                $tempData[5]->colValue = $sheet->getCell('GJ'.$i+$rowOffset)->getValue();   //esito

                $tempData[6] = new Column;
                $tempData[6]->colName = "noteEsito";
                $tempData[6]->colValue = $sheet->getCell('GK'.$i+$rowOffset)->getValue();    

                $tempData[7] = new Column;
                $tempData[7]->colName = "idRicovero";
                $tempData[7]->colValue = "";    //rif tabella ricovero 
                
                $tempData[1] = new Column;
                $tempData[1]->colName = "gradoAsa";
                $tempData[1]->colValue = $sheet->getCell('CH'.$i+$rowOffset)->getValue();   //grado ASA
            }

        }
    }

?>