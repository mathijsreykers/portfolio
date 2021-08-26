<?php
include "schaakstuk.php";
include "pion.php";
include "rook.php";
include "functies.php";

$letters = ["a","b","c","d","e","f","g","h"];
$rookZwart1= new pion("zwart","a8","r");
$knightZwart1= new pion("zwart","b8","n");
$bischopZwart1= new pion("zwart","c8","b");
$queenZwart= new pion("zwart","d8","q");
$kingZwart= new pion("zwart","e8","k");
$knightZwart2= new pion("zwart","f8","n");
$bishopZwart2= new pion("zwart","g8","b");
$rookZwart2= new pion("zwart","h8","r");
$pionZwart1= new pion("zwart","a7","p");
$pionZwart2= new pion("zwart","b7","p");
$pionZwart3= new pion("zwart","c7","p");
$pionZwart4= new pion("zwart","d7","p");
$pionZwart5= new pion("zwart","e7","p");
$pionZwart6= new pion("zwart","f7","p");
$pionZwart7= new pion("zwart","g7","p");
$pionZwart8= new pion("zwart","h7","p");
$rookWit1= new rook("wit","a1","R");
$knightWit1= new pion("wit","b1","N");
$bishopWit1= new pion("wit","c1","B");
$queenWit= new pion("wit","d1","Q");
$kingWit= new pion("wit","e1","K");
$knightWit2= new pion("wit","f1","N");
$bishopWit2= new pion("wit","g1","B");
$rookWit2= new rook("wit","h1","R");
$pionWit1= new pion("wit","a2","P");
$pionWit2= new pion("wit","b2","P");
$pionWit3= new pion("wit","c2","P");
$pionWit4= new pion("wit","d2","P");
$pionWit5= new pion("wit","e2","P");
$pionWit6= new pion("wit","f2","P");
$pionWit7= new pion("wit","g2","P");
$pionWit8= new pion("wit","h2","P");


$spelbord = ["a8"=>$rookZwart1,"b8"=>$knightZwart1,"c8"=>$bischopZwart1,"d8"=>$queenZwart,"e8"=>$kingZwart,"f8"=>$knightZwart2,"g8"=>$bishopZwart2,"h8"=>$rookZwart2,"a7"=>$pionZwart1,"b7"=>$pionZwart2,"c7"=>$pionZwart3,"d7"=>$pionZwart4,"e7"=>$pionZwart5,"f7"=>$pionZwart6,"g7"=>$pionZwart7,"h7"=>$pionZwart8,"a6"=>".","b6"=>".","c6"=>".","d6"=>".","e6"=>".","f6"=>".","g6"=>".","h6"=>".","a5"=>".","b5"=>".","c5"=>".","d5"=>".","e5"=>".","f5"=>".","g5"=>".","h5"=>".","a4"=>".","b4"=>".","c4"=>".","d4"=>".","e4"=>".","f4"=>".","g4"=>".","h4"=>".","a3"=>".","b3"=>".","c3"=>".","d3"=>".","e3"=>".","f3"=>".","g3"=>".","h3"=>".","a2"=>$pionWit1,"b2"=>$pionWit2,"c2"=>$pionWit3,"d2"=>$pionWit4,"e2"=>$pionWit5,"f2"=>$pionWit6,"g2"=>$pionWit7,"h2"=>$pionWit8,"a1"=>$rookWit1,"b1"=>$knightWit1,"c1"=>$bishopWit1,"d1"=>$queenWit,"e1"=>$kingWit,"f1"=>$knightWit2,"g1"=>$bishopWit2,"h1"=>$rookWit2];

$kleur="wit";

while(true) {
    $input = readline("\ngeeef je move $kleur ,vb a1 a2, show a2");

    if ($input == "stop") {
        return false;
    }
    $input = explode(" ", $input);
    $piece = $input[0];
    $dest = $input[1];
    if ($piece=="show"){
        $spelbord[$dest]->showMoves();
        continue;
    }
    if ($spelbord[$piece] != ".") {
        if ($spelbord[$piece]->kleur == $kleur&&$spelbord[$piece]->validate($dest) ) {

           $kleur=getOpp($kleur);
        } else {
            echo "move gaat niet ";
        }
    } else {
        echo "move gaat niet";
    }
}


