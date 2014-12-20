<?php

try {
    throw new Exception('Incident XY');
} catch (Exception $e) {
    echo $e->getMessage(); //affiche "Incident XY"
}