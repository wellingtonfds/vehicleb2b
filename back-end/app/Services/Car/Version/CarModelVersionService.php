<?php

namespace App\Services\Car\Version;

use App\Repositories\CarModelVersionRepository;
use App\Services\Car\Version\CarModelVersionServiceInterface;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;


class CarModelVersionService extends CrudServiceAbstract implements CarModelVersionServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new CarModelVersionRepository());
    }
}
