<?php 

    class Paziente{

        public $tempDataPaziente = array();
        public $lastPazienteId = null;
        //$temp = new Column();

        function createData($sheet, $rowOffset){

            /*i have to change all the $this->tempDataPaziente with only tempData and then
            pass it with $this->tempDataPaziente[] = $tempData like i have done with dataNascita
            */

            $insert = new InsertData();
            //temporary object that is gonna be passed to the class propriety $tempDataPaziente
            //to create an array of objects
            $tempData = new Column;

            //nome
            $j = 0;

            $tempData->colName = "nome";
            $tempData->colValue = $sheet->getCell('C'.$rowOffset)->getValue();
            $this->tempDataPaziente[] = $tempData;

            //cognome
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "cognome";
            $this->tempDataPaziente[$j]->colValue = $sheet->getCell('B'.$rowOffset)->getValue(); 
            $j++;

            //dataNascita
            $tempData->colName = "dataNascita";
            $tempData->colValue = $sheet->getCell('D'.$rowOffset)->getValue();
            $tempData->colValue = date("d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
            echo("test0".$tempData->colValue);
            //echo("test".$this->$tempDataPaziente[$j]->colValue);   
            $this->tempDataPaziente[] = $tempData;

            //sesso
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "sesso";
            $this->tempDataPaziente[$j]->colValue = $sheet->getCell('BK'.$rowOffset)->getValue(); 
            if($this->tempDataPaziente[$j]->colValue == 1)
                $this->tempDataPaziente[$j]->colValue = "M";
            else
                $this->tempDataPaziente[$j]->colValue = "F";
            $j++;

            //dataInserimento
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "dataInserimento";
            $this->tempDataPaziente[$j]->colValue = date("d-m-Y", time());    
            $j++;

            //ultimaModifica
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "ultimaModifica";
            $this->tempDataPaziente[$j]->colValue = time();   
            $j++;

            /*
            //migrato
            $tempDataPaziente[$j] = new Column;
            $tempDataPaziente[$j]->colName = "migrato";
            $tempDataPaziente[$j]->colValue = 1;
            $j++;
            */

            //fumatore
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "fumatore";
            $this->tempDataPaziente[$j]->colValue = $sheet->getCell('BO'.$rowOffset)->getValue(); 
            if($this->tempDataPaziente[$j]->colValue == 1)
                $this->tempDataPaziente[$j]->colValue = "SI"; 
            else 
                $this->tempDataPaziente[$j]->colValue = "NO";
            $j++;

            //codiceDbCook
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "codiceDbCook";
            $this->tempDataPaziente[$j]->colValue =  $sheet->getCell('A'.$rowOffset)->getValue(); //codiceDbCook
            $j++;

            //migratoDbCook
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "migratoDbCook";
            $this->tempDataPaziente[$j]->colValue =  1; 
            $j++;                

            //altrePatologie
            $this->tempDataPaziente[$j] = new Column;
            $this->tempDataPaziente[$j]->colName = "altrePatologie";
            $this->tempDataPaziente[$j]->colValue = $sheet->getCell('CF'.$rowOffset)->getValue();
            $j++;
            
            /*$currentRowData[$i]['idPaziente'] = "test".$i;
            echo($currentRowData[$i]['idPaziente']);
            echo("?");*/    //it works 

            $lastPazienteId = $insert->insert($this->tempDataPaziente, "paziente");
            echo("<br>".$lastPazienteId."<br>");
        }
           
        

    }


?>