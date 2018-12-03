<?php

    require "connection.php";

    global $connect;

    $tablesList = array("accertamento", "atc", "categoria_farmaco", "causa_decesso","causa_rottura", 
    "complicanza", "controllo_telefonico", "decesso", "ecodoppler", "ecografia", "farmaco", 
    "fattore_rischio", "gradi_patologia", "intervento", "medico", "patologia", "paziente",
    "protesi", "reparto", "ricovero", "rottura", "rx", "sintomi_post_intervento", "tac", 
    "terapia", "tipo_accertamento", "tipo_complicanza", "tipo_decesso", "tipo_fattore_rischio",
    "tipo_intervento", "tipo_motivazione_dimissione", "tipo_patologia", "tipo_protesi",
    "tipo_terapia", "utente", "visita");
    
    $query = "SET FOREIGN_KEY_CHECKS=0;";
        mysqli_query($connect, $query) or die(mysqli_error($connect));

    for ($i = 0; $i < sizeof($tablesList); $i++){
        

        $query = "delete from ".$tablesList[$i].";";
        mysqli_query($connect, $query) or die(mysqli_error($connect));

        
    }

    $query = "SET FOREIGN_KEY_CHECKS=1;";
    mysqli_query($connect, $query) or die(mysqli_error($connect));

    mysqli_close($connect);


?>