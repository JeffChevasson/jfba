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
        $sql = "INSERT INTO ".$this->_tablename." (";
        foreach ($data as $name=>$value ) {
            $sql .="`$name`,";
        }

        $sql = substr($sql, 0, strlen($sql)-1);
        $sql .= ") VALUES (";
        foreach ($data as $name => $value){
            $value === null? $sql .= "null," : $sql .= "'$value',";
        }
        $sql = substr($sql, 0, strlen($sql)-1);
        $sql .= ");";
        var_dump($sql);

        return SQLConnection::getInstance()->query($sql);
    }

    /**
     * Methode de mise a jour de notre objet
     */
    public function update(){
        $attrs = EntityManager::getAttributes(Entity::class);
        $primaryKeyColValue = $attrs[$this->_primarykey];
        unset($this->_primarykey);

        $arrayValues = array_values($attrs);
        array_walk($arrayValues, function(&$value, $key){
            $value = "{$key} = '{$value}'";
        });

        $sUpdate = implode(", ", array_values($arrayValues));
        $sql = " UPDATE ".$this->_tablename." SET {$sUpdate} WHERE ".$this->_primarykey."= `$primaryKeyColValue` ";
        return SQLConnection::getInstance()->query($sql);
    }

    /**
     * Methode de suppression de notre objet
     */
    public function delete(){

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