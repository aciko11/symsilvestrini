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
            $id = $this->getValue($query, "id");
            return $id;
        }

        function idTipoPatologia($patologia){

            $query = "SELECT id FROM tipo_patologia WHERE descrizione = '$patologia'";
            $id = $this->getValue($query, "id");
            return $id;

        }

        function idTipoComplicanza($complicanza){

            $query = "SELECT id FROM tipo_complicanza WHERE descrizione = '$complicanza'";
            $id = $this->getValue($query, "id");
        }

        function idAccertamento($tempValue){
            #region if
            if($tempValue == "clin"){
                //chiedere!
            }
            elseif($tempValue == "CONV"){
                //chiedere!
            }
            elseif($tempValue == "CUP"){
                //chiedere!
            }
            elseif($tempValue == "DATAB"){
                $tempValue = "TEL";
            }
            elseif($tempValue == "DBASE"){
                $tempValue = "TEL";
            }
            elseif($tempValue == "eco"){
                $tempValue = "ECO";
            }
            elseif($tempValue == "eco*"){
                $tempValue = "ECO";
            }
            elseif($tempValue == "ECORI"){
                //chiedere!
            }
            elseif($tempValue == "ecorx"){
                $tempValue = "RX";
            }
            elseif($tempValue == "ECOtc"){
                $tempValue = "TAC";
            }
            elseif($tempValue == "RICOV"){
                //chiedere!
            }
            elseif($tempValue == "rxeco"){
                $tempValue = "RX";
            }
            elseif($tempValue == "TC"){
                $tempValue = "TAC";
            }
            elseif($tempValue == "TEL"){
                
            }
            #endregion

            $query = "SELECT id FROM tipo_accertamento WHERE descrizione = '$tempValue'";
            $id = $this->getValue($query, "id");
            return $id;
        }

        function idTipoIntervento($intervento){

            $query = "SELECT id FROM tipo_intervento WHERE descrizione = '$intervento'";
            $id = $this->getValue($query, "id");
            return $id;

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