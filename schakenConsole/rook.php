<?php

class rook extends schaakstuk {
    public $moves;
    public $visual;

    public function __construct($kleur,$positie,$visual)
    {
        parent::__construct($kleur,$positie);
        $this->moves=["mulVooruit"];
        $this->visual = $visual;
    }

    function moves(){
        $valid=[];
        global $spelbord;
        global $letters;

//        verticaal
        $currentRow=substr($this->positie, 1, 1);
        $currentCol=substr($this->positie,0,1);
        for($x=0;$x<2;$x++){


            $col= substr($this->positie,0,1);
            if($x==0){
                $row=$currentRow+1;
            }else{
                $row = $currentRow-1;
            }

            while(true){
                $new = "$col$row";
                if( $row<9&&$row>0&&is_String($spelbord[$new])){
                    print_r(is_string($spelbord['a3']));
                    array_push($valid,$new);
                    if($x==0){
                        $row++;
                    }else{
                        $row--;
                    }
                }else if( $row<9 && $row>0 && $spelbord[$new]->kleur==getOpp($this->kleur) ){
                    array_push($valid,$new);
                    break;
                }else {break;}
            }

        }//        horizontaal
        for($y=0;$y<2;$y++) {

            if ($y == 0&& indexCol($currentCol)<7) {
                $index = indexCol($currentCol) + 1;
                $col = $letters[$index];
            } else if($y==1&&indexCol($currentCol)>0){
                $index = indexCol($currentCol) - 1;
                $col = $letters[$index];
            }

            while (true) {
                $new = "$col$currentRow";
                if ($index < 8 && $currentRow > 0 && $spelbord[$new] == ".") {
                    array_push($valid, $new);
                    if ($y == 0) {
                        $index = indexCol($col) + 1;
                        if($index!=8){
                            $col = $letters[$index];
                        }


                    } else {
                        $index = indexCol($col) - 1;
                        if($index!=-1){
                            $col = $letters[$index];
                        }

                    }
                } else if ($index < 8 && $index > -1 && $spelbord[$new]->kleur == getOpp($this->kleur)) {
                    array_push($valid, $new);
                    break;
                } else {
                    break;
                }
            }
        }return $valid;
    }

    function validate($input){
    return parent::validatieMove($input);
        }



function showMoves(){
    parent::showMoves();
}




}