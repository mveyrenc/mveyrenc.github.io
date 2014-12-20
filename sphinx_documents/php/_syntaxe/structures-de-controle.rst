**************************
Les structures de contrôle
**************************

if/elseif/else
==============

.. code-block:: php

    if ( condition ) {
        commandes;
    } elseif ( condition ) {
        commandes;
    } else {
        commandes;
    }
    
while/do-while
==============

.. code-block:: php

    while ( expression ) {
        commandes
    }
    
    do {
        commandes;
    } while ( expression );
    
for
===

.. code-block:: php

    for (expr1; expr2; expr3) {
        commandes
    }
    
``expr1`` : début de la boucle. Par exemple ``$i = 0``.

``expr2`` : tant quelle est vraie, la boucle continue. Par exemple $i < 10.

``expr3`` : après chaque itération, elle est évaluée. Elle sert à passer de l'état initial (ici, ``$i = 0``) à l'état final (ici, ``$i = 10``). Par exemple ici, ``$i++``.

foreach
=======

.. code-block:: php

    foreach (array_expression as $value){
        commandes;
    }
    foreach (array_expression as $key => $value){
        commandes;
    }
    
break
=====

Il permet de sortir d'une structure  ``for``, ``foreach``, ``while``, ``do-while`` ou ``switch``.

continue
========

Il permet de sauter l'exécution de l'itération courante pour passer à la suivante dans les boucles (``for``, ``foreach``, ``while`` et ``do-while``).

switch
======

L'instruction switch équivaut à une série d'instructions if.

.. code-block:: php

    switch ( variable ) {
        case valeur1:
            commandes;
            break;
        case valeur2:
            commandes;
            break;
        case valeur3:
        case valeur4:
            commandes;
            break;
        default:
            commandes;
        }

declare
=======

.. code-block:: php

    declare (directive)
    
Il existe deux directives :

* ``ticks=N`` : un tick est un événement qui intervient toutes les N commandes bas niveau tickables.
* ``encoding='UTF-8'`` : pour spécifier l'endocage du script.

return
======
    
Stoppe l'exécution de la fonction courante et retourne la valeur au module appelant.

.. code-block:: php

    return valeur

include/require/include_once/require_once
=========================================

Ils permettent d'inclure et exécuter le fichier spécifié en argument. 

.. code-block:: php

    include 'fichier.php';
    require 'fichier.php';
    include_once 'fichier.php';
    require_once 'fichier.php';

Si une erreur survient :

* ``include`` et ``include_once`` émettront une alarme et le script continuera.
* ``require`` et ``require_once`` produiront une erreur fatale et le script s'arrêtera.

``include_once`` et ``require_once`` n'incluront pas deux fois le même script.
    
goto
====

L'opérateur goto peut être utilisé pour continuer l'exécution du script à un autre point du programme. 
La cible est spécifiée par un label, suivi de deux-point.

.. code-block:: php

    goto a;
    echo 'Foo';
 
    a:
    echo 'Bar';
    
    // Affiche Bar
 