<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puzzles extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'plain_fen',
        'color', 
        'castling_rights', 
        'num_moves', 
        'solution',
        'is_active' 
    ];
}
