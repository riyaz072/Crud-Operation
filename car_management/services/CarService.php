<?php
namespace Services;

use Repositories\CarRepository;
use Repositories\CompanyRepository;
use models\Car;

class CarService {
    private $carRepository;
    private $companyRepository;

    public function __construct(CarRepository $carRepository, CompanyRepository $companyRepository) {
        $this->carRepository = $carRepository;
        $this->companyRepository = $companyRepository;
    }

    public function createCar($name, $companyId) {
        $car = new Car($name, $companyId);
        $this->carRepository->insert($car);
    }

    public function updateCar($id, $name, $companyId) {
        $car = $this->carRepository->getById($id);
        if ($car) {
            $car->setName($name);
            $car->setCompanyId($companyId);
            $this->carRepository->update($car);
        }
    }

    public function deleteCar($id) {
        $this->carRepository->delete($id);
    }

    public function getCar($id) {
        return $this->carRepository->getById($id);
    }

    public function listCars() {
        return $this->carRepository->getAll();
    }

    public function listCompanies() {
        return $this->companyRepository->getAll();
    }
}
?>