<?php
namespace Interfaces;

interface IRepository {
    public function insert($entity);
    public function update($entity);
    public function delete($id);
    public function getById($id);
    public function getAll();
}
?>