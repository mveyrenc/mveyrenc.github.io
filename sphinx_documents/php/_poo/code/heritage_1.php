<?php
class Vehicule {
    
    public $kilometrage = 0;
    
    public function roule( $distance ) {
        $this->kilometrage += $distance;
    }

}

class Voiture extends Vehicule {

    const CONSOMMATION = 4; # L/100km
    const CAPACITE_RESERVOIR = 60; #L
    
    protected $resteReservoir = 60;
    
    public function roule( $distance ) {
        parent::roule( $distance );
        $this->resteReservoir -= self::CONSOMMATION * $distance;
    }

    public function peutEncoreRouler() {
        echo $this->resteReservoir * self::CONSOMMATION;
    }

}

class Velo extends Vehicule {}

$vehicule = new Vehicule();
$voiture = new Voiture();
$velo = new Velo();

$vehicule->roule( 60 );
$voiture->roule( 100 );
$velo->roule( 10 );

var_dump( $vehicule instanceof Voiture);    //Affiche false
var_dump( $vehicule instanceof Velo);       //Affiche false
var_dump( $vehicule instanceof Vehicule);   //Affiche true

var_dump( $voiture instanceof Voiture);     //Affiche true
var_dump( $voiture instanceof Velo);        //Affiche false
var_dump( $voiture instanceof Vehicule);    //Affiche true

var_dump( $velo instanceof Voiture);        //Affiche false
var_dump( $velo instanceof Velo);           //Affiche true
var_dump( $velo instanceof Vehicule);       //Affiche true