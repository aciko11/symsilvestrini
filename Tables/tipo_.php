<?php

    class Tipo{

        public $tempDataTipo = array();

        function tipo_decesso($sheet, $rowOffset){ //chiedere se se questi nominativi vanno bene
            global $connect;

            $this->tempDataTipo[] = "Aortica"; //441

            $this->tempDataTipo[] = "Cardiovascolari";    //410

            $this->tempDataTipo[] = "Cerebrovascolari";    //436

            $this->tempDataTipo[] = "Polmonari";  //482.9 se trovo polmonite 491.21 altrimenti

            $this->tempDataTipo[] = "Gastrintestinali";   //capitolo 9 

            $this->tempDataTipo[] = "Renali";  //585

            $this->tempDataTipo[] = "Cancro"; //capitolo2
 
            $this->tempDataTipo[] = "Rottura AAA";   //441.3

            $this->tempDataTipo[] = "Altro";
            
            //checking if the various types of deaths already exists in the database
            foreach($this->tempDataTipo as $value){

                $check = "SELECT * FROM causa_decesso WHERE descrizione = '$value'";
                $result = mysqli_query($connect, $check);

                //if i get a result from the query then it means that it already exists
                if(mysqli_num_rows($result) > 0){

                    echo("<br>".$value." è già presente nel database <br>");                   
                }
                else{
                    
                    $query = "INSERT INTO causa_decesso (id, descrizione) VALUES ('', '$value')";               
                    mysqli_query($connect, $query) or die(mysqli_error($connect));
                    echo("<br>".$query."<br>");
                }
                
            }




            
        }
    }

?>