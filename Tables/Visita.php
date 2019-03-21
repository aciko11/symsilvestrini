<?php

    class Visita{
        public $tempDataTerapia = array();

        function create($sheet, $rowOffset){

            $temp = $sheet->getCell('CO'.$rowOffset)->getValue();
            if($temp != "#NULL!"){
                $tempData = new Column;
                $tempData->colName = "indiceCavigliaBraccioDx";
                $tempData->colValue = $temp;
                $this->tempDataTerapia[] = $tempData;
            }
            
            $temp = $sheet->getCell('CP'.$rowOffset)->getValue();
            if($temp != "#NULL!"){
                $tempData = new Column;
                $tempData->colName = "indiceCavigliaBracciosx";
                $tempData->colValue = $temp;
                $this->tempDataTerapia[] = $tempData;
            }

        }
    }

?>