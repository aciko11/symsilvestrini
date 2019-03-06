<?php

    class FindMatch{

        function idMedico($tempValue){
            #region if

            if($tempValue == "CAO"){
                $tempValue = "Prof. P.Cao";
            }
            elseif($tempValue == "CAO/CARLINI"){
                $tempValue = "Prof. P.Cao";
            }
            elseif($tempValue == "PROF.P CAO"){
                $tempValue = "Prof. P.Cao";
            }
            elseif($tempValue == "CARLINI"){
                $tempValue = "Dott.  Carlini";
            }
            elseif($tempValue == "CARLNI"){
                $tempValue = "Dott.  Carlini";
            }
            elseif($tempValue == "CARLINI/DE RANGO"){
                $tempValue = "Dott.  Carlini";
            }
            elseif($tempValue == "CERI"){
                $tempValue = "Dott. Cieri";
            }
            elseif($tempValue == "CIERI"){
                $tempValue = "Dott. Cieri";
            }
            elseif($tempValue == "COSCARELLA"){

            }
            elseif($tempValue == "GIORDANO"){
                $tempValue = "Dott.  Giordano";
            }
            elseif($tempValue == "IACONO"){

            }
            elseif($tempValue == "LENTI"){
                $tempValue = "Dott. Lenti";
            }
            elseif($tempValue == "PARENTE"){
                $tempValue = "Dott. Parente";
            }
            elseif($tempValue == "PARLANI"){
                $tempValue = "Dott. Parlani";
            }
            elseif($tempValue == "ROMANO"){
                $tempValue = "Dott. Romano";
            }
            elseif($tempValue == "TAVOLINI"){

            }
            elseif($tempValue == "VERZINI"){
                $tempValue = "Dott. Verzini";
            }
            elseif($tempValue == "VARZINI"){
                $tempValue = "Dott. Verzini";
            }
            else{
                $tempValue = "migrato-ND";
            }
            #endregion
           
            $query = "SELECT id FROM medico WHERE nome = '$tempValue'";
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
            return $id;
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
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "DBASE"){
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "eco"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "eco*"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "ECORI"){
                //chiedere!
            }
            elseif($tempValue == "ecorx"){
                $tempValue = "RX";
            }
            elseif($tempValue == "ECOtc"){
                $tempValue = "TC";
            }
            elseif($tempValue == "RICOV"){
                //chiedere!
            }
            elseif($tempValue == "rxeco"){
                $tempValue = "RX";
            }
            elseif($tempValue == "TC"){
                $tempValue = "TC";
            }
            elseif($tempValue == "TEL"){
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "tel"){
                $tempValue = "Controllo Telefonico";
            }
            else{
                $tempValue = "migrato-ND";
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

        function idTipoDecesso($column){
            $decesso = null;

            #region if
            if($column == "AF"){
                $decesso = "Aortica"; //email "tutto da decidere"
            }
            elseif($column == "AI"){
                $decesso = "Cardiaca";
            }
            elseif($column == "AJ"){
                $decesso = "Cerebrovascolari";
            }
            elseif($column == "AK"){
                $decesso = "Polmonari";
            }
            elseif($column == "AL"){
                $decesso = "Gastrointestinali";
            }
            elseif($column == "AM"){
                $decesso = "Renali";
            }
            elseif($column == "AN"){
                $decesso = "Cancro";
            }
            elseif($column == "AO"){
                $decesso = "Altro";
            }
            elseif($column == "AP"){
                $decesso = "Rottura AAA";
            }
            #endregion

            $query = "SELECT id FROM causa_decesso WHERE descrizione = '$decesso'";
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