<?php

class Persona
{
    private $NroDni;
    private $Apellido;
    private $Nombre;
    private $fechaNac;
    private $Telefono;
    private $Domicilio;
    private $Mensaje; // Mensaje de operacion (DB).

    /**
     * Construct Function.
     * Initializes empty object.
     */
    public function __construct()
    {
        $this->NroDni = "";
        $this->Apellido = "";
        $this->Nombre = "";
        $this->fechaNac = "";
        $this->Telefono = "";
        $this->Domicilio = "";
        $this->Mensaje = "";
    }

    /**
     * Load Function.
     * Loads values to each attribute of the class.
     * @param string $nombre
     * @param string $apellido
     * @param int $dni
     * @param string $nacimiento - '0000-00-00'
     * @param int $telefono
     * @param string $domicilio
     */
    public function setValues($nombre, $apellido, $dni, $nacimiento, $telefono, $domicilio)
    {
        $this->setNroDni($dni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($nacimiento);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
    }

    // { Setters
    public function setNroDni($dni)
    {
        $this->NroDni = $dni;
    }

    public function setApellido($apellido)
    {
        $this->Apellido = $apellido;
    }

    public function setNombre($nombre)
    {
        $this->Nombre = $nombre;
    }

    public function setFechaNac($fecha)
    {
        $this->fechaNac = $fecha;
    }

    public function setTelefono($telefono)
    {
        $this->Telefono = $telefono;
    }

    public function setDomicilio($domicilio)
    {
        $this->Domicilio = $domicilio;
    }

    public function setMessage($Mensaje)
    {
        $this->Mensaje = $Mensaje;
    }
    // }

    // { Getters
    public function getNroDni()
    {
        return $this->NroDni;
    }

    public function getApellido()
    {
        return $this->Apellido;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    public function getTelefono()
    {
        return $this->Telefono;
    }

    public function getDomicilio()
    {
        return $this->Domicilio;
    }

    public function getMensaje()
    {
        return $this->Mensaje;
    }
    // }

    /**
     * Loads the attributes of an specific person, found by its NroDni
     * @return boolean
     */
    public function Load()
    {
        $ans = false;
        $db = new Database();
        $query = "SELECT * FROM persona WHERE NroDni = '" . $this->getNroDni() . "'";

        if ($db->Start()) {
            $status = $db->Execute($query);
            if ($status > -1 && $status > 0) {
                $row = $db->Register();
                $this->setValues($row['Nombre'], $row['Apellido'], $row['NroDni'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                $ans = true;
            }
        } else {
            $this->setMessage("Persona->Load: " . $db->getError());
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
        $query = "INSERT INTO persona(NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio) VALUES('" .
            $this->getNroDni() . "', '" .
            $this->getApellido() . "', '" .
            $this->getNombre() . "', '" .
            $this->getFechaNac() . "', '" .
            $this->getTelefono() . "', '" .
            $this->getDomicilio() . "');";

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("Persona->Insert: " . $db->getError());
            }
        } else {
            $this->setMessage("Persona->Insert: " . $db->getError());
        }

        return $ans;
    }

    /**
     * Modifies a specific person found by its NroDni.
     * Overwrites database's person with current person's attributes
     * @return boolean 
     */
    public function Modify()
    {
        $ans = false;
        $db = new Database();
        $query = "UPDATE persona SET 
        Apellido = '" . $this->getApellido() . "', 
        Nombre = '" . $this->getNombre() . "', 
        fechaNac = '" . $this->getFechaNac() . "', 
        Telefono = '" . $this->getTelefono() . "', 
        Domicilio = '" . $this->getDomicilio() . "' 
        WHERE NroDni = " . $this->getNroDni();

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("Persona->Modify: " . $db->getError());
            }
        } else {
            $this->setMessage("Persona->Modify: " . $db->getError());
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
        $query = "DELETE FROM persona WHERE NroDni = " . $this->getNroDni();

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
     * Lists every person found that correlates to the condition entered.
     * @return array
     */
    public function List($condition = "")
    {
        $array = array();
        $db = new Database();
        $query = "SELECT * FROM persona ";
        if ($condition != "") {
            $query .= "WHERE " . $condition;
        }
        $ans = $db->Execute($query);
        if ($ans > -1) {
            if ($ans > 0) {
                while ($row = $db->Register()) {
                    $obj = new Persona();
                    $obj->setValues(
                        $row['Nombre'],
                        $row['Apellido'],
                        $row['NroDni'],
                        $row['fechaNac'],
                        $row['Telefono'],
                        $row['Domicilio']
                    );
                    array_push($array, $obj);
                }
            }
        } else {
            $this->setMessage("Persona->List: " . $db->getError());
        }

        return $array;
    }

    // To String.
    public function __toString()
    {
        return "Persona: " . $this->getNombre() . " " . $this->getApellido() .
            "\n\tDNI: " . $this->getNroDni() .
            "\n\tFecha de Nacimiento: " . $this->getFechaNac() .
            "\n\tTelefono: " . $this->getTelefono() .
            "\n\tDomicilio: " . $this->getDomicilio() . "\n";
    }
}
