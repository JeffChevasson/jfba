<?php
namespace core;

/**
 * Class Entity : classe de base permettant de mettre en place la structure des modeles de notre site.
 * Dans cette classe on definirat entre autre les methodes permettant a l'entité de s'enregistrer en base, de se mettre
 * à jour ou alors de se supprimer
 */
class Model{

    /**
     * Le nom de la table associée a l'entité (requis)
     */
    protected $_tablename = "";

    /**
     * Nom de la clé primaire de la table. Par défaut on suppose que la clé est le champ 'id'
     */
    protected $_primarykey = "id";

    /**
     * @return mixed
     */
    public function getTablename()
    {
        return $this->_tablename;
    }

    /**
     * @return mixed
     */
    public function getPrimarykey()
    {
        return $this->_primarykey;
    }

    /**
     * Methode d'enregistrement en base de donnees de notre objet
     */
    public function save($data){
        $cols = $this->getTableCols();
        $sql = "INSERT INTO ".$this->_tablename." (";
        foreach ($data as $name => $value ) {
            // on n'enregistre pas une valeur dont la colonne n'existe pas en BDD
            if (in_array($name, $cols)) {
                $sql .= "`$name`,";
            }
        }

        $sql = substr($sql, 0, strlen($sql)-1);
        $sql .= ") VALUES (";
        foreach ($data as $name => $value){
            if (in_array($name, $cols)) {
                $value === null ? $sql .= "null," : $sql .= "'$value',";
            }
        }
        $sql = substr($sql, 0, strlen($sql)-1);
        $sql .= ");";

        return SQLConnection::getInstance()->query($sql);
    }

    /**
     * Methode de mise a jour de notre objet
     */
    public function update($data){
        $cols = $this->getTableCols();

        //$arrayValues = array_values($data);
        $pkeyValue = $data[$this->_primarykey];

        $vals = array();
        foreach ($data as $key => $value){
            if (in_array($key, $cols)) {
                $vals[] = " $key='$value' ";
            }
        }

        $sUpdate = implode(", ", $vals);
        $sql = "UPDATE ".$this->_tablename." SET {$sUpdate} WHERE ".$this->_primarykey."='$pkeyValue' ";
        return SQLConnection::getInstance()->query($sql);
    }

    /**
     * Methode de suppression de notre objet
     */
    public function delete($objId){
        $sql = "DELETE FROM ".$this->_tablename." WHERE ".$this->_primarykey."=".$objId;
        return SQLConnection::getInstance()->query($sql);
    }

    /**
     * Renvoie les colonnes de la table mysql
     */
    public function getTableCols(){
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name='".$this->_tablename."'";
        $rows = SQLConnection::getInstance()->query($sql);
        $cols = array();
        foreach ($rows as $row){
            $cols[] = $row["COLUMN_NAME"];
        }
        return $cols;
    }
}