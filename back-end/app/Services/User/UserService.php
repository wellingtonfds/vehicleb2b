<?php

namespace App\Services\User;

use App\Repositories\LocationRepository;
use App\Services\Crud\CrudServiceAbstract;
use App\Services\Crud\CrudServiceInterface;

class UserService extends CrudServiceAbstract implements UserServiceInterface, CrudServiceInterface
{
    public function __construct()
    {
        parent::__construct(new LocationRepository());
    }
}
