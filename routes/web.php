<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ProfileController;

// Welcome Page
Route::get('/', function () {
    return view('welcome'); // صفحة البداية
})->name('welcome');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Dashboard / Main Page بعد تسجيل الدخول
    Route::get('/dashboard', [FinanceController::class, 'index'])->name('dashboard'); 
     
    // Finance routes
  
    Route::post('/add-budget', [FinanceController::class, 'addBudget'])->name('add-budget');
    Route::post('/add-income', [FinanceController::class, 'addIncome'])->name('add-income');
    Route::post('/add-expense', [FinanceController::class, 'addExpense'])->name('add-expense');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Transactions history page
    Route::get('/transactions', [FinanceController::class, 'transactions'])->name('transactions');

    // Overview charts page
    Route::get('/overview', [FinanceController::class, 'overview'])->name('overview');
    });

require __DIR__.'/auth.php';
