<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollectionResource;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Models\User;
use App\Services\Location\LocationService;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class LocationsController extends Controller
{
    public $model = Location::class;
    public $resource = LocationResource::class;
    public $resourceCollection = LocationCollectionResource::class;
    public $service = LocationService::class;

    public function __construct(LocationService $locationService)
    {
        $this->service = $locationService;
    }

    public function show(int $model)
    {
        // If it's not an admin
        if (auth()->user()->type !== User::TYPE_ADMINISTRADOR) {
            $isLocationOwner = Location::query()
                ->where('id', $model)
                ->whereHas('users', function (Builder $query) {
                    $query->where('id', auth()->id());
                })
                ->exists();

            if (!$isLocationOwner) {
                throw new UnauthorizedHttpException('Você não tem permissão para ver esse local');
            }
        }

        parent::show($model);
    }

    public function getForAuthenticated()
    {
        $locations = Location::query()
            ->whereHas('users', function (Builder $query) {
                $query->where('id', auth()->id());
            })
            ->paginate();

        return new $this->resourceCollection($locations);
    }
}
