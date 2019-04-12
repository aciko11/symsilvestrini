<?php

    class Ricovero{
        public $tempDataRicovero = array();
        public $id = null;

        function create($sheet, $rowOffset, $idPaziente, $num){
            global $lineSeparator;
            $insert = new InsertData();
          
            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;  //rif idPaziente
            $this->tempDataRicovero[] = $tempData;


            $tempData = new Column;
            $tempData->colName = "dataIngresso";
            if($num == 1){
                $dataIngresso = $sheet->getCell('E'.$rowOffset)->getValue();    //dataIngresso
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataIngresso));
            }
            elseif($num == 2){
                $dataIngresso = $sheet->getCell('G'.$rowOffset)->getValue();    //dataIngresso
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataIngresso));
            }
            elseif($num == 3){
                $dataIngresso = $sheet->getCell('AV'.$rowOffset)->getValue();    //dataIngresso
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataIngresso));
            }          
            $this->tempDataRicovero[] = $tempData;


            $tempData = new Column;
            $tempData->colName = "dataDimissione";
            if($num == 1){
                //$tempData->colValue = date("d-m-Y", "");
                $dataDimissione = $dataIngresso + 
                    $sheet->getCell('FY'.$rowOffset)->getValue();
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataDimissione));
                
            }
            elseif($num == 2){
                $tempData->colValue = "0000-00-00";
            }
            elseif($num == 3){
                $tempData->colValue = "0000-00-00";
            }
            $this->tempDataRicovero[] = $tempData;           


            $tempData = new Column;
            $tempData->colName = "migrato";
            $tempData->colValue = 1;
            $this->tempDataRicovero[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataRicovero, "ricovero");
            echo("lastRicoveroId = ".$this->id."<br>".$lineSeparator);
        }
    }

?>