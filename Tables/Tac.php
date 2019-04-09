<?php


class Visita{
    public $tempDataTac = array();

    function create($sheet, $rowOffset){
        
        //colonna CW
        $tempData = new Column;
        $tempData->colName = "aorta_DiamSopraRenale";
        $tempData->colValue = $sheet->getCell('CW'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna CX
        $tempData = new Column;
        $tempData->colName = "collSup_Diam";
        $tempData->colValue = $sheet->getCell('CX'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna CY
        $tempData = new Column;
        $tempData->colName = "collSup_Lungh";
        $tempData->colValue = $sheet->getCell('CY'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna CZ
        $tempData = new Column;
        $tempData->colName = "collSup_TromboCirconf";
        $tempData->colValue = $sheet->getCell('CZ'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DA
        $tempData = new Column;
        $tempData->colName = "aneuAortico_Diam";
        $tempData->colValue = $sheet->getCell('DA'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DB
        $tempData = new Column;      
        $tempData->colName = "aorta_DiamSopraRenale";   //controllare per sicurezza
        $tempData->colValue = $sheet->getCell('DB'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DC
        $tempData = new Column;
        $tempData->colName = "aorta_Lungh";
        $tempData->colValue = $sheet->getCell('DC'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DD
        $tempData = new Column;
        $tempData->colName = "aneuAortico_Trombo";  //controllare per sicurezza
        $tempData->colValue = $sheet->getCell('DD'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DE
        $tempData = new Column;
        $tempData->colName = "aorta_DiamDistale";
        $tempData->colValue = $sheet->getCell('DE'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DF
        $tempData = new Column;
        $tempData->colName = "collIliacoComDx_Diam";
        $tempData->colValue = $sheet->getCell('DF'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DG
        $tempData = new Column;
        $tempData->colName = "collIliacoComSx_Diam";
        $tempData->colValue = $sheet->getCell('DG'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DH
        $tempData = new Column;
        $tempData->colName = "iliacaComDx_Diam";    //controllare per sicurezza, al posto del _Diam ci vorrebbe la lunghezza
        $tempData->colValue = $sheet->getCell('DH'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DI
        $tempData = new Column;
        $tempData->colName = "iliacaComSx_Diam";    //controllare per sicurezza, al posto del _Diam ci vorrebbe la lunghezza
        $tempData->colValue = $sheet->getCell('DI'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DJ
        $tempData = new Column;
        $tempData->colName = "iliacaEstDx_Diam";
        $tempData->colValue = $sheet->getCell('DJ'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DK
        $tempData = new Column;
        $tempData->colName = "iliacaEstSx_Diam";
        $tempData->colValue = $sheet->getCell('DK'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DL
        $tempData = new Column;
        $tempData->colName = "iliacaComDx_Aneu";
        $tempData->colValue = $sheet->getCell('DL'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DM
        $tempData = new Column;
        $tempData->colName = "iliacaComSx_Aneu";
        $tempData->colValue = $sheet->getCell('DM'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DN
        $tempData = new Column;
        $tempData->colName = "ipogasSx_Aneu";   //quale di questi 2?
        $tempData->colName = "ipogasDx_Aneu";   //sul cook è semplicemente aneurisma ipogastrico
        $tempData->colValue = $sheet->getCell('DN'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DO
        $tempData = new Column;
        $tempData->colName = "artRenDx_Stenosi";    //da ricontrollare
        $tempData->colValue = $sheet->getCell('DO'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DP
        $tempData = new Column;
        $tempData->colName = "artRenSx_Stenosi";    //da ricontrollare come sopra
        $tempData->colValue = $sheet->getCell('DP'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DQ
        $tempData = new Column;
        $tempData->colName = "iliacaEstDx_Occlus";  //da ricontrollare non c'è l'Est sul cook
        $tempData->colValue = $sheet->getCell('DQ'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DR
        $tempData = new Column;
        $tempData->colName = "iliacaEstDx_Occlus";  //da ricontrollare come sopra    
        $tempData->colValue = $sheet->getCell('DR'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DS
        $tempData = new Column;
        $tempData->colName = "";    //CLASSIFICAZIONE????
        $tempData->colValue = $sheet->getCell('DS'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DT
        $tempData = new Column;
        $tempData->colName = "collSup_Ang"; //da ricontrollare, nel cook non c'è il Sup
        $tempData->colValue = $sheet->getCell('DT'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DU
        $tempData = new Column;
        $tempData->colName = "aorta_AngBiforc";
        $tempData->colValue = $sheet->getCell('DU'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DV
        $tempData = new Column;
        $tempData->colName = "";    //angolazione iliaca dx
        $tempData->colValue = $sheet->getCell('DV'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DW
        $tempData = new Column;
        $tempData->colName = "";    //angolazione iliaca sx
        $tempData->colValue = $sheet->getCell('DW'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DX
        $tempData = new Column;
        $tempData->colName = "aorta_CalcioCirconf";
        $tempData->colValue = $sheet->getCell('DX'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DY
        $tempData = new Column;
        $tempData->colName = "aorta_CalcioNonCirconf";
        $tempData->colValue = $sheet->getCell('DY'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna DZ
        $tempData = new Column;
        $tempData->colName = "collIliacoComDx_CalcioCirconf";   //da ricontrollare, calciocirconferenzialeiliaca
        $tempData->colValue = $sheet->getCell('DZ'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        //colonna EA
        $tempData = new Column;
        $tempData->colName = "collIliacoComDx_CalcioNonCirconf";    //da ricontrollare, come sopra
        $tempData->colValue = $sheet->getCell('EA'.$rowOffset)->getValue();;
        $this->tempDataTac[] = $tempData;

        
    }
}



?>