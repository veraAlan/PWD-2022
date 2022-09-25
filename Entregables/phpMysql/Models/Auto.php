<?php
class Auto
{
    private $Patente;
    private $Marca;
    private $Modelo;
    private $Duenio; // Reference to a Person Object.

    /**
     * Construct Function.
     * Initializes empty object.
     */
    public function __construct()
    {
        $this->Patente = "";
        $this->Marca = "";
        $this->Modelo = "";
        $this->Duenio = "";
    }

    /**
     * Load Function.
     * Loads values to each attribute of the class.
     * @param string $patente
     * @param string $marca
     * @param string $modelo
     * @param int $duenio
     */
    public function setValues($patente, $marca, $modelo, $duenio)
    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDuenio($duenio);
    }

    // { Setters
    public function setPatente($patente)
    {
        $this->Patente = $patente;
    }

    public function setMarca($marca)
    {
        $this->Marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->Modelo = $modelo;
    }

    public function setDuenio($duenio)
    {
        $this->Duenio = $duenio;
    }

    public function setMessage($Mensaje)
    {
        $this->Mensaje = $Mensaje;
    }
    // }

    // { Getters
    public function getPatente()
    {
        return $this->Patente;
    }

    public function getMarca()
    {
        return $this->Marca;
    }

    public function getModelo()
    {
        return $this->Modelo;
    }

    public function getDuenio()
    {
        return $this->Duenio;
    }

    public function getMensaje()
    {
        return $this->Mensaje;
    }
    // }

    // TODO Re-define database functions
    /**
     * Loads the attributes of an specific person, found by its Patente
     * @return boolean
     */
    public function Load()
    {
        $ans = false;
        $db = new Database();
        $query = "SELECT * FROM auto WHERE Patente = " . $this->getPatente();

        if ($db->Start()) {
            $status = $db->Execute($query);
            if ($status > -1 && $status > 0) {
                $row = $db->Register();
                // Create a person object so we can find the Duenio object.
                $duenioObj = new Persona();
                $duenioObj->setNroDni($row['DniDuenio']);
                $duenioObj->Load();

                $this->setValues(
                    $row['Patente'],
                    $row['Marca'],
                    $row['Modelo'],
                    $duenioObj
                );

                $ans = true;
            }
        } else {
            $this->setMessage("Auto->Load: " . $db->getError());
        }

        return $ans;
    }

    /**
     * Inserts current object into database.
     * @return boolean
     */
    public function Insert()
    {
        $ans = false;
        $db = new Database();
        $query = "INSERT INTO auto(Patente, Marca, Modelo, Duenio) VALUES('" .
            $this->getPatente() . "', '" .
            $this->getMarca() . "', '" .
            $this->getModelo() . "', '" .
            $this->getDuenio()['NroDni'] . "');"; // TODO Test this call to the object.

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("Auto->Insert: " . $db->getError());
            }
        } else {
            $this->setMessage("Auto->Insert: " . $db->getError());
        }

        return $ans;
    }

    /**
     * Modifies a specific auto found by its Patente.
     * Overwrites database's auto with current auto's attributes
     * @return boolean 
     */
    public function Modify()
    {
        $ans = false;
        $db = new Database();
        $query = "UPDATE auto SET 
        Marca = '" . $this->getMarca() . "', 
        Modelo = '" . $this->getModelo() . "', 
        DniDuenio = '" . $this->getDniDuenio()['NroDni'] . "' 
        WHERE Patente = " . $this->getPatente(); // TODO Test this call to DniDuenio too.

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("Auto->Modify: " . $db->getError());
            }
        } else {
            $this->setMessage("Auto->Modify: " . $db->getError());
        }

        return $ans;
    }

    /**
     * Deletes a current entry in the database.
     * @return boolean
     */
    public function Delete()
    {
        $ans = false;
        $db = new Database();
        $query = "DELETE FROM auto WHERE Patente = " . $this->getPatente();

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("Persona->Delete: " . $db->getError());
            }
        } else {
            $this->setMessage("Persona->Delete: " . $db->getError());
        }

        return $ans;
    }

    /**
     * Lists every auto found that correlates to the condition entered.
     * @return array
     */
    public function List($condition = "")
    {
        $array = array();
        $db = new Database();
        $query = "SELECT * FROM auto ";
        if ($condition != "") {
            $query .= "WHERE " . $condition;
        }

        $ans = $db->Execute($query);
        if ($ans > -1) {
            if ($ans > 0) {
                while ($row = $db->Register()) {
                    $autoObj = new Auto();
                    // Create a duenio object from persona.
                    $duenioObj = new Persona();
                    $duenioObj->setNroDni($row['DniDuenio']);
                    $duenioObj->Load();

                    $autoObj->setValues(
                        $row['Patente'],
                        $row['Marca'],
                        $row['Modelo'],
                        $duenioObj
                    );
                    array_push($array, $autoObj);
                }
            }
        } else {
            $this->setMessage("Auto->List: " . $db->getError());
        }

        return $array;
    }

    // To String
    public function __toString()
    {
        return "Auto: " .
            "\n\tPatente: " . $this->getPatente() .
            "\n\tMarca: " . $this->getMarca() .
            "\n\tModelo: " . $this->getModelo() .
            "\n\tDueño: " . $this->getDuenio() . "\n";
    }
}
