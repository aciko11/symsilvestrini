<?php

    class Ricovero{
        public $tempDataRicovero = array();
        public $id = null;
        function createData($sheet, $rowOffset, $idPaziente, $num){
            $insert = new InsertData();
          

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;  //rif idPaziente
            $this->tempDataRicovero[] = $tempData;


            $tempData = new Column;
            $tempData->colName = "dataIngresso";
            if($num == 0){
                $dataIngresso = $sheet->getCell('E'.$rowOffset)->getValue();    //dataIngresso
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataIngresso));
            }
            else{
                $dataIngresso = $sheet->getCell('G'.$rowOffset)->getValue();    //dataIngresso
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataIngresso));
            }          
            $this->tempDataRicovero[] = $tempData;


            $tempData = new Column;
            $tempData->colName = "dataDimissione";
            if($num == 0){
                //$tempData->colValue = date("d-m-Y", "");
                $dataDimissione = $dataIngresso + 
                    $sheet->getCell('FY'.$rowOffset)->getValue();
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataDimissione));
                
            }
            else{
                $tempData->colValue = "0000-00-00";
            }
            $this->tempDataRicovero[] = $tempData;           


            $tempData = new Column;
            $tempData->colName = "migrato";
            $tempData->colValue = 1;
            $this->tempDataRicovero[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataRicovero, "ricovero");
            echo("lastRicoveroId = ".$this->id."<br>");
        }
    }

?>