<?php

    class Accertamento{

        public $tempDataAccertamento = array();
        public $id;
        public $tipoControllo;

        function create($sheet, $rowOffset, $idPaziente){
            global $lineSeparator;
            $insert = new insertData;
            $findMatch = new FindMatch;

            $tempData = new Column;
            $tempData->colName = "idTipoAccertamento";
            $this->tipoControllo = $sheet->getCell('AA'.$rowOffset)->getValue();
            $tempData->colValue = $findMatch->idAccertamento($this->tipoControllo);
            $this->setTipoControllo($this->tipoControllo);
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "data";
            $dateAccertamento = $sheet->getCell("Y".$rowOffset)->getValue();
            $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dateAccertamento));
            $this->tempDataAccertamento[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataAccertamento, "accertamento");
            echo($this->id."<br>".$lineSeparator);
        }

        function createTacIntervento($sheet, $rowOffset, $idPaziente, $dataIntervento){
            global $lineSeparator;
            $insert = new insertData;
            $findMatch = new FindMatch;

            $tempData = new Column;
            $tempData->colName = "idTipoAccertamento";
            $tempData->colValue = $findMatch->idAccertamento("Tac");
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "idPaziente";
            $tempData->colValue = $idPaziente;
            $this->tempDataAccertamento[] = $tempData;

            $tempData = new Column;
            $tempData->colName = "data";
            $tempData->colValue = $dataIntervento;
            $this->tempDataAccertamento[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataAccertamento, "accertamento");
            echo($this->id."<br>".$lineSeparator);
        }

        function setTipoControllo($tempValue){
            if($tempValue == "clin"){
                //chiedere!
            }
            elseif($tempValue == "CONV"){
                //chiedere!
            }
            elseif($tempValue == "CUP"){
                //chiedere!
            }
            elseif($tempValue == "DATAB" || $tempValue == "DBASE" || $tempValue == "TEL" || $tempValue == "tel"){
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "eco" || $tempValue == "eco*"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "ECORI"){
                //chiedere!
            }
            elseif($tempValue == "ecorx" || $tempValue == "rxeco"){
                $tempValue = "RX";
            }
            elseif($tempValue == "ECOtc" || $tempValue == "TC" || $tempValue == "Tac"){
                $tempValue = "TC";
            }
            elseif($tempValue == "RICOV"){
                //chiedere!
            }
            else{
                $tempValue = "migrato-ND";
            }

            $this->tipoControllo = $tempValue;
        }

    }

?>