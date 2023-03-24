<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        /*chessboard.js v1.0.0 | (c) 2019 Chris Oakman | MIT License chessboardjs.com/license */
.clearfix-7da63{clear:both}.board-b72b1{border:2px solid #404040;box-sizing:content-box}.square-55d63{float:left;position:relative;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.white-1e1d7{background-color:#f0d9b5;color:#b58863}.black-3c85d{background-color:#b58863;color:#f0d9b5}.highlight1-32417,.highlight2-9c5d2{box-shadow:inset 0 0 3px 3px #ff0}.notation-322f9{cursor:default;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;position:absolute}.alpha-d2270{bottom:1px;right:3px}.numeric-fc462{top:2px;left:2px}
    </style>
<div id="myBoard" style="width: 400px"></div>


<script src={{ asset('js/jquery-3.6.4.min.js') }}></script>
<script src={{ asset('js/chessboard-1.0.0.min.js') }}></script>
<script src={{ asset('js/chessboard-1.0.0.js') }}></script>


<script>


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
position: 'start',
onDragStart: onDragStart,
onDrop: onDrop,
onSnapEnd: onSnapEnd
}
board = Chessboard('myBoard', config)
</script>

</body>
</html>
