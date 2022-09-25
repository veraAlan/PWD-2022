<?php
class Auto
{

    public function LoadObj($array)
    {
        $Auto = null;
        if (array_key_exists('Patente', $array) and array_key_exists('Marca', $array) and array_key_exists('Modelo', $array) and array_key_exists('DniDuenio', $array)) {
            $Auto = new Auto();
            if (!$Auto->Load($array['Patente'], $array['Marca'], $array['Modelo'], $array['DniDuenio'])) {
                $Auto = null;
            }
        }
        return $Auto;
    }


    public function LoadObjCl($array)
    {
        $Auto = null;
        if (isset($array['Patente'])) {
            $Auto = new Auto();
            $Auto->Search($array['Patente']);
        }
        return $Auto;
    }


    public function Verify($array)
    {
        $aux = false;
        if (isset($array['Patente'])) {
            $aux = true;
        }
        return $aux;
    }


    public function Add($array)
    {
        $aux = false;
        $Auto = $this->LoadObj($array);
        if ($Auto != null) {
            if ($Auto->Insert()) {
                $aux = true;
            }
        }
        return $aux;
    }


    public function Delete($array)
    {
        $aux = false;
        if ($this->Verify($array)) {
            $Auto = $this->LoadObjCl($array);
            if ($Auto != null and $Auto->Delete()) {
                $aux = true;
            }
        }

        return $aux;
    }


    public function Edit($array)
    {
        //echo "Estoy en modificacion";
        $aux = false;
        if ($this->Verify($array)) {
            $Auto = $this->LoadObj($array);
            if ($Auto != null and $Auto->Edit($array)) {
                $aux = true;
            }
        }
        return $aux;
    }


    public function Search($array)
    {
        $on = " true ";
        if ($array <> null) {
            if (isset($array['Patente'])) {
                $on .= " and Patente ='" . $array['Patente'] . "'";
            }
        }
        $Auto = new auto();
        $arrayAuto = $Auto->List($on);
        return $arrayAuto;
    }


    public function SearchD($array)
    {
        $arrayAuto = [];
        $on = " ";
        if (isset($array)) {
            $on = "DniDuenio = " . $array["NroDni"];
            $Auto = new auto();
            $arrayAuto = $Auto->List($on);
        }
        return $arrayAuto;
    }
}
