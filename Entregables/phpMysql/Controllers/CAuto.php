<?php
class CAuto
{
    public function LoadObj($array)
    {
        $Auto = null;
        if (array_key_exists('Patente', $array) and array_key_exists('Marca', $array) and array_key_exists('Modelo', $array) and array_key_exists('DniDuenio', $array)) {
            $Persona = new Persona();
            $Persona->setNroDni($array['DniDuenio']);
            if ($Persona->Load()) {
                $Auto = new Auto();
                $Auto->setValues($array['Patente'], $array['Marca'], $array['Modelo'], $Persona);
            } else {
                $Auto = null;
            }
        }
        return $Auto;
    }

    public function LoadObjCl($array)
    {
        $Auto = null;
        if ("" != $array['Patente']) {
            $Auto = new Auto();
            $Auto->setPatente($array['Patente']);
            if (!$Auto->Load()) {
                $Auto = null;
            }
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

    // TODO rever
    public function Edit($array)
    {
        $aux = false;
        if ($this->Verify($array)) {
            $Auto = $this->LoadObj($array);
            if ($Auto != null and $Auto->Modify()) {
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
        $Auto = new Auto();
        $arrayAuto = $Auto->List($on);
        return $arrayAuto;
    }

    public function SearchD($array)
    {
        $arrayAuto = [];
        $on = " ";
        if (isset($array)) {
            $on = "DniDuenio = " . $array["NroDni"];
            $Auto = new Auto();
            $arrayAuto = $Auto->List($on);
        }
        return $arrayAuto;
    }
}
