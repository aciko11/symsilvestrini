<?php

    class Ricovero{
        public $tempDataRicovero = array();
        public $lastRicoveroId = null;
        function createData($sheet, $rowOffset, $paziente){
            $insert = new InsertData();
          
            $j = 0;
            $tempDataRicovero[$j] = new Column;
            $tempDataRicovero[$j]->colName = "idPaziente";
            $tempDataRicovero[$j]->colValue = $paziente->lastPazienteId;    //devo mettere il riferimento all'id del paziente corrente //idPaziente
            $j++;

            $tempDataRicovero[$j] = new Column;
            $tempDataRicovero[$j]->colName = "dataIngresso";
            $tempDataRicovero[$j]->colValue = $sheet->getCell('E'.$rowOffset)->getValue();    //dataIngresso
            $j++;

            $tempDataRicovero[$j] = new Column;
            $tempDataRicovero[$j]->colName = "dataDimissione";
            //$tempDataRicovero[$j]->colValue = date("d-m-Y", "");
            $tempDataRicovero[$j]->colValue = $tempDataRicovero[$j-1] + 
                $sheet->getCell('FY'.$rowOffset)->getValue();
            $j++;

            $tempDataRicovero[$j] = new Column;
            $tempDataRicovero[$j]->colName = "migrato";
            $tempDataRicovero[$j]->colValue = 1;
            $j++;
            
            $lastRicoveroId = $insert->insert($tempDataRicovero, "ricovero");
            echo("<br>lastRicoveroId = ".$lastRicoveroId);
        }
    }

?>