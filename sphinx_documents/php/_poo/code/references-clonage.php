<?php
$voiture1 = new Voiture();
$voiture2 = $voiture1;
$voiture3 = & $voiture1;

$voiture1->kilometrage = 60;

var_dump($voiture1->kilometrage);   // Affiche int(60)
var_dump($voiture2->kilometrage);   // Affiche int(60)
var_dump($voiture3->kilometrage);   // Affiche int(60)

$voiture1 = null; // $voiture1 et $voiture3 deviennent null

var_dump($voiture1);    // Affiche NULL
var_dump($voiture2);    // Affiche 
                        //      object(Voiture)#3 (2) {                                                                                                 
                        //          ["kilometrage"]=>                                                                                                     
                        //          int(60)                                                                                                               
                        //          ["resteReservoir":protected]=>                                                                                        
                        //          int(60)                                                                                                               
                        //       }
var_dump($voiture3);    // Affiche NULL
?>