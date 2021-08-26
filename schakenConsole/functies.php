<?php
function getOpp($kleur){
    if($kleur=="zwart"){
        return "wit";}else{
        return "zwart";
    }
}

function indexCol($string){
    global $letters;
    $col=substr($string,0,1);
    $index = array_search($col,$letters);
    return $index;

}

function showBord($bord){

    $count = 0;
    $row = 8;
    echo "      A  B  C  D  E  F  G  H";
    echo"\n    ____________________________";


    foreach($bord as $pos){
        $count++;
        if($count==1){
            echo "\n$row  |  ";
        }

        if($pos=="."||$pos=="*"||$pos=="X"){
            echo $pos."  ";

        }else{
            echo $pos->visual."  ";
        }

        if ($count%8==0){
            echo "  |  $row";
            $count=0;
            $row=$row-1;
        }
    }
    echo"\n    ____________________________";
    echo "\n      A  B  C  D  E  F  G  H";




}