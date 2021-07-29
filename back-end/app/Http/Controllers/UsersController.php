<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UsersController extends Controller
{
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
}
