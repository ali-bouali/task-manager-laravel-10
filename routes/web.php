<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $stats = [
        'total' => auth()->user()->tasks()->count(),
        'pending' => auth()->user()->tasks()->pending()->count(),
        'in_progress' => auth()->user()->tasks()->inProgress()->count(),
        'completed' => auth()->user()->tasks()->completed()->count(),
    ];
    $recentTasks = auth()->user()->tasks()->with('category')->latest()->limit(5)->get();
    return view('dashboard', compact('stats', 'recentTasks'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tasks', TaskController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show', 'create', 'edit']);
});

require __DIR__.'/auth.php';
