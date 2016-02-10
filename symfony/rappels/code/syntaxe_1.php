<?php

class Voiture
{

    const CONSOMMATION = 4; # L/100km
    const CAPACITE_RESERVOIR = 60; #L

    public $kilometrage = 0;
    protected $resteReservoir = 60;

    public function roule($distance)
    {
        $this->kilometrage += $distance;
        $this->resteReservoir -= self::CONSOMMATION * $distance;
    }

    public function peutEncoreRouler()
    {
        echo $this->resteReservoir * self::CONSOMMATION;
    }

}

$voiture1 = new Voiture();
// Ceci peut également être réalisé avec une variable :
$className = 'Voiture';
$voiture2 = new $className(); // Voiture()

$voiture1->roule(60);
$voiture2->peutEncoreRouler();
var_dump(Voiture::CONSOMMATION);  // Affiche int(4)