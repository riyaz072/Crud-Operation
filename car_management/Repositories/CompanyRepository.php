<?php
namespace Repositories;

use Models\Company;
use Interfaces\IRepository;

class CompanyRepository extends AbstractRepository implements IRepository {
    public function insert($company) {
        $stmt = $this->prepare("INSERT INTO companies (name) VALUES (?)");
        $stmt->bind_param("s", $company->getName());
        $stmt->execute();
        $stmt->close();
    }

    public function update($company) {
        $stmt = $this->prepare("UPDATE companies SET name=? WHERE id=?");
        $stmt->bind_param("si", $company->getName(), $company->getId());
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->prepare("DELETE FROM companies WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getById($id) {
        $stmt = $this->prepare("SELECT * FROM companies WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $company = null;
        if ($row = $result->fetch_assoc()) {
            $company = new Company($row['name'], $row['id']);
        }
        $stmt->close();
        return $company;
    }

    public function getAll() {
        $result = $this->query("SELECT * FROM companies");
        $companies = [];
        while ($row = $result->fetch_assoc()) {
            $companies[$row['id']] = new Company($row['name'], $row['id']);
        }
        return $companies;
    }
}
?>