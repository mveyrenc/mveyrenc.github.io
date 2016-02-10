<?php

$voiture1 = new Voiture();
$voiture2 = clone $voiture1;

$voiture1->kilometrage = 60;
$voiture2->kilometrage = 40;

var_dump($voiture1->kilometrage);   // Affiche int(60)
var_dump($voiture2->kilometrage);   // Affiche int(40)

$voiture1 = null;

var_dump($voiture1);    // Affiche NULL
var_dump($voiture2);    // Affiche 
//      object(Voiture)#3 (2) {
//          ["kilometrage"]=>
//          int(40)
//          ["resteReservoir":protected]=>
//          int(60)
//       }