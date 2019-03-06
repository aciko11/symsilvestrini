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
            $dataNascita = $sheet->getCell('D'.$rowOffset)->getValue();
            echo($dataNascita);
            if($dataNascita == "#NULL!"){
                $tempData->colValue = "0000-00-00";
            }
            else{
                $tempData->colValue = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($dataNascita));
            }            
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
            $tempData->colValue = date("Y-m-d", time());    
            $this->tempDataPaziente[] = $tempData;

            //ultimaModifica
            $tempData = new Column;
            $tempData->colName = "ultimaModifica";
            $tempData->colValue = date("Y-m-d", time());   
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