<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSetTypeRequest;
use App\Http\Resources\UserCollectionResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\User\UserService;
use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UsersController extends Controller
{
    public $resource = UserResource::class;
    public $resourceCollection = UserCollectionResource::class;
    public $model = User::class;
    public $service = UserService::class;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function update(Request $request, int $model)
    {
        // If it's not an admin
        if (auth()->user()->type !== User::TYPE_ADMINISTRADOR) {
            $isUser = User::query()
                ->where('id', $model)
                ->where('id', auth()->id())
                ->exists();

            if (!$isUser) {
                throw new UnauthorizedHttpException('Você não tem permissão para ver essa loja');
            }
        }
    }

    public function show(int $model)
    {
        // If it's not an admin
        if (auth()->user()->type !== User::TYPE_ADMINISTRADOR) {
            $isUser = User::query()
                ->where('id', $model)
                ->where('id', auth()->id())
                ->exists();

            if (!$isUser) {
                throw new UnauthorizedHttpException('Você não tem permissão para ver essa loja');
            }
        }

        parent::show($model);
    }

    public function getByType(string $type)
    {
        $userTypes = collect([
            User::TYPE_ADMINISTRADOR,
            User::TYPE_CONSULTOR,
            User::TYPE_LOJISTA
        ]);

        if (!$userTypes->contains($type)) {
            throw new UnexpectedValueException('Tipo de usuário não existente');
        }

        $users = $this->model::query()->where('type', $type)->paginate();

        return new $this->resourceCollection($users);
    }

    public function setType(UserSetTypeRequest $request)
    {
        $user = Auth::user();
        return new $this->resource($this->service->update($user->id, $request->all()));
    }
}
