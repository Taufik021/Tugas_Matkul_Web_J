<?php

use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToolController::class, 'index'])->name('tools.index');
