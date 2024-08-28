<?php
namespace Models;

class Car {
    private $id;
    private $name;
    private $companyId;

    public function __construct($name, $companyId, $id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->companyId = $companyId;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCompanyId() {
        return $this->companyId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCompanyId($companyId) {
        $this->companyId = $companyId;
    }
}
?>