***********
Généralités
***********

Les balises PHP
================

Tout code PHP doit être inclus dans une balise ``<?php ... ?>``.
Les balises courtes, ``<? ... ?>`` et ``<?= ... ?>``, sont acceptées si la configuration les autorisent,
mais ne sont pas recommandées.

Les instructions sont séparées par le point-virgule ``;``.

Les commentaires
================

Il existe trois manières d'inclure un commentaire dans du code PHP :

* entre les signes ``/*`` et ``*/``
* en commençant une ligne par ``//``
* en commençant une ligne par ``#``

Les signes ``/*`` et ``*/`` sont les seules qui permettent de faire un commentaire sur plusieurs lignes.
Pour les deux autres symboles, il faudra le remettre au début de chaque ligne de commentaire.

On peut mixer les types de commentaire dans un même script.

Les variables
=============

Un nom de variable commencent toujours par un dollar ``$``,
suivit d'au moins un caractère non numérique (underscore est autorisé) puis de n'importe quel caractère.
  
Les noms de variables sont sensibles à la case, donc $maVariable est différente de $ma_variable.
Il est donc vivement recommandé de fixer une norme pour le nommage des variables.

Les variables ne sont pas typées. Au cours de l'exécution du script, le type de la valeur affectée à une variable peut changer.
L'interpréteur se charge de gérer les allocations de mémoire nécessaires au stockage des valeurs référencées par les variables.

Il n'y a pas de déclaration de variable en PHP.
L'interpréteur crée automatiquement une variable dès qu'un nouveau symbole préfixé par ``$`` apparaît dans un script.

Les constantes
==============

Une constante est un symbole associé à une valeur mais, contrairement aux variables, sa valeur ne change jamais.
Elles sont définies par la commande ``define()``.

.. code-block:: php
    
    define("PI", 3.14116);
    define("FOO", "something");
	
    // Noms invalides
    define("2FOO", "something");
    
    // Ce nom est valide, mais évitez-le:
    // PHP peut un jour fournir une constante magique nommée
    // ainsi, ce qui va corrompre vos scripts.
    define("__FOO__", "something");
	
Par convention, les nom des constantes sont en majuscule.