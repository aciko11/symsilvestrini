<?php

    class Decesso{
        public $id;
        public $tempDataDecesso;

        function create($sheet, $rowOffset, $idPaziente, $column){
            $insert = new InsertData;
            $findMatch = new FindMatch;


            $tempData = new Column;
            $tempData->colName = "id";
            $tempData->colValue = $idPaziente;
            $this->tempDataDecesso[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "data";
            if($sheet->getCell('AD'.$rowOffset)->getValue() == 1){
                $dataDecesso = $sheet->getCell('AE'.$rowOffset)->getValue();
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataDecesso));
            }
            else{
                //$tempData->colValue = $dataUltimoAccertamento;
            }
            $this->tempDataDecesso[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "causa";
            $idDecesso = $findMatch->idTipoDecesso($column);
            $tempData->colValue = $idDecesso;
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

            $insert->insert($this->tempDataDecesso, "Decesso");
            $this->id = $idPaziente;
            echo("LastDecessoId: ".$this->id);
        }
    }


?>