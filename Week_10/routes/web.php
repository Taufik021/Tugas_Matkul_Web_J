<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToolController::class, 'index'])->name('tools.index');
// TODO 4: Mendaftarkan route CRUD web untuk halaman program.
Route::resource('programs', ProgramController::class)->except(['show']);
