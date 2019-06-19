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
            echo($this->tipoControllo);
            $tempData->colValue = $findMatch->idAccertamento($this->tipoControllo);
            //$this->setTipoControllo($this->tipoControllo);    //??????
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

        function createTac($sheet, $rowOffset, $idPaziente, $date){
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
            $tempData->colValue = $date;
            $this->tempDataAccertamento[] = $tempData;
            
            $this->id = $insert->insert($this->tempDataAccertamento, "accertamento");
            echo($this->id."<br>".$lineSeparator);
        }

        function setTipoControllo($tempValue){
            if($tempValue == "clin"){
                //ECO!!!!!!!!!!!
            }
            elseif($tempValue == "CONV"){
                //ECO!!!!!!!!!!!!!!!!!!!
            }
            elseif($tempValue == "CUP"){
                //ECO!!!!!!!!!!!!!!!
            }
            elseif($tempValue == "DATAB" || $tempValue == "DBASE" || $tempValue == "TEL" || $tempValue == "tel"){
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "eco" || $tempValue == "eco*"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "ECORI"){
                //è ECORX
            }
            elseif($tempValue == "ecorx" || $tempValue == "rxeco"){
                //$tempValue = "RX";

                //è SIA ECO CHE RX CIOè HA FATTO TUTTE E DUE
            }
            elseif($tempValue == "ECOtc" || $tempValue == "TC" || $tempValue == "Tac"){
                $tempValue = "TC";
            }
            elseif($tempValue == "RICOV"){
                //ECO!!!!!!!!!!!!
            }
            else{
                $tempValue = "migrato-ND";
            }

            $this->tipoControllo = $tempValue;
        }

    }

?>