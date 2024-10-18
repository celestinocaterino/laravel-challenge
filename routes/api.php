<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiKeyMiddleware;

use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendeeController;


Route::prefix("/v1")->group(
    function () {
        Route::apiResource('events', EventController::class)->middleware(ApiKeyMiddleware::class);
        Route::apiResource('attendees', AttendeeController::class)->middleware(ApiKeyMiddleware::class);

        Route::post('/events/{eventID}/attendees/{attendeeId}', 'EventController@reserve')->middleware(ApiKeyMiddleware::class);
    }
);
