<?php

class controlNumero{
    public function vernumero($input){
        if (!isset($input) && !is_numeric($input)) {
            $input = false;
        } else if($input == 0){
            $input = "cero";
        }

        return $input;
    }
}