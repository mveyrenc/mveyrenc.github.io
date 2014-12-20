*********************
Références et clonage
*********************

Depuis PHP 5, les objets sont tous des références. Ainsi, copier un objet vers un autre au moyen de l'opérateur "=" ne duplique pas l'objet, au contraire il créé une deuxième référence vers le même objet.

.. literalinclude:: _poo/code/references-clonage_1.php
    :language: php

Pour copier un objet, il faut utiliser l'opérateur ``clone`` :

.. literalinclude:: _poo/code/references-clonage_2.php
    :language: php
