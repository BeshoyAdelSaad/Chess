
  
 

//#########################################################################################
//#########################################################################################
//#########################################################################################
//#########################################################################################

// // var board = null
// // var game = new Chess()


// // function onDragStart (source, piece, position, orientation) {
// //   // do not pick up pieces if the game is over
// //   if (game.game_over()) return false

// //   // only pick up pieces for White
// //   if (piece.search(newPuzzle.colorHandel()) === -1) return false
// // }

// // function makeRandomMove () {
// //   var possibleMoves = game.moves()

// //   // game over
// //   if (possibleMoves.length === 0) return

// //   var randomIdx = Math.floor(Math.random() * possibleMoves.length)
// //   game.move(possibleMoves[randomIdx])
// //   board.position(game.fen())
// // }

// // function onDrop (source, target) {
// //   // see if the move is legal
// //   var move = game.move({
// //     from: source,
// //     to: target,
// //     promotion: 'q' // NOTE: always promote to a queen for example simplicity
// //   })

// //   // illegal move
// //   if (move === null) return 'snapback'

// //   // make random legal move for black
// //   window.setTimeout(makeRandomMove, 250)
// // }

// // // update the board position after the piece snap
// // // for castling, en passant, pawn promotion
// // function onSnapEnd () {
// //   board.position(game.fen())
// // }

// // var config = {
// //   draggable: true,
// //   position: newPuzzle.fen(),
// //   onDragStart: onDragStart,
// //   onDrop: onDrop,
// //   onSnapEnd: onSnapEnd
// // }





// // board = Chessboard('myBoard', config)

// //###############################################


// function hadelArr(arr)
// {
//     let getrundom = Math.floor(Math.random() * mateInTwo.length);
//     let fulpuzzle = arr[getrundom];
//     let num = fulpuzzle.indexOf(' ');
//     let real = fulpuzzle.substr(0,num + 2);
//     // console.log(real);
//     return real + ' - - 0 1';
// }


// class Handel
// {

// constructor(str){
//     this.string = str;
// }
// fen()
// {
// return this.string;
// }
     
// whatBeMove()
// {
//   let msg;
//     if(this.colorHandel() === 'b') {
//       msg = 'Black to move';
//     }else{
//       msg = 'White to move';
//     }
//     return document.getElementById('getMessage').innerHTML = msg;

// }
// colorHandel()
// {
//     var index = this.string.search(" ");
//     var color = this.string[index + 1];
//     return color;
// }

// gameOver()
// {
//   document.getElementById('getMessage').innerHTML = 'Congretulation <a href="{{location.reload()}}">Next</a>';
// }

// }


// var x = hadelArr(mateInTwo);

// var newPuzzle = new Handel(x);
// 2kr3r/1pp2nbp/2R3p1/1B1p3P/Q3qP2/4B3/PP4P1/4K2R w KQkq - 0 1


/*
let jj = localStorage.getItem('colors');
// console.log(jj);
if (jj !== null){
// console.log('there is some data in localStorage');
// localStorage.setItem('--black-color', jj);}
document.documentElement.style.setProperty('--black-color', jj);
}


document.querySelector('.toggle-settings .fa-gear').onclick = function () {

this.classList.toggle('fa-spin');
document.querySelector('.settings-Box').classList.toggle('open');

};


// nav active 
const aForAllNav = document.querySelectorAll('.topnav li');
aForAllNav.forEach(li => {
li.addEventListener("click", (e) => {
    e.target.parentElement.querySelectorAll('.active').forEach(element => {
        element.classList.remove('active');
        });
// e.target.classList.add('active');
});

});

// Switch Colors
const colorLi = document.querySelectorAll('.colors-list li');

colorLi.forEach(li => {
li.addEventListener("click", (e) => {

// Set Color on root 
document.documentElement.style.setProperty('--black-color', e.target.dataset.color);
localStorage.setItem('colors', e.target.dataset.color);
e.target.parentElement.querySelectorAll('.active').forEach(Element => {
Element.classList.remove('active');
});
// e.target.classList.add('active');
});

});


// Select Landing page Element
let landingPage = document.querySelector('.landing-page'); 

// Get Array for imge
const imgeArray = ['01.jfif', '02.jfif', '03.jfif'];


// setInterval(() => {

// Get Rundom Number
// var randomNumber = Math.floor(Math.random() * imgeArray.length);

// Change Background Image
// landingPage.style.backgroundImage = 'url("' + imgeArray[randomNumber] + '")';

// }, 10000);
*/
