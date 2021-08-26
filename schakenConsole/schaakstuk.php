<?php
class schaakstuk
{
    public $kleur;
    public $actief;
    public $positie;


    public function __construct($kleur, $positie)
    {
        $this->kleur = $kleur;
        $this->actief = true;
        $this->positie = $positie;
    }

    function validatieMove($input)
    {
        global $spelbord;
        $valid = $this->moves();
        //arraycheck
        if (in_array($input, $valid)) {
            $spelbord[$this->positie] = ".";
            $this->positie = $input;
            $spelbord[$input] = $this;
            showBord($spelbord);
            return true;

        } else {
            return false;
        }

    }

    function showMoves()
    {
        global $spelbord;
        $tempbord = $spelbord;
        $valid = $this->moves();
        foreach ($valid as $pos) {
            if ($tempbord[$pos] !== "." && $tempbord[$pos]->kleur != $this->kleur) {
                $tempbord[$pos] = "X";

            } else {
                $tempbord[$pos] = "*";
            }

        }
        showBord($tempbord);

    }
}