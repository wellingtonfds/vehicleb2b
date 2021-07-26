<?php

namespace App\Repository\Car;

use App\Repository\Crud\CrudRepositoryAbstract;

class CarRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(Car::class);
    }
}
