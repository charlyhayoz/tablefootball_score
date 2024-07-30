<?php

use Illuminate\Support\Facades\Route;

Route::resources([
  'game' => App\Http\Controllers\GameController::class,
  'player' => App\Http\Controllers\PlayerController::class,
]);

Route::prefix('/statistics')->group(function () {
  Route::post('/', [App\Http\Controllers\StatisticsController::class, 'getStatistics']);
});
