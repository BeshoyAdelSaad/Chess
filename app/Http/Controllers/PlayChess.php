<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;

class PlayChess extends Controller
{
    //

    public function computer()
    {
        return view('play.computer');
    }

    
    public function me()
    {
        return view('play.withme');
    }

    public function friend(Request $request)
    {
        $id = auth()->user()->id;
        $link = route('with-friend/room', $id);
        $game = new Games;
        $game->user_id = $id;
        $game->player = 'friend';
        $game->color = $request->color;
        $game->time = $request->time;
        $game->save();

        return view('play.friendRoom', compact('link', 'id'));
    }
    public function friend_room($id)
    {
        $link = route('with-friend/room', $id);
        $myId = auth()->user()->id;
        $data = Games::where('user_id', $id)
        ->where('to_user_id', null)->get();
        
        if($myId == $id) return route('with-friend/room',$id);
            
        $game = Games::where('user_id', $id)->first();
        $game->to_user_id = $myId;
        $game->save();

        return view('play.friendRoom', compact('link', 'id'));
    }

    public function search_online()
    {
        $color = ['white', 'black'];
        
        // dd(Games::where('to_user_id', null)->where('user_id', '<>', auth()->user()->id)->count() > 0);
        if(Games::where('to_user_id', null)->where('user_id', '<>', auth()->user()->id)->count() > 0){
            $id = auth()->user()->id;
            $data = Games::where('to_user_id', null)->first();
            $game = Games::find($data->id);
            $game->to_user_id = $id;
            $game->color = $color[rand(0,1)];
            $game->time = "10";
            $game->save();
            return redirect()->route('online');

        }
        else if(Games::where('user_id', auth()->user()->id)->where('to_user_id', null)->count() > 0 ){
            return redirect()->route('online')->with('message', 'Your request is already in progress');
        }else{
            $game = new Games;
            $id = auth()->user()->id;
            $game->user_id = $id;
            $game->player = 'online';
            $game->save();
            return redirect()->route('online');
        }
    }

    public function online()
    {

        // $id = auth()->user()->id;
      

        return view('play.online');
    }
}
