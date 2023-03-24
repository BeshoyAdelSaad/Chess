<?php

namespace App\Http\Controllers;

use App\Models\Puzzles;
use Illuminate\Http\Request;

class PuzzlesHandel extends Controller
{
    //
    public function mate_in_one()
    {
        $collection = Puzzles::all()
        ->where('category', 'one')
        ->where('id', rand( 1, Puzzles::all()->where('category', 'one')->count()));

        return view('puzzles.puzzle', compact('collection'));
    }

    public function mate_in_two()
    {
        $collection = Puzzles::all()
        ->where('category', 'two')
        ->where('id', rand( 1, Puzzles::all()->where('category', 'two')->count()));

        return view('puzzles.puzzles', compact('collection'));
    }


}
