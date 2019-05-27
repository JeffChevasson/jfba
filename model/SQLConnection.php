<?php

require_once "config/parametres.php";

class SQLConnection
{

    /**
     * @var SQLConnection
     * @access private
     * @static
     */
    private static $_instance = null;

    private $link;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct()
    {
        $this->link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return SQLConnection
     */
    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new SQLConnection();
        }

        return self::$_instance;
    }


    public function query($sql){
        $firstWord = explode(" ", $sql);
        $firstWord = strtolower($firstWord[0]);
        $result = $this->link->query($sql);
        if (($firstWord == "insert") || ($firstWord == "update")|| ($firstWord == "delete")){
            return $this->link->affected_rows;
        }

        $results_array = array();
        while ($row = $result->fetch_assoc()) {
            $results_array[] = $row;
        }
        return $results_array;
    }
}