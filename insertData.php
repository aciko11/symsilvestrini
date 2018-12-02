<?php

require 'connection.php';

    class insertData{
        

        function insert($data){    //$data should be an array
        global $connect;

        $fields = "id, nome, cognome, datanascita, sesso, ultimamodifica, datainserimento";

        $id = $data[0];$nome = $data[1];$cognome = $data[2];$datanascita = $data[3];$sesso = $data[4];$ultimamodifica = $data[5];$datainserimento = $data[6];


        $query = "Insert into paziente(".$fields.") values ('$id', '$nome', '$cognome', '$datanascita', '$sesso', '$ultimamodifica', '$datainserimento');";
        mysqli_query($connect, $query) or die (mysqli_error($connect));

        mysqli_close($connect) or die(mysqli_error($connect));
        }
    }
    
?>