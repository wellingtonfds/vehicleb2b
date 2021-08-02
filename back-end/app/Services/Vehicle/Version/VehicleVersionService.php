<?php

namespace App\Services\Vehicle\Version;

use App\Repositories\VehicleVersionRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;

class VehicleVersionService extends CrudServiceAbstract implements VehicleVersionServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new VehicleVersionRepository());
    }
}
