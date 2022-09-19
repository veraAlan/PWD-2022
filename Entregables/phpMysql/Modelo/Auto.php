<?php
class Auto
{
    private $Patente;
    private $Marca;
    private $Modelo;
    private $DniDuenio;
    // private $Duenio; // TODO Obj de persona duenio. Only if Needed

    /**
     * Construct Function.
     * Initializes empty object.
     */
    public function __construct()
    {
        $this->Patente = "";
        $this->Marca = "";
        $this->Modelo = "";
        $this->DniDuenio = "";
    }

    /**
     * Load Function.
     * Loads values to each attribute of the class.
     * @param string $patente
     * @param string $marca
     * @param string $modelo
     * @param string $dniDuenio
     */
    public function load($patente, $marca, $modelo, $dniDuenio)
    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDniDuenio($dniDuenio);
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

    public function setDniDuenio($dniDuenio)
    {
        $this->DniDuenio = $dniDuenio;
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

    public function getDniDuenio()
    {
        return $this->DniDuenio;
    }
    // }

    // Miscellaneous

    // To String
    public function __toString()
    {
        return "Auto: " .
            "\n\tPatente: " . $this->getPatente() .
            "\n\tMarca: " . $this->getMarca() .
            "\n\tModelo: " . $this->getModelo() .
            "\n\tDueño: " . $this->getDniDuenio() . "\n";
    }
}
