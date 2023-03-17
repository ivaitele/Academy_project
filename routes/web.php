<?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminEventsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerEventsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsOrganizer;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'onLogin'])->name('auth.onLogin');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'onRegister'])->name('auth.onRegister');

Route::get('/logout', [AuthController::class, 'onLogout'])->name('auth.logout');

Route::get('/', HomeController::class)->name('home');

Route::get('/events', [EventsController::class, 'list'])->name('events.list');
Route::get('/archive', [EventsController::class, 'archive'])->name('events.archive');
Route::get('/events/{category:slug}', [EventsController::class, 'category'])->name('events.category');
Route::get('/event/{event}', [EventsController::class, 'show'])->name('events.show');
Route::post('/events/{event}/buy', [EventsController::class, 'add_to_cart'])->name('events.buy');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart', [CartController::class, 'onCheckout'])->name('cart.checkout');
Route::get('/cart/payment', [CartController::class, 'payment'])->name('cart.payment');

Route::get('/ticket/{code}', [CartController::class, 'ticket'])->name('cart.ticket');

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/user/tickets', [UserController::class, 'tickets'])->name('user.tickets');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::put('/user/profile', [UserController::class, 'update'])->name('user.update');


Route::group(['prefix' => 'organizer', 'middleware' => ['auth', IsOrganizer::class]], function () {
    Route::get('/events', [OrganizerEventsController::class, 'index'])->name('organizer.events.index');
    Route::get('/events/add', [OrganizerEventsController::class, 'create'])->name('organizer.event.create');
    Route::post('/events/add', [OrganizerEventsController::class, 'store'])->name('organizer.event.store');
    Route::get('/events/{event}', [OrganizerEventsController::class, 'show'])->name('organizer.event.show');
    Route::get('/events/{event}/edit', [OrganizerEventsController::class, 'edit'])->name('organizer.event.edit');
    Route::put('/events/{event}', [OrganizerEventsController::class, 'update'])->name('organizer.event.update');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/events', [AdminEventsController::class, 'index'])->name('admin.events.index');
    Route::get('/events/add', [AdminEventsController::class, 'create'])->name('admin.event.create');
    Route::post('/events/add', [AdminEventsController::class, 'store'])->name('admin.event.store');
    Route::get('/events/{event}', [AdminEventsController::class, 'show'])->name('admin.event.show');
    Route::get('/events/{event}/edit', [AdminEventsController::class, 'edit'])->name('admin.event.edit');
    Route::put('/events/{event}', [AdminEventsController::class, 'update'])->name('admin.event.update');

    Route::resources([
        'categories'   => AdminCategoriesController::class,
        'users' =>  AdminUsersController::class,
    ]);

});

