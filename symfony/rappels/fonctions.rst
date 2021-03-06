.. _rappels-fonctions:

#############
Les fonctions
#############

************************************
Fonctions définies par l'utilisateur
************************************

Une fonction peut être définie en utilisant la syntaxe suivante :

.. code-block:: php

    function foo($arg_1, $arg_2, /* ..., */ $arg_n) {
        echo "Exemple de fonction.\n";
        return $retval;
    }

Les noms de fonctions suivent les mêmes règles que les autres labels en PHP. 
Un nom de fonction valide commence par une lettre ou un underscore, suivi par un nombre quelconque de lettres, de nombres ou d'underscore.

Si il n'y a pas d'instruction ``return``, la fonction retourne ``NULL``.

*********************
Arguments de fonction
*********************

PHP supporte le passage d'arguments par valeur (comportement par défaut), 
le passage par référence, et des valeurs d'arguments par défaut. Une liste variable d'arguments est également supportée.

Passage d'arguments par valeur
==============================

.. code-block:: php

    function add_some_extra($string) {
        $string .= ', et un peu plus.';
    }
    $str = 'Ceci est une chaîne';
    add_some_extra($str);
    echo $str; // Affiche "Ceci est une chaîne"

Passage d'arguments par référence
=================================

.. code-block:: php

    function add_some_extra(&$string) {
        $string .= ', et un peu plus.';
    }
    $str = 'Ceci est une chaîne';
    add_some_extra($str);
    echo $str; // Affiche "Ceci est une chaîne, et un peu plus."

Valeur par défaut des arguments
===============================

.. code-block:: php

    function servir_cafe ($type = "cappuccino") {
        return "Servir un $type.\n";
    }
    echo servir_cafe(); // Affiche "Servir un cappuccino"
    echo servir_cafe(null); // Affiche "Servir un "
    echo servir_cafe("espresso"); // Affiche "Servir un espresso"

La valeur par défaut d'un argument doit obligatoirement être une constante, et ne peut être ni une variable, ni un membre de classe, ni un appel de fonction.

Les arguments sans valeur par défaut doivent être en avant ceux ayant une veleur par défaut.

.. code-block:: php

    function servir_cafe ($action, $type = "cappuccino") {
        return "Servir un $type.\n";
    }
    echo servir_cafe("Servir"); // Affiche "Servir un cappuccino"
    echo servir_cafe(null); // Affiche " un cappuccino"
    echo servir_cafe("Boire", "espresso"); // Affiche "Boire un espresso"

.. note::

    Depuis PHP 5, les arguments passés par référence doivent avoir une valeur par défaut.
    
Nombre d'arguments variable
===========================

PHP supporte les fonctions à nombre d'arguments variable. 
Ceci est implémenté en utilisant le mot-clé ``...`` en PHP 5.6 et suivants, et en utilisant les fonctions `func_num_args()`, `func_get_arg()` et `func_get_args()` en PHP 5.5 et antérieurs.

En PHP 5.6
^^^^^^^^^^

.. code-block:: php

    function sum(...$numbers) {
        $acc = 0;
        foreach ($numbers as $n) {
            $acc += $n;
        }
        return $acc;
    }

    echo sum(1, 2, 3, 4); // Affiche 10

Le mot-clé `...` peut aussi servir à passer des arguments à une fonction :

.. code-block:: php

    function add($a, $b) {
        return $a + $b;
    }

    echo add(...[1, 2]); //Affiche 3

    $a = [1, 2];
    echo add(...$a); ; //Affiche 3

Les anciennes versions de PHP
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Aucune syntaxe spéciale n'est nécessaire pour spécifier qu'une fonction est variable ; 
cependant, l'accès aux arguments de la fonction nécessite l'utilisation des fonctions 

* ``func_num_args()`` pour avoir le nombre d'attibuts
* ``func_get_arg( int $arg_num )`` pour avoir un attribut précis
* ``func_get_args()`` pour obtenir la liste des attributs

.. code-block:: php

    function sum() {
        $acc = 0;
        foreach (func_get_args() as $n) {
            $acc += $n;
        }
        return $acc;
    }

    echo sum(1, 2, 3, 4); // Affiche 10

Typage des arguments
====================

.. code-block:: php

    function servir_cafe (string $action, $type = "cappuccino") {
        return "Servir un $type.\n";
    }
    echo servir_cafe("Servir"); // Fonctionne : Affiche "Servir un cappuccino"
    echo servir_cafe(null); // Erreur fatale : Argument 1 doit être une chaine de caractères
    echo servir_cafe("Boire", "espresso"); // Fonctionne : Affiche "Boire un espresso"

*******************
Fonctions variables
*******************

PHP supporte le concept de fonctions variables. 
Cela signifie que si le nom d'une variable est suivi de parenthèses, PHP recherchera une fonction de même nom, et essaiera de l'exécuter. 
Cela peut servir, entre autres, pour faire des fonctions de rappel, des tables de fonctions...

.. code-block:: php

    function foo() {
        echo "dans foo()<br />\n";
    }

    function bar($arg = '')
    {
        echo "Dans bar(); l'argument était '$arg'.<br />\n";
    }

    // Ceci est une fonction détournée de echo
    function echoit($string)
    {
        echo $string;
    }

    $func = 'foo';
    $func();        // Appel foo()

    $func = 'bar';
    $func('test');  // Appel bar()

    $func = 'echoit';
    $func('test');  // Appel echoit()

******************
Fonctions anonymes
******************

Les fonctions anonymes, aussi appelées fermetures ou closures permettent la création de fonctions sans préciser leur nom.

.. code-block:: php 

    echo preg_replace_callback('~-([a-z])~', function ($match) {
        return strtoupper($match[1]);
    }, 'bonjour-le-monde'); // Affiche "bonjourLeMonde"

.. code-block:: php

    $greet = function($name) {
        printf("Bonjour %s", $name);
    };

    $greet('World'); // Affiche "Bonjour World"
    $greet('PHP'); // Affiche "Bonjour PHP"