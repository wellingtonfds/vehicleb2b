<?php

namespace App\Repositories;

use App\Models\CarBrand;
use App\Models\CarModelVersion;
use App\Repositories\CrudRepositoryAbstract;


class CarModelVersionRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(CarModelVersion::class);
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
