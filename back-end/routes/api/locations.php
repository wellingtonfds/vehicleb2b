<?php

\Illuminate\Support\Facades\Route::prefix('locations')->group(function () {
    \Illuminate\Support\Facades\Route::get('logged', [\App\Http\Controllers\LocationsController::class, 'getForAuthenticated'])
    ->name('locations.logged');
});
