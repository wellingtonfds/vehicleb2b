<?php

namespace App\Repositories;

use App\Models\Location;
use App\Repositories\CrudRepositoryAbstract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LocationRepository extends CrudRepositoryAbstract
{
    public function __construct()
    {
        parent::__construct(Location::class);
    }

    public function delete(Model $model): Model
    {
        DB::table('store_location')
            ->where('location_id', $model->id)
            ->delete();
        return parent::delete($model); // TODO: Change the autogenerated stub
    }
}
