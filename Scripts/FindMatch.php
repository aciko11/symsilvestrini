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
                $tempValue = "Dott. Coscarella";
            }
            elseif($tempValue == "GIORDANO"){
                $tempValue = "Dott.  Giordano";
            }
            elseif($tempValue == "IACONO"){
                $tempValue = "Dott. Iacono";
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
                $tempValue = "Dott. Tavolini";
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
            echo("<br>".$query);
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
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "CONV"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "CUP"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "DATAB"){
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "datab"){
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "DBASE"){
                $tempValue = "Controllo Telefonico";
            }
            elseif($tempValue == "eco"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "Eco"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "eco*"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "ECO"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "ECORI"){
                $tempValue = "Ecografia";
                //da aggiungere anche rx
            }
            elseif($tempValue == "ecorx"){
                $tempValue = "RX";
                //da aggiungere anche la ecografia
            }
            elseif($tempValue == "ecoRx"){
                $tempValue = "RX";
                //da aggiungere anche la ecografia
            }
            elseif($tempValue == "ECORX"){
                $tempValue = "RX";
                //da aggiungere anche la ecografia
            }
            elseif($tempValue == "ECOrx"){
                $tempValue = "RX";
                //da aggiungere anche la ecografia
            }
            elseif($tempValue == "rxeco"){
                $tempValue = "RX";
            }
            elseif($tempValue == "RICOV"){
                $tempValue = "Ecografia";
            }
            elseif($tempValue == "TC"){
                $tempValue = "TC";
            }
            elseif($tempValue == "Tc"){
                $tempValue = "TC";
            }
            elseif($tempValue == "tc"){
                $tempValue = "TC";
            }
            elseif($tempValue == "Tac"){
                $tempValue = "TC";
            }
            elseif($tempValue == "ECOtc"){
                $tempValue = "TC";
            }
            elseif($tempValue == "ECOTC"){
                $tempValue = "TC";
            }
            elseif($tempValue == "ecoTC"){
                $tempValue = "TC";
            }
            elseif($tempValue == "ecotc"){
                $tempValue = "TC";
            }
            elseif($tempValue == "Ecotc"){
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
                $decesso = "Cardiovascolari";
            }
            elseif($column == "AJ"){
                $decesso = "Cerebrovascolari";
            }
            elseif($column == "AK"){
                $decesso = "Polmonari";
            }
            elseif($column == "AL"){
                $decesso = "Gastrintestinali";
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

        function idAtc($column){
            $code = "";
            if($column == "ASAPost"){
                $code = "B01AC06";
            }
            elseif($column == "TiklidPost"){
                $code = "B01AC05";
            }
            elseif($column == "PlavixPost"){
                $code = "B01AC04";
            }
            elseif($column == "Anticoagulanti"){
                $code = "B01AF";
            }
            elseif($column == "CoumadinPost"){
                $code = "B01AA03";
            }
            elseif($column == "EBPMPost"){
                $code = "B01AB";
            }

            $query = "SELECT id FROM atc WHERE class = '$code'";
            $id = $this->getValue($query, "id");
            return $id;
        }

        function accesso($value){
            if($value == "Dx"){
                $value = "Dx";
            }
            else if($value == "DX"){
                $value = "Dx";
            }
            else if($value == "dX"){
                $value = "Dx";
            }
            else if($value == "dx"){
                $value = "Dx";
            }
            else if($value == "Sx"){
                $value = "Sx";
            }
            else if($value == "SX"){
                $value = "Sx";
            }
            else if($value == "sX"){
                $value = "Sx";
            }
            else if($value == "sx"){
                $value = "Sx";
            }
            return $value;
        }

        //this method gets called by the others to perform the select query
        function getValue($query, $assocName){
            global $connect;
            
            $result = mysqli_query($connect, $query) or die (mysqli_error($connect));
            $row = mysqli_fetch_assoc($result);
            $value = $row[$assocName];
            return $value;
        }

    }



?>