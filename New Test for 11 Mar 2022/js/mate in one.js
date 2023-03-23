// var DEFAULT_POSITION = 'r1bqkbnr/pppp1ppp/2n5/1B2p3/4P3/5N2/PPPP1PPP/RNBQK2R b KQkq - 0 1';
var p = ['8/p6p/1p5k/P2p3b/3P3Q/2q2r2/4BP1P/3K3R b ',
 'b1B5/1r2p3/kp2P3/1N6/1P2Q3/8/3K4/8 w - - 0 1',
 '8/p6p/1p5k/P2p3b/3P3Q/2q2r2/4BP1P/3K3R b ',
 'rnbqkbnr/ppppp2p/5p2/6p1/3PP3/8/PPP2PPP/RNBQKBNR w '
];
let lengthOFArrayP = p.length -1;
let rundomNumbe = Math.round(Math.random()*lengthOFArrayP);
console.log(rundomNumbe);


let colr_Of_Move;
let po = p[rundomNumbe];
var j = po.slice(0,po.length-3);

// console.log(po.slice(3));
if (po[po.length-2] === 'w'){
colr_Of_Move = ' w ';
}else if (po[po.length-2] === 'b'){
    colr_Of_Move = ' b '}
    else {colr_Of_Move = '';}

// var DEFAULT_POSITION = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';