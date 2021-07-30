<?php

namespace App\Services\Car\Model;

use App\Repositories\CarModelRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;


class CarModelService extends CrudServiceAbstract implements CarModelServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new CarModelRepository());
    }
}
