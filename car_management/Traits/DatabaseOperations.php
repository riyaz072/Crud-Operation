<?php
namespace Traits;

trait DatabaseOperations {
    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }
}
?>