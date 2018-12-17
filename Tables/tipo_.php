<?php

    class Tipo{

        function createData($sheet, $rowsNumber, $rowOffset){

            $tempData = array();
            $insert = new InsertData();

            $letters = array("J", "K", "L", "M", "N", "O", "P", "Q", "R", "T", "U", "V", "W", "X", 
            "AP", "GO", "GP", "GT", "IB");

            $rowOffset = 1;
            //tipo_complicanza
            $i = 0;
            foreach($letters as $column){
                $tempData[$i] = new Column;
                $tempData[$i]->colName = "descrizione";
                $tempData[$i]->colValue = $sheet->getCell($column.$rowOffset)->getValue();

                $insert->insert($tempData, "paziente");
                $i++;
            }

        }
    }

?>