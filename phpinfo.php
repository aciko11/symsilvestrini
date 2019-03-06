<?php

    require 'connection.php';
    echo("ok");
    $result = mysqli_query($connect, "select * from medico");
    
    while($row = mysqli_fetch_assoc($result)){
    foreach ($row as $e){
        echo($e);
    }}
        
    


?>