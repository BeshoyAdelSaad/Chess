@extends('layouts.nav')

@section('title', 'Practice puzzles')

@section('content')

  @foreach ($full_Fen as $puzzle)
    
  @endforeach

<div class="container-fluid p-1">
  <div class="row">

    <div class="container text-bg-primary text-center rounded mb-3">
      <h1>Practise</h1>
    </div>
    <div class="col-sm-8 text-center mt-4">
      <div id="myBoard" style="width: 400px; margin: auto"></div>
    </div>
    
    <div id="mmm" class="col-sm-4 text-center text-bg-light rounded">
      <h2 id="" class="my-3">{{ $title }}<h2>
        <hr>
      <h4 id="colorToMove" class="my-3"><h4>
      <h2 id="getMsg"></h2>
      <div>
        <button id="next" type="button" style="display: none;" class="btn btn-outline-success p-2 w-50 hover" onclick="location.reload()">Next</button>
      </div>
    </div>

  </div>

</div>


<script>
  
function promotion()
{
  
  let color =  {!! json_encode($puzzle->color) !!};
  if(color === 'w'){
  document.getElementById('w').style.display = "";
}else{
  document.getElementById('w').style.display = "";
}

} 

function bestMoveAnswer()
{

    return 'You are found the Best move'
}

function getFEN()
{
  let fen =  {!! json_encode($puzzle->plain_fen) !!};
  let color =  {!! json_encode($puzzle->color) !!};
  let castle =  {!! json_encode($puzzle->castling_rights) !!};
  let moves =  {!! json_encode($puzzle->num_moves) !!};

  let fullFEN = fen + " " + color + " " + castle + " " + moves;
  return fullFEN;
}

function colorToMove()
{
  let msg;
  let color = {!! json_encode($puzzle->color) !!};
  ( color === 'w') ? msg = "White to move" :  msg = "Black to move";
  document.getElementById('colorToMove').innerHTML = msg;
  return color;
}

function getMsg()
{
  document.getElementById('next').style.display = '';
  return document.getElementById('getMsg').innerHTML = 'Congratulation :)';
}
var board = null
var game = new Chess()

function onDragStart (source, piece, position, orientation) {
  // do not pick up pieces if the game is over
  if (game.game_over()) return false
  

  // only pick up pieces for White
  if (piece.search({!! json_encode($puzzle->color) !!}) === -1) return false

  // if(piece === $arrSolution[0] && source === $arrSolution[1]) return bestMoveAnswer(); 
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
    promotion: 'q' //promotion(); NOTE: always promote to a queen for example simplicity
  })

  // illegal move
  if (move === null) return 'snapback'

  // make random legal move for black
  window.setTimeout(makeRandomMove, 400)
}

// update the board position after the piece snap
// for castling, en passant, pawn promotion
function onSnapEnd () {
  board.position(game.fen())
}

var config = {
  draggable: true,
  position: getFEN(),
  onDragStart: onDragStart,
  onDrop: onDrop,
  // moveSpeed: 'slow',
  // snapbackSpeed: 500,
  // snapSpeed: 100,
  onSnapEnd: onSnapEnd
}
board = Chessboard('myBoard', config)
if(colorToMove() === 'w') 
  {
    board.orientation('white') 
  }else{
    board.orientation('black')};

colorToMove();

</script>

@endsection
