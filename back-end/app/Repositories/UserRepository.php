<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\CrudRepositoryAbstract;

class UserRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(User::class);
    }
}
