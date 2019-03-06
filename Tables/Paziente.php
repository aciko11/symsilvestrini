<?php 

    class Paziente{

        public $tempDataPaziente = array();
        public $id = null;
        //$temp = new Column();

        function createData($sheet, $rowOffset, $num){

            /*i have to change all the $this->tempDataPaziente with only tempData and then
            pass it with $this->tempDataPaziente[] = $tempData like i have done with dataNascita
            */

            $insert = new InsertData();
            //temporary object that is gonna be passed to the class propriety $tempDataPaziente
            //to create an array of objects
            
            //cognome
            $tempData = new Column;
            $tempData->colName = "cognome";
            $tempData->colValue = $sheet->getCell('B'.$rowOffset)->getValue(); 
            $this->tempDataPaziente[] = $tempData;

            //nome
            $tempData = new Column;
            $tempData->colName = "nome";
            $tempData->colValue = $sheet->getCell('C'.$rowOffset)->getValue();
            $this->tempDataPaziente[] = $tempData;

            //dataNascita
            $tempData = new Column;
            $tempData->colName = "dataNascita";
            $tempData->colValue = $sheet->getCell('D'.$rowOffset)->getValue();
            $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($tempData->colValue));
            echo("test0".$tempData->colValue);
            //echo("test".$this->$tempDataPaziente[$j]->colValue);   
            $this->tempDataPaziente[] = $tempData;

            //sesso
            $tempData = new Column;
            $tempData->colName = "sesso";
            $tempData->colValue = $sheet->getCell('BK'.$rowOffset)->getValue(); 
            if($tempData->colValue == "1")
                $tempData->colValue = "M";
            else
                $tempData->colValue = "F";
            $this->tempDataPaziente[] = $tempData;

            //dataInserimento
            $tempData = new Column;
            $tempData->colName = "dataInserimento";
            $tempData->colValue = date("d-m-Y", time());    
            $this->tempDataPaziente[] = $tempData;

            //ultimaModifica
            $tempData = new Column;
            $tempData->colName = "ultimaModifica";
            $tempData->colValue = date("d-m-Y", time());   
            $this->tempDataPaziente[] = $tempData;

            
            //migrato
            $tempData = new Column;
            $tempData->colName = "migrato";
            $tempData->colValue = 1;
            $this->tempDataPaziente[] = $tempData;
            

            //fumatore
            $tempData = new Column;
            $tempData->colName = "fumatore";
            $tempData->colValue = $sheet->getCell('BO'.$rowOffset)->getValue(); 
            if($tempData->colValue == 1)
                $tempData->colValue = "SI"; 
            else 
                $tempData->colValue = "NO";
            $this->tempDataPaziente[] = $tempData;

            /*
            //codiceDbCook
            $tempData = new Column;
            $tempData->colName = "codiceDbCook";
            $tempData->colValue =  $sheet->getCell('A'.$rowOffset)->getValue(); 
            $this->tempDataPaziente[] = $tempData;

            //migratoDbCook
            $tempData = new Column;
            $tempData->colName = "migratoDbCook";
            $tempData->colValue =  1; 
            $this->tempDataPaziente[] = $tempData;  
            */              

            //altrePatologie
            $tempData = new Column;
            $tempData->colName = "altrePatologie";
            $tempData->colValue = $sheet->getCell('CF'.$rowOffset)->getValue();
            $this->tempDataPaziente[] = $tempData;
            

            $this->id = $insert->insert($this->tempDataPaziente, "paziente");
            echo("<br>".$this->id."<br>");
        }
           
        

    }


?>