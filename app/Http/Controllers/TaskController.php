<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [UserController::class, 'show']);
class TaskController extends Controller
{
    //
}
