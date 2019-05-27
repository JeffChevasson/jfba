<?php

class EntityManager{

    public static function find($class, array $criteria = array(), array $order = array()){
        $rows = self::select($class, $criteria, $order);
        $listeEntites = array();
        foreach ($rows as $row){
            $listeEntites[] = self::to_object($row, $class);
        }
        return $listeEntites;
    }

    public static function findOne($class, array $criteria){
        $listeEntites = self::find($class, $criteria);
        if (count($listeEntites) > 0){
            return $listeEntites[0];
        }
        return array();
    }

    /**
     * Methode permettant de convertir un tableau associatif en objet
     *
     * @param array le tableau associatif des donnees
     * @param string
     * @return mixed
     */
    public static function to_object(array $array, $class = 'stdClass')
    {
        $object = new $class;
        foreach ($array as $key => $value)
        {
            if (is_array($value))
            {
                $value = self::to_object($value, $class);
            }
            $item = str_replace($key, '', ucwords($key, "_"));
            $item = str_replace('_', "", $item);
            $item = str_replace('-', "", $item);
            // Add the value to the object
            if (method_exists($object, "set$item")){
                $func = "set$item";
                $object->$func($value);
            }else{
                if ($key == "PostId"){
                    $func = "setPost";
                    $value = self::findOne(Post::class, array("id" => $value));
                    $object->$func($value);
                }
            }
        }
        return $object;
    }

    /**
     * Methode pour recuperer les attributs et les valeurs de la classe sauf ceux commencant par _
     */
    /*public static function getAttributes($class){
        $entity = new $class;
        $data = array();
        $arr = get_class_vars($class);
        foreach ($arr as $item => $value){
            if (strpos($item, "_") >= 0){
                continue;
            }
            // convertit les attributs du genre monAttr en mon_attr
            //$item = strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $item));
            $item = str_replace($item, '', ucwords($item, "_"));
            $data[$item] = $value;
        }
        return $data;
    }*/

    /**
     * Methode de selection des objets de la table
     */
    private static function select($class, array $criteria, array $order){
        $entity = new $class;
        $cols = $entity->getTableCols();
        $selSQL = "select ".implode(",", $cols)." from ". $entity->getTableName();
        $where = array();
        if (count($criteria) > 0){
            foreach ($criteria as $col => $val){
                $where[] = " $col='$val' ";
            }
            $selSQL .= " WHERE ".implode(" AND ", $where);
        }

        if (count($order) > 0){
            $selSQL = " ORDER BY ";
            $orderCols = array();
            foreach ($order as $col => $ordre){
                $orderCols[] = " $col $ordre ";
            }
            $selSQL .= implode(",", $orderCols);
        }
        return SQLConnection::getInstance()->query($selSQL);
    }
}