<?php

    require "column.php";

    class Paziente{

        public $data = array();

        public function __construct()
        {
            $this->id = new Column();
        }
        
    }

?>