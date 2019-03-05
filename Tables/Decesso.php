<?php

    class Decesso{
        public $id;
        public $tempDataDecesso;

        function create($sheet, $rowOffset, $idPaziente){
            $insert = new InsertData;
            $findMatch = new FindMatch;


            $tempData = new Column;
            $tempData->colName = "id";
            $tempData->colValue = $idPaziente;
            $this->tempDataDecesso[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "data";
            if($sheet->getCell('AD'.$rowOffset)->getValue() == 1){
                $tempData->colValue = $sheet->getCell('AE'.$rowOffset)->getValue();
            }
            else{
                //$tempData->colValue = $dataUltimoAccertamento;
            }
            $this->tempDataDecesso[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "causa";
            $tempData->colValue = null; //email "tutto da decidere"
            $this->tempDataDecesso[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "tipo";
            $tempData->colValue = null; //email 
            $this->tempDataDecesso[] = $tempData;

            /*
            //da vedere se serve o se deve essere collegato ad una rottura-> guardare mail
            $tempData = new Column;
            $tempData->colName = "idRottura";
            $tempData->colValue = null; //email 
            $this->tempDataDecesso[] = $tempData;
            */

            $this->id = $insert->insert($this->tempDataDecesso, "Decesso");
            echo("LastDecessoId: ".$this->id);
        }
    }


?>