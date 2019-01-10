<?php

    class Tipo{

        function createData($sheet, $rowsNumber, $rowOffset){

            $tempData = array();
            $insert = new InsertData();

            $columns = array("J", "K", "L", "M", "N", "O", "P", "Q", "R", "T", "U", "V", "W", "X", 
            "AP", "GO", "GP", "GT", "IB");

            $rowOffset = 1;
            //tipo_complicanza
            $i = 0;

            for($i = 0; $i < count($columns); $i++){
                $tempData[0] = new Column;
                $tempData[0]->colName = "descrizione";
                $tempData[0]->colValue = $sheet->getCell($columns[$i].$rowOffset)->getValue();

                $insert->insert($tempData, "tipo_complicanza ");
                $i++;
            }

        }
    }

?>