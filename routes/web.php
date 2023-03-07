<?php

use App\Http\Controllers\Admin\AdminEventsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'onLogin'])->name('auth.onLogin');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'onRegister'])->name('auth.onRegister');

Route::get('/logout', [AuthController::class, 'onLogout'])->name('auth.logout');

Route::get('/events', [EventsController::class, 'list'])->name('events.list');
Route::get('/events/{category:slug}', [EventsController::class, 'category'])->name('events.category');
Route::get('/event/{event}', [EventsController::class, 'show'])->name('events.show');
Route::post('/events/{event}/buy', [EventsController::class, 'onBuy'])->name('events.buy');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart', [CartController::class, 'onCheckout'])->name('cart.checkout');

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/user/tickets', [UserController::class, 'tickets'])->name('user.tickets');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::put('/user/profile', [UserController::class, 'update'])->name('user.update');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/events', [AdminEventsController::class, 'list'])->name('admin.events.list');
    Route::get('/events/add', [AdminEventsController::class, 'create'])->name('admin.event.create');
    Route::post('/events/add', [AdminEventsController::class, 'store'])->name('admin.event.store');
    Route::get('/events/{event}/edit', [AdminEventsController::class, 'edit'])->name('admin.event.edit');
    Route::put('/events/{event}', [AdminEventsController::class, 'update'])->name('admin.event.update');

    Route::get('/users', [AdminUsersController::class, 'list'])->name('admin.users.list');
    Route::post('/users', [AdminUsersController::class, 'store'])->name('admin.users.store');
    Route::get('/users/add', [AdminUsersController::class, 'create'])->name('admin.users.create');
    Route::get('/users/{user}/edit', [AdminUsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminUsersController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminUsersController::class, 'destroy'])->name('admin.users.delete');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require __DIR__.'/auth.php';
