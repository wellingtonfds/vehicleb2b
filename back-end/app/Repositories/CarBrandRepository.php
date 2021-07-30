<?php

namespace App\Repositories;

use App\Models\CarBrand;
use App\Repositories\CrudRepositoryAbstract;


class CarBrandRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(CarBrand::class);
    }
}
