<?php
function writemsg(){
    echo "HELLO WORLD";
}

function familyName($fname, $year){
    echo "$fname NIBATO is born in $year <br>";
}

function setHeigh($minheight = 50){
    echo "The height is $minheight <br>"; 
}

function sum($x, $y){
    $z = $x + $y;
    $message = "The $x + $y eqaul to $z";
    return $message;
}

function checkPN($number){
    if($number > 0){
        $message = "the number $number is Positive";
    }else {
         $message = "the number $number is Negative";
    }

    return $message;
}