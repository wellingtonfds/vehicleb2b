<?php

namespace App\Services\Car;

use App\Repositories\CarBrandRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;


class CarService extends CrudServiceAbstract implements CarServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new CarBrandRepository());
    }
}
