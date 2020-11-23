<?php

namespace models;
use interfaces\ModelInterface;
use services\Db;

abstract class Record implements ModelInterface
{
    protected $db;
    protected $tablename;

    public function __construct() 
    {
        $this->db = Db::getInstance();
        $this->tablename = static::getTableName();
    }

    public static function getById(int $id)
    {
        $tablename = static::getTableName();
        $sql = "SELECT * FROM {$tablename} WHERE id = :id";
        return  static::getQuery($sql, [':id' => $id])[0];
    }

    public static function getAll()
    {
        $tablename = static::getTableName();
        $sql = "SELECT * FROM {$tablename}";
        return  static::getQuery($sql,[]);
    }

    protected static function getQuery($sql, $params = []) {
        return Db::getInstance()->queryAll($sql,$params, get_called_class());
    }

    public function delete() {
        $tablename = static::getTableName();
        $sql = "DELETE FROM {$tablename} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function save() {
    
        $id = $this->id;
        $data = $this->getById($id);
   
        if ($data == $this) {
            echo 'Дублирование информации';
        }
        elseif (is_null($data)) {
            echo 'insert';
            $this->insert();
        }
        else {
            echo 'update';
            $this->update();
        }

}

    public function insert() {
        $tablename = static::getTableName();
        $params = [];
        $column = [];
        
        foreach($this as $key=>$value) {
           if(in_array($key, ['db', 'tablename'])) {
               continue;
           }
           $params[":{$key}"] = $value;
           $column[] = $key;
        }
        $placeholder = implode(",", array_keys($params));
        $columns = implode(",", $column);
        $sql = "INSERT INTO {$tablename} ({$columns}) VALUES ({$placeholder})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
        
    }

    public function update() {
        $tablename = static::getTableName();
       
        $params = [];
        $column = [];

        $id = $this->id;
        $data = $this->getById($id);

        foreach($this as $key=>$value) {
            if(in_array($key, ['db', 'tablename'])) {
               continue;
                           }
            $newInf["{$key}"] = $value;
            }
            foreach($data as $key=>$value) {
                if(in_array($key, ['db', 'tablename'])) {
                   continue;
               }
            $oldInf["{$key}"] = $value;
            }
            
            $diff = array_diff($newInf, $oldInf);

            foreach($diff as $key=>$value) {
                if(in_array($key, ['db', 'tablename'])) {
                   continue;
               }
            $params[":{$key}"] = $value;
            $column[] = $key . "=:{$key}";
            }
            $params += [':id'=>$id];

        $columns = implode(",", $column);
        $sql = "UPDATE {$tablename} SET {$columns} WHERE id = :id";
        $this->db->execute($sql, $params);
    }

    public function create() {}
}