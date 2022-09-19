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
    public function load($nombre, $apellido, $dni, $nacimiento, $telefono, $domicilio)
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

    public function setMensaje($Mensaje)
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

    // TODO Database Functions.

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
