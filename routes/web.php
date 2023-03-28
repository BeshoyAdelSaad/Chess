<?php

use App\Http\Controllers\AuthUsers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuzzlesHandel;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;

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

// Route::get('/', function () {
//     return view('HelloMena')->name('home');
// });



Route::get('/', [Controller::class,'home'])->name('home');
Route::get('login-page', [AuthUsers::class,'login_page'])->name('login-page');
Route::get('register-page', [AuthUsers::class,'register_page'])->name('register-page');
Route::post('register', [AuthUsers::class,'register'])->name('register');
Route::post('login', [AuthUsers::class,'login'])->name('login');



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



Route::group(['prefix' => 'play'], function(){
    Route::get('/vs-computer', function(){

        return view('play.computer');
    })->name('computer');

    Route::get('/with-me', function(){

        return view('play.withme');
    })->name('withme');
});



// // web routes
// Route::group(['prefix' => 'users', 'middleware' => 'auth'],
// function(){
//         Route::post('/play', [ViewController::class,'rules'])->name('play');
//         Route::post('/play-with-friend', [ViewController::class,'playWithFriend'])->name('playwithfriend');
//         Route::get('/game/room', [ViewController::class,'gameRoom'])->name('gameroom');
// });

// // api routes
// Route::group(['prefix' => 'users', 'middleware' => 'auth'],
// function(){
//         Route::post('/play', [RulesController::class,'rules'])->name('play');
//         Route::post('/play-with-friend', [RulesController::class,'playWithFriend'])->name('playwithfriend');
//         Route::post('/game/room', [RulesController::class,'gameRoom'])->name('gameroom');
// });
