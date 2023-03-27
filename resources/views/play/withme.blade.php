@extends('layouts.nav')

@section('title', 'Play Chess')

@section('content')

    
<div class="container-fluid p-1">
  <div class="row">

    <div class="container text-bg-primary text-center rounded mb-3">
      <h1>Play Chess</h1>
    </div>
    <div class="col-sm-8 text-center mt-4">
      <div id="myBoard" style="width: 400px; margin: auto"></div>
    </div>
    
    <div id="" class="col-sm-4 text-center text-bg-light rounded">
      <div class="container-fluid p-2 my-1 border">
        <label class="text-center w-50 text-bg-dark rounded p-1">Status:</label>
      <div class="h4 my-1" id="status"></div>
      </div>
      <div class="container-fluid p-3 my-1 border">
        <label class="text-bg-dark rounded p-2 w-50 h6">FEN:</label>
        <div style="overflow: overlay;" class="w-100 my-1" id="fen"></div>
      </div>
      <div class="container-fluid p-2">
        <div class="row">
          <h3 class="text-center text-bg-dark rounded p-1">Moves</h3>
          <textarea cols='50' rows='6' id="pgn"></textarea><br/>
        </div>
      </div>
    
    </div>

  </div>

</div>




<script>
  


function getFEN()
{
  
  return "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
}



var board = null
var game = new Chess()
var $status = $('#status')
var $fen = $('#fen')
var $pgn = $('#pgn')

function onDragStart (source, piece, position, orientation) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false

  // only pick up pieces for the side to move
  if ((game.turn() === 'w' && piece.search(/^b/) !== -1) ||
      (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
    return false
  }
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

  updateStatus()
}

// update the board position after the piece snap
// for castling, en passant, pawn promotion
function onSnapEnd () {
  board.position(game.fen())
}

function updateStatus () {
  var status = ''

  var moveColor = 'White'
  if (game.turn() === 'b') {
    moveColor = 'Black'
  }

  // checkmate?
  if (game.in_checkmate()) {
    status = 'Game over, ' + moveColor + ' is in checkmate.'
  }

  // draw?
  else if (game.in_draw()) {
    status = 'Game over, drawn position'
  }

  // game still on
  else {
    status = moveColor + ' to move'

    // check?
    if (game.in_check()) {
      status += ', ' + moveColor + ' is in check'
    }
  }

  $status.html(status)
  $fen.html(game.fen())
  $pgn.html(game.pgn())
}

var config = {
  draggable: true,
  position: 'start',
  onDragStart: onDragStart,
  onDrop: onDrop,
  onSnapEnd: onSnapEnd
}
board = Chessboard('myBoard', config)

updateStatus()
</script>

@endsection
