<?php

namespace App\Repositories;

use App\Models\CarModel;
use App\Models\CarModelVersion;
use App\Repositories\CrudRepositoryAbstract;


class CarModelRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(CarModel::class);
    }

    public function getModelVersionByLabel(string $label)
    {
        return CarModelVersion::where('label', $label)->first();
    }
    public function getModelVersionByLikeLabel(string $label)
    {
        return CarModelVersion::where('label', 'like', "%$label%")->first();
    }
}
