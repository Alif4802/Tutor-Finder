<?php
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::get('/search', 'SearchController@index')->name('search');
Route::get('/sessions', [SessionsController::class, 'index'])->name('sessions');
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');

Route::middleware(['auth','verified'])->group(function () {
    Route::controller(DashboardController::class)->group(function(){
        route::get('/userprofile','index');
        route::get('/userprofile1','index1');
        route::get('/userprofile2','index2');
        route::get('/userprofile3','index3');
    });
});
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');


Route::get('/sessions', [SessionsController::class, 'index'])->name('sessions');
Route::get('/sessions/manage', [SessionsController::class, 'manageBookings'])->name('sessions.manageBookings');
Route::get('/sessions/reminders', [SessionsController::class, 'reminders'])->name('sessions.reminders');
Route::post('/sessions/accept/{bookingId}', [SessionsController::class, 'acceptBooking'])->name('sessions.acceptBooking');
Route::post('/sessions/reject/{bookingId}', [SessionsController::class, 'rejectBooking'])->name('sessions.rejectBooking');
Route::get('/sessions/availability', [SessionsController::class, 'showAvailability'])->name('sessions.availability');

require __DIR__.'/auth.php';
