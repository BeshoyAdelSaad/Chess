@extends('layouts.nav')
@section('title', 'Play VS Computer')

@section('content')
    
<script type="text/javascript" src="{{ asset('js/jquery-1.8.2.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.8.24.custom.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/garbochess.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/boardui.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        g_timeout = 1000;
        UINewGame();
    });
</script> 

  <style type="text/css">
      #FenTextBox {
          width: auto;
      }
      .underline {
        text-decoration: underline;
      }
      #TimePerMove {
          width: 50px;
      }
      .no-highlight {
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        margin-left: auto;
        margin-right: auto;
      }
      .sprite-bishop_black{ background-position: 0 0; width: 45px; height: 45px; } 
      .sprite-bishop_white{ background-position: 0 -95px; width: 45px; height: 45px; } 
      .sprite-king_black{ background-position: 0 -190px; width: 45px; height: 45px; } 
      .sprite-king_white{ background-position: 0 -285px; width: 45px; height: 45px; } 
      .sprite-knight_black{ background-position: 0 -380px; width: 45px; height: 45px; } 
      .sprite-knight_white{ background-position: 0 -475px; width: 45px; height: 45px; } 
      .sprite-pawn_black{ background-position: 0 -570px; width: 45px; height: 45px; } 
      .sprite-pawn_white{ background-position: 0 -665px; width: 45px; height: 45px; } 
      .sprite-queen_black{ background-position: 0 -760px; width: 45px; height: 45px; } 
      .sprite-queen_white{ background-position: 0 -855px; width: 45px; height: 45px; } 
      .sprite-rook_black{ background-position: 0 -950px; width: 45px; height: 45px; } 
      .sprite-rook_white{ background-position: 0 -1045px; width: 45px; height: 45px; }
  </style>


 <div class="container-fluid p-1">
    <div class="row">
        <div class="container text-bg-primary text-center rounded mb-3">
        <h1>
            @auth
            {{ Auth::user()->name }}
            @endauth
            VS Computer
        </h1>
        </div>
        <div class="col-sm-8 text-center mt-4">
            <div id='board' class="float-end w-100"></div> 
        </div>
      
      <div id="info" class="col-sm-4 text-bg-light rounded">
        <div class="container-fluid p-3 my-2 border">
          <div class="row">
            <div class="col-sm">
              <a href="javascript:UINewGame()" class="btn mb-2 text-bg-dark underline w-100 p-2">New game</a>
            </div>
            <div class="col-sm">
              <select class="w-100 btn text-bg-dark p-2 mb-2" onchange="javascript:UIChangeStartPlayer()">
                <option value="white">White</option>
                <option value="black">Black</option>
            </select>
            </div>
          </div>
      
        </div>
        <div class="container-fluid p-2 border">
          <div class="row">
          <div class="col-sm-8 ">
            Time per move: <input class="" id="TimePerMove" value="3000" onchange="javascript:UIChangeTimePerMove()" /> ms
          </div>
          <div class="col-sm-4">
            <a class="w-100 btn text-bg-dark underline" href="javascript:UIUndoMove()">Undo</a>
          </div>
        </div>
        </div>
       
        <div class="container-fluid border my-2 p-2 text-center ">
          <label for="FenTextBox" class="text-bg-dark rounded p-2 w-50 h6">FEN:</label>
          <input class="w-100 my-2" id='FenTextBox' onchange="javascript:UIChangeFEN()"/>
        </div>

          <div class="container-fluid p-2">
            <div class="row">
              <h3 class="text-center text-bg-dark rounded p-1">Moves</h3>
              <textarea cols='50' rows='6' id='PgnTextBox'></textarea><br/>
            </div>
          </div>

        </div>
      </div>
  
    </div>
  
  </div>

@endsection

