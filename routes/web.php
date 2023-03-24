<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuzzlesHandel;
use App\Http\Controllers\CompanyController;

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


Route::get('/play', function () {
    return view('play');
});


Route::get('/test', [CompanyController::class,'handel']);


Route::resource('companies', CompanyController::class);

Route::group(['prefix' => 'puzzles'], function(){

    Route::get('/mate-in-one', function()
    {
        return view('puzzles.puzzle');
    });
    Route::get('/mate-in-two', [PuzzlesHandel::class, 'mate_in_two']);
    Route::get('/mate-in-three', [PuzzlesHandel::class, 'mate_in_three']);
    Route::get('/mate-in-four', [PuzzlesHandel::class, 'mate_in_four']);
    Route::get('/mate-in-five', [PuzzlesHandel::class, 'mate_in_five']);
    Route::get('/mate-in-six', [PuzzlesHandel::class, 'mate_in_six']);
    Route::get('/best-move', [PuzzlesHandel::class, 'best_move']);
    Route::get('/rundom-puzzle', [PuzzlesHandel::class, 'rundom_puzzle']);
});