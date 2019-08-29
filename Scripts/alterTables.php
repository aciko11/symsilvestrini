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

    $col = new Column;
    $col->colName = "ipogas_Aneu";
    $col->colValue = "tinyint";
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
            echo(mysqli_error($connect)."<BR><BR>");
        }
    }

    //Start of the insert into queries

    $tableNames = array();
    $tableValues = array();

    $name = "tipo_complicanza";
    $desc = "Endoleak di tipo I-migrato-ND";
    $tableNames[] = $name;
    $tableValues[] = $desc;

    $name = "tipo_intervento";
    $desc = "migrato-ND";
    $tableNames[] = $name;
    $tableValues[] = $desc;

    $name = "tipo_accertamento";
    $desc = "migrato-ND";
    $tableNames[] = $name;
    $tableValues[] = $desc;

    $i = 0;
    foreach($tableNames as $tableName){

        $query = "INSERT INTO ".$tableName." (descrizione) VALUES ('".$tableValues[$i]."')";
        echo($query."<BR><BR>");

        mysqli_query($connect, $query);
        if(mysqli_error($connect) != NULL){
            echo(mysqli_error($connect)."<BR><BR>");
        }

        $i++;
    }

    
    

?>