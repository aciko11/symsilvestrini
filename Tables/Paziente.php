<?php 

    class Paziente{

        function createData($sheet, $rowsNumber, $rowOffset){

            $tempData = array();
            //$temp = new Column();

            $insert = new InsertData();

            for($i = 0; $i < $rowsNumber; $i++){

                $tempData[0] = new Column;
                $tempData[0]->colName = "nome";
                $tempData[0]->colValue = $sheet->getCell('C'.$rowOffset)->getValue(); //nome

                $tempData[1] = new Column;
                $tempData[1]->colName = "cognome";
                $tempData[1]->colValue = $sheet->getCell('B'.$rowOffset)->getValue(); //cognome 

                $tempData[2] = new Column;
                $tempData[2]->colName = "dataNascita";
                $tempData[2]->colValue = $sheet->getCell('D'.$rowOffset)->getValue(); //dataNascita
                //$data[2] = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($data[2])); //converte in formato data il valore numerico ottenuto da getCell 
                //echo($tempData[2]);

                $tempData[3] = new Column;
                $tempData[3]->colName = "sesso";
                $tempData[3]->colValue = $sheet->getCell('BK'.$rowOffset)->getValue(); //sesso
                
                $tempData[4] = new Column;
                $tempData[4]->colName = "altrePatologie";
                $tempData[4]->colValue = $sheet->getCell('CF'.$rowOffset)->getValue(); //altrePatologie

                $tempData[5] = new Column;
                $tempData[5]->colName = "codiceDbCook";
                $tempData[5]->colValue =  $sheet->getCell('A'.$rowOffset)->getValue(); //codiceDbCook

                $insert->insert($tempData, "paziente");
                $rowOffset++;
            }
           
        }

    }


?>