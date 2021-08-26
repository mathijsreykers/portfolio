<?php
class pion extends schaakstuk {
    public $moves;
    public $visual;

    public function __construct($kleur,$positie,$visual)
    {
        parent::__construct($kleur,$positie);
        $this->moves=["eenVooruit","mulVooruit","pionStart","pionNeem","schuin"];
        $this->visual = $visual;
    }

    function moves(){
        $valid=[];
        global $spelbord;
        global $letters;

//        vooruit
        $currentRow=substr($this->positie, 1, 1);

        if($this->kleur=="wit") {
            $row = $currentRow + 1;
            
        }else{
            $row = $currentRow- 1;
        }
        $col= substr($this->positie,0,1);

        $new = "$col$row";
        if($spelbord[$new]=="."&& $row<9&&$row>0){
            array_push($valid,$new);

        }

        //2 vooruit bij start
        if($this->kleur=="wit"&& $currentRow==2) {
            $row = $currentRow + 2;
            $new = "$col$row";
            if ($spelbord[$new] == "." && $row < 9 && $row > 0) {
                array_push($valid, $new);}
        } else if ($currentRow = 7) {
            $row = $currentRow - 2;
            $new = "$col$row";
            if ($spelbord[$new] == "." && $row < 9 && $row > 0) {
                array_push($valid, $new);

            }

        }


        //schuin slagen

        $col= substr($this->positie,0,1);
        for($x=0;$x<2;$x++){
            if($x==0&& indexCol($col)<7){
                $colum =$letters[indexCol($col)+1];
                $new = "$colum$row";
                if( indexCol($colum)<9&&$row<9 && $spelbord[$new]!="."){
                    $kleur= $spelbord[$new]->kleur;
                }else{
                    $kleur="geen";
                }

                if(($this->kleur=="wit"&&$kleur=="zwart")||$this->kleur=="zwart"&&$kleur=="wit"){
                    array_push($valid,$new);

                }

            }if($x==1&&indexCol($col)-1>-1){
                $col =$letters[indexCol($col)-1];
                $new = "$col$row";
                if($spelbord[$new]!="."&&$col>-1&&$row<9){
                    $kleur= $spelbord[$new]->kleur;
                }else{
                    $kleur="geen";
                }
                if(($this->kleur=="wit"&&$kleur=="zwart")||$this->kleur=="zwart"&&$kleur=="wit"){
                    array_push($valid,$new);

                }
            }

        }
        return $valid;

    }

    function validate($input){
        return parent::validatieMove($input);
    }



    function showMoves(){
        parent::showMoves();
    }
}