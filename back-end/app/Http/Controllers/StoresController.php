<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreCollectionResource;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class StoresController extends Controller
{
    use HasCrudActions;

    public $resource = StoreResource::class;

    public $resourceCollection = StoreCollectionResource::class;

    public function update(Request $request, int $model)
    {
        // If it's not an admin
        if (auth()->user()->type !== User::TYPE_ADMINISTRADOR) {
            $isStoreOwner = Store::query()
                ->where('id', $model)
                ->whereHas('users', function (Builder $query) {
                    $query->where('id', auth()->id());
                })
                ->exists();

            if (!$isStoreOwner) {
                throw new UnauthorizedHttpException('Você não tem permissão para ver essa loja');
            }
        }

        parent::update($request, $model);
    }

    public function show(int $model)
    {
        // If it's not an admin
        if (auth()->user()->type !== User::TYPE_ADMINISTRADOR) {
            $isStoreOwner = Store::query()
                ->where('id', $model)
                ->whereHas('users', function (Builder $query) {
                    $query->where('id', auth()->id());
                })
                ->exists();

            if (!$isStoreOwner) {
                throw new UnauthorizedHttpException('Você não tem permissão para ver essa loja');
            }
        }

        parent::show($model);
    }

    public function getPublicProfile(Store $store)
    {
        return new $this->resource($store);
    }
}
