<?php
require_once '../config/Database.php';
require_once '../traits/DatabaseOperations.php';
require_once '../interfaces/IRepository.php';
require_once '../repositories/AbstractRepository.php';
require_once '../models/Car.php';
require_once '../models/Company.php';
require_once '../repositories/CarRepository.php';
require_once '../repositories/CompanyRepository.php';
require_once '../services/CarService.php';

use Repositories\CarRepository;
use Repositories\CompanyRepository;
use Services\CarService;

$carRepository = new CarRepository();
$companyRepository = new CompanyRepository();
$carService = new CarService($carRepository, $companyRepository);

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'create':
        $name = $_POST['name'] ?? '';
        $companyId = $_POST['company_id'] ?? 0;
        $carService->createCar($name, $companyId);
        break;
    case 'update':
        $id = $_POST['id'] ?? 0;
        $name = $_POST['name'] ?? '';
        $companyId = $_POST['company_id'] ?? 0;
        $carService->updateCar($id, $name, $companyId);
        break;
    case 'delete':
        $id = $_GET['id'] ?? 0;
        $carService->deleteCar($id);
        break;
    case 'view':
        $id = $_GET['id'] ?? 0;
        $car = $carService->getCar($id);
        // render view page with $car details
        break;
    case 'list':
    default:
        $cars = $carService->listCars();
        $companies = $carService->listCompanies();
        // render list page with $cars and $companies
        print_r($cars);
        break;
}
?>