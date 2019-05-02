<?php
    
    define('hostname', 'localhost');
    define('user', 'root');
    define('password', '');
    define('databaseName', 'symsilvestrini2');

    $connect = mysqli_connect(hostname, user, password, databaseName) or die(mysqli_error($connect));

    $query = "SET FOREIGN_KEY_CHECKS = 0";
    mysqli_query($connect, $query) or die(mysqli_error($connect));



    $query = "delete from intervento";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from fattore_rischio";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from patologia";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from visita";
    mysqli_query($connect, $query) or die(mysqli_error($connect));


    //tipi di accertamento
    $query = "delete from tac";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from ecografia";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from ecodoppler";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from controllo_telefonico";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from visita";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from rx";
    mysqli_query($connect, $query) or die(mysqli_error($connect));

    //
    $query = "delete from accertamento";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from ricovero";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from decesso";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from complicanza";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "delete from paziente";
    mysqli_query($connect, $query) or die(mysqli_error($connect));
    


    mysqli_query($connect, $query) or die(mysqli_error($connect));
    $query = "SET FOREIGN_KEY_CHECKS = 1";
    
    
    

    //paziente, ricovero, intervento, complicanza, accertamento, decesso, visita, patologia, fattori_rischio
    //accertamento tutti anche quelli collegati: tel, tac ecc...


?>