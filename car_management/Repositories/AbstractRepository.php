<?php
namespace Repositories;

include_once '../Traits/DatabaseOperation.php';

use Config\Database;
use Traits\DatabaseOperations;

abstract class AbstractRepository {
    use DatabaseOperations;

    protected $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    abstract public function insert($entity);
    abstract public function update($entity);
    abstract public function delete($id);
    abstract public function getById($id);
    abstract public function getAll();
}


?>