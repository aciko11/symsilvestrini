<?php

    require 'connection.php';
    require '../Classes/column.php';

    global $connect;

    $table = "tac";
    //$columns = array("aorta_Diam", "iliacaComSx_Stenosi", "iliacaComDx_Stenosi");
    $columns = array();

    $col = new Column;
    $col->colName = "aorta_Diam";
    $col->colValue = "int";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "iliacaComSx_Stenosi";
    $col->colValue = "tinyint";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "iliacaComDx_Stenosi";
    $col->colValue = "tinyint";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "iliacaComSx_Occlus";
    $col->colValue = "tinyint";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "iliacaComDx_Occlus";
    $col->colValue = "tinyint";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "iliacaComDx_Ang";
    $col->colValue = "int";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "iliacaComSx_Ang";
    $col->colValue = "int";
    $columns[] = $col;




    $query = array();
    foreach($columns as $col){
        $query = "ALTER TABLE ".$table." ADD ".$col->colName." ".$col->colValue;
        echo($query."<BR><BR>");
        mysqli_query($connect, $query); //or die(mysqli_error($connect));
        if(mysqli_error($connect) != NULL){
            echo(mysqli_error($connect));
        }
    }
    echo("<BR>");
    
    $table = "intervento";
    $columns = array();

    $col = new Column;
    $col->colName = "accessoChirurgico";
    $col->colValue = "varchar(2)";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "accessoPercutaneo";
    $col->colValue = "varchar(2)";
    $columns[] = $col;

    $col = new Column;
    $col->colName = "accessoBrachiale";
    $col->colValue = "varchar(2)";
    $columns[] = $col;

    $query = array();
    foreach($columns as $col){
        $query = "ALTER TABLE ".$table." ADD ".$col->colName." ".$col->colValue;
        echo($query."<BR><BR>");
        mysqli_query($connect, $query); //or die(mysqli_error($connect));
        if(mysqli_error($connect) != NULL){
            echo(mysqli_error($connect));
        }
    }

    $table = "tipo_complicanza";
    $desc = "Endoleak di tipo I-migrato-ND";

    $query = "INSERT INTO ".$table." (descrizione) VALUES ('".$desc."')";
    echo($query."<BR><BR>");
    mysqli_query($connect, $query);
    if(mysqli_error($connect) != NULL){
        echo(mysqli_error($connect));
    }

?>