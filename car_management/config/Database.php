<?php
namespace Config;

class Database {
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $databaseName = 'car_management';

    private function __construct() {
        $this->connection = new \mysqli($this->host, $this->user, $this->password, $this->databaseName);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>