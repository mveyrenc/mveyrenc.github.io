.. _rappels-syntaxe-types:

*********
Les types
*********

Les booléens
============

Il peut valoir ``TRUE`` ou ``FALSE``.
 
Lors d'une conversion en booléen, les valeurs suivantes sont considérées comme ``FALSE`` :
 
* le booléen ``FALSE``, lui-même
* l'entier ``0``
* le nombre à virgule flottante ``0.0``
* la chaîne vide, et la chaîne ``"0"``
* un tableau avec aucun élément ``array()``
* le type spécial ``NULL`` (incluant les variables non définies)

Les numériques
==============

Ils comprennent les entiers et les flottants.

Les entiers peuvent être spécifiés en notation décimale (base 10), hexadécimale (base 16), octale (base 8), ou binaire (base 2), optionnellement précédée d'un signe (- ou +).

Les entiers littéraux binaires sont disponibles depuis PHP 5.4.0.

Pour utiliser la notation octale, précédez le nombre d'un 0 (zéro).
Pour utiliser la notation hexadécimale, précédez le nombre d'un 0x.
Pour utiliser la notation binaire, précédez le nombre d'un 0b.

.. code-block:: php

	$a = 1234; // un nombre décimal
	$a = -123; // un nombre négatif
	$a = 0123; // un nombre octal (équivalent à 83 en décimal)
	$a = 0x1A; // un nombre héxadecimal (équivalent à 26 en décimal)
	$a = 0b11111111; // un nombre binaire (équivalent à 255 en décimal)
	
Les flottants peuvent être spécifiés en utilisant les syntaxes suivantes :

.. code-block:: php

    $a = 1.234;
    $b = 1.2e3;
    $c = 7E-10;

Les chaînes de caractères
=========================

Une chaîne de caractères littérale peut être spécifiée de 4 façons différentes :

* Entourée de guillemets simples
  
  .. code-block:: php
  
    echo 'Arnold a dit : "I\'ll be back"'              // Affiche : Arnold a dit : "I'll be back"
    echo 'Ceci n\'affichera pas \n de nouvelle ligne'  // Affiche : Ceci n'affichera pas \n de nouvelle ligne
    echo 'Les variables ne seront pas $traitees $ici'  // Affiche : Les variables ne seront pas $traitees $ici
    
* Entourée de guillemets doubles
  
  .. code-block:: php
  
    $juice = "pomme";
    echo "Il a bu du jus de $juice.".PHP_EOL;     // Affiche : Il a bu du jus de pomme."
    echo "Il a bu du jus constitué de $juices."   // Affiche : Il a bu du jus constitué de .

* Syntaxe Heredoc
  
  .. code-block:: php
  
    $str = <<<EOD
    Exemple de chaîne
    sur plusieurs lignes
    en utilisant la syntaxe Heredoc.
    EOD;

    $name = 'MyName';
    $foo = 'Foo';
    $foobar = 'Bar2';
    echo <<<EOT
    Mon nom est "$name". J'affiche quelques ${foo}.
    Maintenant, j'affiche quelques {$foobar}.
    Et ceci devrait afficher un 'A' majuscule : \x41
    EOT;
    
    // Affiche
    // Mon nom est "MyName". J'affiche quelques Foo.
    // Maintenant, j'affiche quelques Bar2.
    // Et ceci devrait afficher un 'A' majuscule : A

    <<<FOOBAR
    My text
    FOOBAR;

    // Depuis PHP 5.3.0, l'identifiant de début de syntaxe Heredoc peut éventuellement être écrit entre guillemets doubles :
    echo <<<"FOOBAR"
    Hello World!
    FOOBAR;
    
* Syntaxe Nowdoc (depuis PHP 5.3.0) 
  
  .. code-block:: php
  
    $str = <<<'EOD'
    Exemple de chaîne
    sur plusieurs lignes
    en utilisant la syntaxe Nowdoc.
    EOD;
  
    echo <<<'EOT'
    Mom nom est "$name". J'affiche quelques $foo->foo.
    Maintenant, j'affiche quelques {$foo->bar[1]}.
    Ceci ne devrait pas afficher un 'A' : \x41
    EOT;
  
    // Affiche
    // Mom nom est "$name". J'affiche quelques $foo->foo.
    // Maintenant, j'affiche quelques {$foo->bar[1]}.
    // Ceci ne devrait pas afficher un 'A' : \x41

Les tableaux
============

Un tableau est un ensemble qui associe une clé à une valeur.
Une clé est un entier ou une chaîne de caractères.
La valeur peut être de n'importe quel type. 

.. code-block:: php
  
    $array = array(
        key  => value,
        key2 => value2,
        key3 => value3,
        ...
    )
    
Depuis PHP 5.4.0, il existe une syntaxe courte pour déclarer un tableau :

.. code-block:: php

   $array = [
        key  => value,
        key2 => value2,
        key3 => value3,
        ...
    ]
    
Les objets
==========

Pour instancier un nouvel objet, il faut utiliser le mot-clé ``new`` :

.. code-block:: php
    
    $date = new DateTime('2015-01-01');
    
On utilise le synbole ``->`` pour accéder au méthodes et attributs de l'objet :

.. code-block:: php
    
    $date->format('d/m/Y');