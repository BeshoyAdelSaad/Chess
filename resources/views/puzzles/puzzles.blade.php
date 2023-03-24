@extends('layouts.nav')

@section('title', 'Mate In One')

@section('content')


    <div id="myBoard" style="width: 400px"></div>
    <div id="getmsg" class="text-center text-bg-primary rounded hover"></div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Fen string</th>
            <th>Color</th>
            <th>Castling Right</th>
            <th>Number of moves</th>
            <th>Solution</th>
            <th>Is active</th>
        </tr>
        @foreach ( $collection as $item )  
        <tr>    
                <td>{{ $item->id }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->plain_fen }}</td>
                <td>{{ $item->color }}</td>
                <td>{{ $item->castling_rights }}</td>
                <td>{{ $item->num_moves }}</td>
                <td>{{ $item->solution }}</td>
                <td>{{ $item->is_active }}</td>
        </tr>
        @endforeach
    </table>



    <script>
        function getPos()
        {
            let pos = {!! json_encode($item->plain_fen) !!};
            let cas = {!! json_encode($item->castling_rights) !!};
            let mov = {!! json_encode($item->num_moves) !!};
            let posation =  pos . ' ' getColor() . cas . num_mov
            // if(!pos) pos = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
            console.log(posation);
            return posation;
        }
        function getColor()
        {
            let color = {!! json_encode($item->color) !!};
            let msg;
            if(this.colorHandel() === 'b') {
                msg = 'Black to move';
            }else{
            msg = 'White to move';
            }
            document.getElementById('getMessage').innerHTML = msg;

            // if(!pos) pos = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
            return color;
        }
        function getMsg()
        {
            document.getElementById('getmsg').innerHTML = 
            "<div class='alert alert-success alert-dismissible'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Success!</strong> This alert box could indicate a successful or positive action.</div>";
        }

var board = null
var game = new Chess()


function onDragStart (source, piece, position, orientation) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return

  // only pick up pieces for White
  if (piece.search(getColor()) === -1) return false
}

function makeRandomMove () {
  var possibleMoves = game.moves()

  // game over
  if (possibleMoves.length === 0) return getMsg();

  var randomIdx = Math.floor(Math.random() * possibleMoves.length)
  game.move(possibleMoves[randomIdx])
  board.position(game.fen())
}

function onDrop (source, target) {
  // see if the move is legal
  var move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  })

  // illegal move
  if (move === null) return 'snapback'

  // make random legal move for black
  window.setTimeout(makeRandomMove, 250)
}

// update the board position after the piece snap
// for castling, en passant, pawn promotion
function onSnapEnd () {
  board.position(game.fen())
}

var config = {
  draggable: true,
  position: getPos(),
  onDragStart: onDragStart,
  onDrop: onDrop,
  onSnapEnd: onSnapEnd
}
board = Chessboard('myBoard', config)


    </script>
@endsection


