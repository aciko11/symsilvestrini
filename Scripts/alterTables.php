<?php

    require 'connection.php';
    require '/../Classes/column.php';

    global $connect;

    $table = "tac";
    $columns = array("aorta_Diam", "iliacaComSx_Stenosi", "iliacaComDx_Stenosi");
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




    $query = array();
    foreach($columns as $col){
        $query[] = "ALTER TABLE ".$table."ADD ".$col."";
    } 
    

?>