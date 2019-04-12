<?php

    class Tipo{

        public $tempDataTipo = array();

        
        function tipo_complicanza($sheet, $rowOffset){
            $insert = new InsertData;
            
            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo1";
            $this->tempDataTipo = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo2";
            $this->tempDataTipo = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "endoleakTipo3";
            $this->tempDataTipo = $tempData;
            
            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Migrazione graft";
            $this->tempDataTipo = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Occlusione di branca iliaca";
            $this->tempDataTipo = $tempData;

            $tempData = new Column;
            $tempData->colName = "descrizione";
            $tempData->colValue = "Sanguinamento";
            $this->tempDataTipo = $tempData;


            $insert->insert($this->tempDataTipo, "tipo_complicanza");
        }

        function tipo_decesso($sheet, $rowOffset){ //chiedere se se questi nominativi vanno bene
            global $connect;

            $this->tempDataTipo[] = "Aortica"; //441

            $this->tempDataTipo[] = "Cardiovascolari";    //410

            $this->tempDataTipo[] = "Cerebrovascolari";    //436

            $this->tempDataTipo[] = "Polmonari";  //482.9 se trovo polmonite 491.21 altrimenti

            $this->tempDataTipo[] = "Gastrntestinali";   //capitolo 9 

            $this->tempDataTipo[] = "Renali";  //585

            $this->tempDataTipo[] = "Cancro"; //capitolo2

            $this->tempDataTipo[] = "Altro";
 
            $this->tempDataTipo[] = "Rottura AAA";   //441.3
            
            foreach($this->tempDataTipo as $value){

                $check = "SELECT * FROM causa_decesso WHERE descrizione = '$value'";
                $result = mysqli_query($connect, $check);

                if(mysqli_num_rows($result) > 0){

                    echo("<br>".$value." è già presente nel database <br>");
                    
                }
                else{

                    $query = "INSERT INTO causa_decesso (id, descrizione) VALUES ('', '$value')";               
                    mysqli_query($connect, $query);

                    if($error = mysqli_error($connect)){
                        echo($query."  ".$error);
                    }
                    else{
                        echo("<br>".$query."<br>");
                    }

                }
                
            }
            
        }
    }

?>