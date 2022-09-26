<?php

/**
 * Class database
 */
class Database extends PDO
{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private $debug;
    private $status; // Connection status.
    private $index;
    private $response;

    /**
     * Construct Function
     */
    public function __construct()
    {
        $this->engine = "mysql";
        $this->host = "localhost";
        $this->database = "infoautos"; // Name of the current db.
        $this->user = "root";
        $this->pass = "140519"; // TODO add pass.
        $this->debug = true;
        $this->error = "";
        $this->query = "";
        $this->index = 0;

        $dns = $this->engine . ":dbname=" . $this->database . ";host=" . $this->host;
        try {
            parent::__construct($dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->status = true;
        } catch (PDOException $e) {
            $this->query = $e->getMessage();
            $this->status = false;
        }
    }

    /**
     * Get database status.
     */
    public function Start()
    {
        return $this->getStatus();
    }

    // Setters
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    public function setError($e)
    {
        $this->error = $e;
    }

    public function setQuery($variable)
    {
        return "\n" . $this->query = $variable;
    }

    public function setIndex($newIndex)
    {
        $this->index = $newIndex;
    }

    public function setResponse($array)
    {
        $this->response = $array;
    }

    // Getters
    public function getStatus()
    {
        return $this->status;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getQuery()
    {
        return "\n" . $this->query;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getResponse()
    {
        return $this->response;
    }

    // Database Functions
    /**
     * Check debug contents.
     */
    public function checkDebug()
    {
        $e = $this->errorInfo();
        $this->setError($e);
        if ($this->getDebug()) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }

    /**
     * Execute the query sent to DB.
     * @param string $query
     */
    public function Execute($query)
    {
        if (stristr($query, "insert")) {
            $ans = $this->Insert($query);
        }
        if (stristr($query, "update") || stristr($query, "delete")) {
            $ans = $this->DeleteUpdate($query);
        }
        if (stristr($query, "select")) {
            $ans = $this->Select($query);
        }
        return $ans;
    }

    /**
     * Executes the query for Insert and returns the id of the entry.
     * @return int
     */
    public function Insert($query)
    {
        $objState = parent::query($query);
        if (!$objState) {
            $this->checkDebug();
            $id = 0;
        } else {
            $id = $this->lastInsertId();
            if ($id == 0) {
                $id = -1;
            }
        }
        return $id;
    }

    /**
     * Executes the query for Delete/Update and returns the new amount of rows.
     * @return int
     */
    public function DeleteUpdate($query)
    {
        $objState = parent::query($query);
        $rows = -1;
        if (!$objState) {
            $this->checkDebug();
        } else {
            $rows = $objState->rowCount();
        }
        return $rows;
    }

    /**
     * Executes the query for Select and returns the amount of rows selected.
     * @return int
     */
    public function Select($query)
    {
        $rows = -1;
        $objState = parent::query($query);
        if (!$objState) {
            $this->checkDebug();
        } else {
            $response = $objState->fetchAll();
            $rows = count($response);
            $this->setIndex(0);
            $this->setResponse($response);
        }
        return $rows;
    }

    /**
     * Gets the register of a specific index/id.
     * Returns the values in that row.
     * @return int
     */
    public function Register()
    {
        $currentRow = false;
        $currentIndex = $this->getIndex();
        if ($currentIndex >= 0) {
            $rows = $this->getResponse();
            if ($currentIndex < count($rows)) {
                $currentRow = $rows[$currentIndex];

                $currentIndex++;
                $this->setIndex($currentIndex);
            } else {
                $this->setIndex(-1);
            }
        }

        return $currentRow;
    }
}
