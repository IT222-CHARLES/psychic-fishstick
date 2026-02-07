<?php

$d = date("D");
echo $d . "<br>";

if($d == "Mon"){
    echo "its Monday";
} elseif($d == "Sat") {
    echo "its Saturday";
} else {
    echo "have a nice day";
}