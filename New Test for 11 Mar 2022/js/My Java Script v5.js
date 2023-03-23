function Position_Object();
/*Start Position Object
Position Object For JS
var position = {
    d6: 'bK',
    d4: 'wP',
    e4: 'wK'
  }
  var board = Chessboard('myBoard', position)
Position Object For HTML
<div id="myBoard" style="width: 400px"></div>
End Position Object*/

function Multiple_Boards();
  /*Start Multiple Boards
  Multiple Boards For JS

  var board1 = Chessboard('board1', {
    position: 'start',
    showNotation: false
  })
  
  var board2 = Chessboard('board2', {
    position: 'r1bqkbnr/pppp1ppp/2n5/1B2p3/4P3/5N2/PPPP1PPP/RNBQK2R',
    showNotation: false
  })
  
  var board3 = Chessboard('board3', {
    position: 'r1k4r/p2nb1p1/2b4p/1p1n1p2/2PP4/3Q1NB1/1P3PPP/R5K1',
    showNotation: false
  })

    Multiple Boards For HTML
<div id="board1" class="small-board"></div>
<div id="board2" class="small-board"></div>
<div id="board3" class="small-board"></div>

 <style type="text/css">
  .small-board {
  display: inline-block;
  margin-right: 5px;
  width: 200px;
}
  </style>
  End Multiple Boards*/


function Piece_Theme_String();
/*Start Piece Theme String
Piece Theme String For JS
var config = {
  pieceTheme: 'img/chesspieces/alpha/{piece}.png',
  position: 'start'
}
var board = Chessboard('myBoard', config)

Piece Theme String For HTML
<div id="myBoard" style="width: 400px"></div>
End Piece Theme String*/


function Animation_Speed();
/*Start Animation Speed
Animation Speed For JS
var board = Chessboard('myBoard', {
  draggable: true,
  moveSpeed: 'slow',
  snapbackSpeed: 500,
  snapSpeed: 100,
  position: 'start'
})

$('#ruyLopezBtn').on('click', function () {
  board.position('r1bqkbnr/pppp1ppp/2n5/1B2p3/4P3/5N2/PPPP1PPP/RNBQK2R')
})
$('#startBtn').on('click', board.start)

Animation Speed For HTML
<div id="myBoard" style="width: 400px"></div>
<button id="ruyLopezBtn">Ruy Lopez</button>
<button id="startBtn">Start Position</button>
End Animation Speed*/

function Spare_Pieces();

/*Start Spare Pieces
Spare Pieces For JS
var board = Chessboard('myBoard', {
  draggable: true,
  dropOffBoard: 'trash',
  sparePieces: true
})

$('#startBtn').on('click', board.start)
$('#clearBtn').on('click', board.clear)

Spare Pieces For HTML
<div id="myBoard" style="width: 400px"></div>
<button id="startBtn">Start Position</button>
<button id="clearBtn">Clear Board</button>
End Spare Pieces*/

function Only_Allow_Legal_Moves();
/*
Start Only Allow Legal Moves
Only Allow Legal Moves For JS
// NOTE: this example uses the chess.js library:
// https://github.com/jhlywa/chess.js

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

Only Allow Legal Moves For HTML
<div id="myBoard" style="width: 400px"></div>
<label>Status:</label>
<div id="status"></div>
<label>FEN:</label>
<div id="fen"></div>
<label>PGN:</label>
<div id="pgn"></div>



*/


