<?php

    class Ricovero{
        public $tempDataRicovero = array();
        public $id = null;
        function createData($sheet, $rowOffset, $idPaziente, $num){
            $insert = new InsertData();
          

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;    //devo mettere il riferimento all'id del paziente corrente //idPaziente
            $this->tempDataRicovero[] = $tempData;


            $tempData = new Column;
            $tempData->colName = "dataIngresso";
            if($num == 0){
                $dataIngresso = $sheet->getCell('E'.$rowOffset)->getValue();    //dataIngresso
                $tempData->colValue = $dataIngresso;
            }
            else{
                $dataIngresso = $sheet->getCell('G'.$rowOffset)->getValue();    //dataIngresso
                $tempData->colValue = $dataIngresso;
            }          
            $this->tempDataRicovero[] = $tempData;


            $tempData = new Column;
            $tempData->colName = "dataDimissione";
            if($num == 0){
                //$tempData->colValue = date("d-m-Y", "");
                $tempData->colValue = $dataIngresso + 
                $sheet->getCell('FY'.$rowOffset)->getValue();
                
            }
            else{
                $tempData->colValue = "00/00/0000";
            }
            $this->tempDataRicovero[] = $tempData;           


            $tempData = new Column;
            $tempData->colName = "migrato";
            $tempData->colValue = 1;
            $this->tempDataRicovero[] = $tempData;
            
            $id = $insert->insert($this->tempDataRicovero, "ricovero");
            echo("<br>lastRicoveroId = ".$id);
        }
    }

?>