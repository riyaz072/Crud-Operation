<?php
namespace Repositories;

use Models\Car;
use Interfaces\IRepository;

class CarRepository extends AbstractRepository implements IRepository {
    public function insert($car) {
        $stmt = $this->prepare("INSERT INTO cars (name, company_id) VALUES (?, ?)");
        $carName = $car->getName();
        $carCompany = $car->getCompanyId();
        $stmt->bind_param("si",$carName, $carCompany);
        $stmt->execute();   
        $stmt->close();
    }

    public function update($car) {
        $stmt = $this->prepare("UPDATE cars SET name=?, company_id=? WHERE id=?");
        $stmt->bind_param("sii", $car->getName(), $car->getCompanyId(), $car->getId());
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->prepare("DELETE FROM cars WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getById($id) {
        $stmt = $this->prepare("SELECT * FROM cars WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $car = null;
        if ($row = $result->fetch_assoc()) {
            $car = new Car($row['name'], $row['company_id'], $row['id']);
        }
        $stmt->close();
        return $car;
    }

    public function getAll() {
        $result = $this->query("SELECT * FROM cars");
        $cars = [];
        while ($row = $result->fetch_assoc()) {
            $cars[] = new Car($row['name'], $row['company_id'], $row['id']);
        }
        return $cars;
    }
}
?>