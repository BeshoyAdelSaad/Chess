<?php

use App\Http\Controllers\AuthUsers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuzzlesHandel;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PlayChess;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPagesController;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Route::get('/', function(){return view('home');})->name('home');
// Route::get('login-page', [AuthUsers::class,'login_page'])->name('login-page');
// Route::get('register-page', [AuthUsers::class,'register_page'])->name('register-page');
// Route::post('register', [AuthUsers::class,'register'])->name('register');
// Route::post('login', [AuthUsers::class,'login'])->name('login');



Route::resource('companies', CompanyController::class);

Route::group(['middleware' => 'auth'],function(){
    Route::get('/puzzles/mate-in-one', [PuzzlesHandel::class, 'mate_in_one']);
    Route::get('/puzzles/mate-in-two', [PuzzlesHandel::class, 'mate_in_two']);
    Route::get('/puzzles/mate-in-three', [PuzzlesHandel::class, 'mate_in_three']);
    Route::get('/puzzles/mate-in-four', [PuzzlesHandel::class, 'mate_in_four']);
    Route::get('/puzzles/mate-in-five', [PuzzlesHandel::class, 'mate_in_five']);
    Route::get('/puzzles/mate-in-six', [PuzzlesHandel::class, 'mate_in_six']);
    Route::get('/puzzles/best-move', [PuzzlesHandel::class, 'best_move']);
    Route::get('/puzzles/rundom-puzzle', [PuzzlesHandel::class, 'rundom_puzzle']);
});

Route::group(['prefix' => 'play', 'middleware' => 'auth'], function(){

    Route::get('/vs-computer',[PlayChess::class, 'computer'])->name('vs-computer');
    Route::get('/with-me', [PlayChess::class, 'me'])->name('vs-me');
    Route::post('/with-myfriend', [PlayChess::class, 'friend'])->name('vs-friend');
    Route::get('/with-friend/room/{id}', [PlayChess::class, 'friend_room'])->name('with-friend/room');
    Route::get('/search-about-player', [PlayChess::class, 'search_online'])->name('search-online');
    Route::get('/online', [PlayChess::class, 'online'])->name('online');

});

Route::group([], function(){

    Route::get('/contact', [PublicPagesController::class, 'contact'])->name('contact');
    Route::get('/about', [PublicPagesController::class, 'about'])->name('about');
});


require __DIR__.'/auth.php';
