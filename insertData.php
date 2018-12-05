<?php

require 'connection.php';
require 'Classes/column.php';

    class insertData{
        

        //$data has to be an array of Column. Column is a structure with 2 properties: colName and colValue
        function insert($data, $tableName){    

            global $connect;

            //$fields = "id, nome, cognome, datanascita, sesso, ultimamodifica, datainserimento";
            //$id = $data[0];$nome = $data[1];$cognome = $data[2];$datanascita = $data[3];$sesso = $data[4];$ultimamodifica = $data[5];$datainserimento = $data[6];
            $dataSize = sizeof($data);
            $query = "Insert into paziente(";
            for($i = 0; $i < $dataSize; $i++){
                $temp = $data[$i]->colName;
                $query = $query.$temp.", ";
            }
            $query = substr_replace($query, "", -2);
            $query = $query.") values (";

            for($i = 0; $i < $dataSize; $i++){
                $temp = $data[$i]->colValue;
                $query = $query."'".$temp."', ";
            }
            $query = substr_replace($query, "", -2);
            $query = $query.");";

            //$query = "Insert into paziente(".$fields.") values ('$id', '$nome', '$cognome', '$datanascita', '$sesso', '$ultimamodifica', '$datainserimento');";
            mysqli_query($connect, $query) or die (mysqli_error($connect));

            mysqli_close($connect) or die(mysqli_error($connect));
        }
    }
    
?>