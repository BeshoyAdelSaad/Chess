@extends('layouts.nav')

@section('title', 'Mate In One')

@section('content')

<div class="container-flud my-5 p-3">
    <div class="row p-3">
            <div id="chessBoard" class="clo-8" style="width: 400px"></div>
            <div class="col-4">
                
                    {{-- <h3>{{ $address }}</h3> --}}
            </div>
            <div id="getMessage"></div>

    </div>
</div>



    <script>
// NOTE: this example uses the chess.js library:
// https://github.com/jhlywa/chess.js
function testdb()
{
    return {!! json_encode($address) !!};
}

var board = null
var game = new Chess()

function onDragStart (source, piece, position, orientation) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false

  // only pick up pieces for White
  if (piece.search(/^b/) !== -1) return false
}

function makeRandomMove () {
  var possibleMoves = game.moves()

  // game over
  if (possibleMoves.length === 0) return

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
  position: testdb(),
  onDragStart: onDragStart,
  onDrop: onDrop,
  onSnapEnd: onSnapEnd
}
board = Chessboard('chessBoard', config)
    </script>

@endsection

