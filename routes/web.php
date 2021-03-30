<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ReviewController;

use \App\Http\Controllers\RoomApiController;
use \App\Http\Controllers\user\UserController as UserProfileController;
use \App\Http\Controllers\user\TestimonialsController;

use \App\Http\Controllers\Admin\BackendController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\SubscriberController;
use \App\Http\Controllers\Admin\MessageController;
use \App\Http\Controllers\Admin\ReviewsController;
use \App\Http\Controllers\Admin\HotelServiceController;
use \App\Http\Controllers\Admin\RoomsController;
use \App\Http\Controllers\admin\PricesController;
use \App\Http\Controllers\Admin\ServiceController;
use \App\Http\Controllers\Admin\TypeController;
use \App\Http\Controllers\Admin\BookingController;
use \App\Http\Controllers\admin\TestimonialsController as AdminTestimonialsController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::resource('/api/rooms', RoomApiController::class);
Route::resource('/rooms', RoomController::class);
Route::resource('/contact', ContactsController::class);

Route::get("/register/create", [FrontendController::class, 'showRegisterForm'])->name('register.create');
Route::POST("/register", [FrontendController::class, 'register'])->name("register.store");
Route::get("/login/create", [FrontendController::class, 'showLoginForm'])->name('login.create');
Route::POST("/login", [FrontendController::class, 'login'])->name("login.store");

Route::POST("/newsletter", [FrontendController::class, 'subscribe'])->name("newsletter.store");

//region CONTROLLERS FOR USER MANAGING
Route::prefix('/user')->middleware(["isUserLoggedIn"])->group(function(){
    Route::get("/logout", [FrontendController::class, "logout"])->name("logoutUser");

    Route::get('/profile', [UserProfileController::class, "index"])->name('profile');
    Route::get('/profile/{id}/edit', [UserProfileController::class, "edit"])->name('profile.edit');
    Route::put('/profile/{id}', [UserProfileController::class, "update"])->name('profile.update');
    Route::get('/change-password/{id}/edit', [UserProfileController::class, "formChangePassword"])->name('change-password.edit');
    Route::put('/change-password/{id}', [UserProfileController::class, "changePassword"])->name('change-password.update');

    Route::post('/reservation',[\App\Http\Controllers\user\ReservationController::class, "store"])->name('make-reservation');

    Route::resource('/reviews-manage', ReviewController::class);
    Route::POST('/rating-room', [ReviewController::class, "rating"])->name('rate.store');
    Route::resource('/testimonials-manage', TestimonialsController::class);
});
//endregion


//region CONTROLLERS FOR ADMIN MANAGING
Route::prefix('/admin')->middleware(["loggedIn","isAdminLoggedIn"])->group(function(){
    Route::get('/', [BackendController::class, 'index'])->name('admin');

    Route::get("/logout", [BackendController::class, "logout"])->name("logoutAdmin");

    Route::resource('/menus', MenuController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/subscribes', SubscriberController::class);
    Route::resource('/messages', MessageController::class);
    Route::resource('/reviews', ReviewsController::class);
    Route::resource('/hotel-services', HotelServiceController::class);
    Route::resource('/rooms-manage', RoomsController::class);
    Route::resource('/prices', PricesController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/types', TypeController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/testimonials', AdminTestimonialsController::class);
});
//endregion
