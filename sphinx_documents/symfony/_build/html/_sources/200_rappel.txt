------------------------------------------
Rappels sur de développement orienté objet
------------------------------------------

Les 10 commandements du bon développeur (PHP ou autre)

#. Apprenez les différences entre du bon et du mauvais code.

#. Mettre ses chaines de caractères entre simple quotes ``'..'`` est plus rapide qu’entre des doubles quotes ``".."`` car 
    PHP analyse s’il y’a des variables entre les doubles quotes. Utiliser les simple quote pour du texte pur.

#. Utiliser sprintf au lieu de mettre des variables dans des double quotes, C’est 10x plus rapide.

#. Utiliser le plus possible des variables pour les calculs, éviter de les mettre dans les boucles.

.. note:: 
    
    .. code-block:: php
    
        // Ne pas faire
        for ($x=0; $x < count($array); $x)
        
        // A faire
        $count = count($array);
        for ($x=0; $x < $count; $x)

Convention de nommage
=====================

