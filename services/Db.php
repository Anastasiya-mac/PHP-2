<?php

namespace services;
use traits\Singleton;

class Db
{
    use Singleton;
    public $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'GB_DB_PHP',
        'charset' => 'utf8'
    ];

    private $connection = null;

    protected function getConnection() {
        if (is_null($this->connection)) {
            $this->connection = new \PDO($this->buildDsnString(), $this->config['login'], $this->config['password']);
           $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
         //  $this->connection->setFetchMode(PDO::FETCH_CLASS, '\\');
        }
        return $this->connection;
    }

    private function buildDsnString() {
        return sprintf('%s:host=%s;dbname=%s;charset=%s', 
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']);
    }

    private function query(string $sql, array $params=[]) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
        
    }

    public function queryOne(string $sql, array $params=[]) {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params=[]) {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute(string $sql, array $params=[]) {
        return $this->query($sql, $params)->rowCount();
    }
}