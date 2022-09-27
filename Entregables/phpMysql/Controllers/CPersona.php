<?php
class CPersona
{
    public function LoadObj($array)
    {
        $Persona = null;
        if (array_key_exists('NroDni', $array) and array_key_exists('Apellido', $array) and array_key_exists('Nombre', $array) and array_key_exists('fechaNac', $array) and array_key_exists('Telefono', $array) and array_key_exists('Domicilio', $array)) {
            $Persona = new Persona();
            $Persona->setValues($array['NroDni'], $array['Apellido'], $array['Nombre'], $array['fechaNac'], $array['Telefono'], $array['Domicilio']);
        }
        return $Persona;
    }

    public function LoadObjCl($array)
    {
        $Persona = null;
        if (isset($array['NroDni'])) {
            $Persona = new Persona();
            $Persona->setNroDni($array['NroDni']);
            if (!$Persona->Load()) {
                $Persona = null;
            }
        }
        return $Persona;
    }

    public function Verify($array)
    {
        $aux = false;
        if (isset($array['NroDni']))
            $aux = true;
        return $aux;
    }

    public function Add($array)
    {
        $aux = false;
        $Persona = $this->LoadObj($array);
        if ($Persona != null and $Persona->Insert()) {
            $aux = true;
        }
        return $aux;
    }

    public function Delete($array)
    {
        $aux = false;
        if ($this->Verify($array)) {
            $Persona = $this->LoadObjCl($array);
            if ($Persona != null and $Persona->Delete()) {
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
            $Persona = $this->LoadObj($array);
            if ($Persona != null and $Persona->Edit($array)) {
                $aux = true;
            }
        }
        return $aux;
    }

    public function Search($array)
    {
        $on = " true ";
        if ($array <> NULL) {
            if (isset($array['NroDni']))
                $on .= " and NroDni =" . $array['NroDni'];
        }
        $Persona = new persona();
        $arrayList = $Persona->List($on);
        return $arrayList;
    }
}
