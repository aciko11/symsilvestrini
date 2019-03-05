<?php


    class InsertData{
        var $MYSQL_ERROR_CODE_DUPLICATE_ENTRY = 1062;
        var $lastTemp = "";

        //$data has to be an array of Column. Column is a structure with 2 properties: colName and colValue
        function insert($data, $tableName){    

            global $connect;

            //number of columns
            $dataSize = sizeof($data);

            //constructing the query: "INSERT INTO ".$tablename."(".$data->colName.") values (".$data->colValue.");
            $query = "Insert into ".$tableName."(";
            
            //all the column names
            for($i = 0; $i < $dataSize; $i++){
                $temp = $data[$i]->colName;
                $this->lastTemp = $temp;
                $query = $query.$temp.", ";                    
            }
            $query = substr_replace($query, "", -2);
            $query = $query.") values (";

            //all the respective values
            for($i = 0; $i < $dataSize; $i++){
                $temp = $data[$i]->colValue;
                $query = $query."'".$temp."', ";
            }
            $query = substr_replace($query, "", -2);
            $query = $query.");";

            echo("<br>".$query."<br>");

            //execuiting query
            mysqli_query($connect, $query);
            if(mysqli_error($connect) == $this->MYSQL_ERROR_CODE_DUPLICATE_ENTRY){
                echo(mysqli_error($connect));
            }
            $last_id = mysqli_insert_id($connect);

            return $last_id;
        }
    }
    
?>