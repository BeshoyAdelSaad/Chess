<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'color',
        'time',
        'to_user_id',
        'win_id',
        'moves',
        'messages',
        'player'
    ];

    public function userGames()
    {
        return $this->belongsTo(User::class);
    }
}
