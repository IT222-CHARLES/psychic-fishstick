<?php
$cars = array("honda", "bmw" , "ferrari");
$toys = ["gun", "doll", "truck"];
$ages = ["peter" => 42, "john" => 26, "carlo" => 25];
$families = ["NIBATO" => ["John","Carlo","Steven"],
            "DOE" => ["Anna","Bryan","Rose"]];

echo $cars[0].'<br>';
echo $cars[1].'<br>';
echo $cars[2].'<br>';

$cars[] = 'Lamborgini';

echo $cars[3].'<br>';

echo '<br>';
echo $toys[0].'<br>';
echo $toys[1].'<br>';
echo $toys[2].'<br>';

$toys[] = "plate";
echo $toys[3].'<br>';
echo '<br>';
echo 'Peter is '. $ages['peter'].'<br>';
echo 'John is '. $ages['john'].'<br>';
echo 'Carlo is '. $ages['carlo'].'<br>';
echo '<br>';
echo "Is ". $families["NIBATO"][0]. ' from NIBATO FAM <br>';
echo "Is ". $families["NIBATO"][1]. ' from NIBATO FAM <br>';
echo "Is ". $families["NIBATO"][2]. ' from NIBATO FAM <br>';
echo '<br>';
echo "Is ". $families["DOE"][0]. ' from DOE FAM <br>';
echo "Is ". $families["DOE"][1]. ' from DOE FAM <br>';
echo "Is ". $families["DOE"][2]. ' from DOE FAM <br>';

$families["DOE"][] = "Kevin";
echo "Is ". $families["DOE"][3]. ' from DOE FAM <br>';