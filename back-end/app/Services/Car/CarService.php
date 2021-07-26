<?php

namespace App\Services\Car;

use App\Repository\Car\CarRepository;
use App\Services\Crud\CrudServiceAbstract;
use CarServiceInterface;

class CarService extends CrudServiceAbstract implements CarServiceInterface
{
    public function __construct()
    {
        parent::__construct(new CarRepository());
    }
}
