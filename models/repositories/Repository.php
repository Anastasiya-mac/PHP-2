<?php
namespace models\repositories;

use services\Db;

abstract class Repository 
{
    protected $db;
    protected $tablename;

    public function __construct() 
    {
        $this->db = Db::getInstance();
        $this->tablename = $this->getTableName();
    }

    
    public function getById(int $id)
    {
        $tablename = $this->getTableName();
        $sql = "SELECT * FROM {$tablename} WHERE id = :id";
        return  $this->getQuery($sql, [':id' => $id])[0];
    }

    public function getAll()
    {
        $tablename = $this->getTableName();
        $sql = "SELECT * FROM {$tablename}";
        return  $this->getQuery($sql,[]);
    }

    protected function getQuery($sql, $params = []) {
        return Db::getInstance()->queryAll($sql,$params, $this->getRecordClassname());
    }

    public function delete(Record $record) {
        $tablename = $this->getTableName();
        $sql = "DELETE FROM {$tablename} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $record->id]);
    }

    public function save(Record $record) {
    
        $id = $record->id;
        $data = $this->getById($id);
   
        if ($data == $this) {
            echo 'Дублирование информации';
        }
        elseif (is_null($data)) {
            echo 'insert';
            $this->insert($record);
        }
        else {
            echo 'update';
            $this->update($record);
        }

}

    public function insert(Record $record) {
        $tablename = $this->getTableName();
        $params = [];
        $column = [];
        
        foreach($record as $key=>$value) {
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

    public function update(Record $record) {
        $tablename = $this->getTableName();
       
        $params = [];
        $column = [];

        $id = $this->id;
        $data = $this->getById($id);

        foreach($record as $key=>$value) {
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
    

    public function post($name) {
        return $_POST[$name];
    }


    abstract public function getTableName(): string;

    abstract public function getRecordClassname(): string;
}