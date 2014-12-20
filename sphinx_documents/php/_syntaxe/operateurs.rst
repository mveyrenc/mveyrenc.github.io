**************
Les opérateurs
**************

Les opérateurs arithmétiques
============================

* Négation ``-`` : ``-$a``
* Addition ``+`` : ``$a + $b``
* Soustraction ``-`` : ``$a - $b``
* Multiplication ``*`` : ``$a * $b``
* Division ``/`` : ``$a / $b``
* Modulo ``%`` : ``$a % $b``
* Exponentielle ``**`` : ``$a ** $b``

Les opérateurs d'affectation
============================

L'opérateur d'affectation est le signe "=".

En plus du simple opérateur d'affectation, il existe des "opérateurs combinés" pour tous les opérateurs arithmétiques, l'union de tableaux et pour les opérateurs sur les chaînes de caractères :

.. code-block:: php

    $a = 3;
    $a += 5; // affecte la valeur 8 à la variable $a correspond à l'instruction '$a = $a + 5';

    $b = "Bonjour ";
    $b .= " tout le monde!";  // affecte la valeur "Bonjour tout le monde!" 
                              // à la variable $b
                              // identique à $b = $b . " tout le monde!";
                              
    $c = array("a" => "pomme", "b" => "banane");
    $d = array("a" =>"poire", "b" => "fraise", "c" => "cerise");
    $c += $d;  // affecte la valeur array("a" =>"pomme", "b" => "banane", "c" => "cerise")
               // à la variable $c
               // correspond à l'instruction '$c = $c + $d';

Les opérateurs sur les bits
===========================

* And (Et) ``&`` : ``$a & $b``
* Or (Ou) ``|`` : ``$a | $b``
* Xor (ou exclusif) ``^`` : ``$a ^ $b``
* Not (Non) ``~`` : ``$a ~ $b``
* Décalage à gauche ``<<`` : ``$a << $b``
* Décalage à droite ``>>`` : ``$a >> $b``

Opérateurs de comparaison
=========================

* Égal ``==`` : ``$a == $b`` (égaux après transtypage)
* Identique ``===`` : ``$a === $b`` (égaux et de même type)
* Différent ``!=`` : ``$a != $b`` (différents après transtypage)
* Différent ``<>`` : ``$a <> $b`` (différents après transtypage)
* Non-identique ``!==`` : ``$a !== $b`` (différents et de même type)
* Plus petit que ``<`` : ``$a < $b``
* Plus grand ``>`` : ``$a > $b``
* Inférieur ou égal ``<=`` : ``$a <= $b``
* Supérieur ou égal ``>=`` : ``$a >= $b``

Opérateur de contrôle d'erreur
==============================

PHP supporte un opérateur de contrôle d'erreur : c'est ``@``. 
Lorsque cet opérateur est ajouté en préfixe d'une expression PHP, les messages d'erreur qui peuvent être générés par cette expression seront ignorés. 

Opérateur d'exécution
=====================

PHP supporte un opérateur d'exécution : guillemets obliques ("``"). Notez bien qu'il ne s'agit pas de guillemets simples.
PHP essaie d'exécuter le contenu de ces guillemets obliques comme une commande shell.
Le résultat sera retourné (i.e. : il ne sera pas simplement envoyé à la sortie standard, il peut être affecté à une variable).
Utilisez les guillemets obliques revient à utiliser la fonction shell_exec().

Opérateurs d'incrémentation et décrémentation
=============================================

* Pré-incrémente ``++`` : ``++$a``
* Post-incrémente ``++`` : ``$a++``
* Pré-décrémente ``--`` : ``--$a``
* Post-décrémente ``--`` : ``$a++``

.. code-block:: php

    $a = 5;
    echo $a++; // Affiche 5
    echo $a;   // Affiche 6
    
    $a = 5;
    echo ++$a; // Affiche 6
    echo $a;   // Affiche 6

    $a = 5;
    echo $a--; // Affiche 5
    echo $a;   // Affiche 4
    
    $a = 5;
    echo --$a; // Affiche 4
    echo $a;   // Affiche 4

Les opérateurs logiques
=======================

* And (Et) ``&&`` : ``$a && $b``
* Or (Ou) ``||`` : ``$a || $b``
* XOR ``xor`` : ``$a xor $b``
* Not (Non) ``!`` : ``!$a``
* And (Et) ``and`` : ``$a and $b``
* Or (Ou) ``or`` : ``$a or $b``

La raison pour laquelle il existe deux types de "ET" et de "OU" est qu'ils ont des priorités différentes.
Voir le paragraphe |operateur_doc_link| de la doc de PHP.

.. |operateur_doc_link| raw:: html

   <a href="http://fr2.php.net/manual/fr/language.operators.precedence.php" target="_blank">précédence d'opérateurs</a>
   
   
Opérateur de chaînes
====================

L'opérateur de concaténation est le signe ".".

Opérateurs de tableaux
======================

* Union ``+`` : ``$a + $b``
* Égalité ``==`` : ``$a == $b``
* Identique ``===`` : ``$a === $b``
* Inégalité ``!=`` : ``$a != $b``
* Inégalité ``<>`` : ``$a <> $b``
* Non-identique ``!==`` : ``$a !== $b``

Opérateurs de types
===================

``instanceof`` est utilisé pour déterminer si une variable PHP est un objet instancié d'une certaine classe, d'une classe héritées, d'une interface ou s'il est de la même classe qu'un autre objet.

.. code-block:: php

    interface InterfaceI {}
    class ClassA  implements InterfaceI {}
    class ClassB {}

    $a = new ClassA();
    $b = new ClassA();
    $c = new ClassB();
    $d = 'ClassA';
    $e = 'ClassB';
    
    $a instanceof ClassA // Retourne TRUE
    $a instanceof ClassB // Retourne FALSE
    $a instanceof InterfaceI // Retourne TRUE
    $a instanceof $b // Retourne TRUE
    $a instanceof $c // Retourne FALSE
    $a instanceof $d // Retourne TRUE
    $a instanceof $e // Retourne FALSE
    
    
    