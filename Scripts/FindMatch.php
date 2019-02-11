<?php

    class FindMatch{

        function idMedico($tempValue){
            #region if

            if($tempValue == "CAO"){

            }
            elseif($tempValue == "CAO/CARLINI"){
                $tempValue = "CAO";
            }
            elseif($tempValue == "PROF.P CAO"){
                $tempValue = "CAO";
            }
            elseif($tempValue == "CARLINI"){

            }
            elseif($tempValue == "CARLNI"){
                $tempValue = "CARLINI";
            }
            elseif($tempValue == "CARLINI/DE RANGO"){
                $tempValue = "CARLINI";
            }
            elseif($tempValue == "CERI"){
                $tempValue = "CIERI";
            }
            elseif($tempValue == "CIERI"){

            }
            elseif($tempValue == "COSCARELLA"){

            }
            elseif($tempValue == "GIORDANO"){

            }
            elseif($tempValue == "IACONO"){

            }
            elseif($tempValue == "LENTI"){

            }
            elseif($tempValue == "PARENTE"){

            }
            elseif($tempValue == "PARLANI"){

            }
            elseif($tempValue == "ROMANO"){

            }
            elseif($tempValue == "TAVOLINI"){

            }
            elseif($tempValue == "VERZINI"){

            }
            elseif($tempValue == "VARZINI"){
                $tempValue = "VERZINI";
            }
            else{
                $tempValue = "migrato-ND";
            }
            #endregion
           
            $query = "SELECT id FROM medico WHERE cognome = '$tempValue'";
            $idMedico = getValue($query, "id");
            return $idMedico;
        }

        function idTipoPatologia($patologia){

            $query = "SELECT id FROM tipo_patologia WHERE descrizione = '$patologia'";
            $idTipoPatologia = getValue($query, "id");
            return $idTipoPatologia;
        }

        function getValue($query, $assocName){
            global $connect;
            
            $result = mysqli_query($connect, $query) or die (mysqli_error($connect));
            $row = mysqli_fetch_assoc($result);
            $value = $row[$assocName];
            return $value;
        }
    }



?>