***************
Syntaxe de base
***************

Les définitions des attributs et des méthodes sot rassemblés dans la structure ``class``.
Le mot-clé ``class`` est suivi du nom de la classe, suivit par une paire d'accolades contenant la définition de la classe.
Un nom de classe valide commence par une lettre ou un underscore, suivi de n'importe quel nombre de chiffres, ou de lettres, ou d'underscores, et ne pas être un mot réservé PHP.

La création d'une instance de classe (un objet) se faite en utilisant le mot-clé ``new``.

L'accès aux propriétés et au méthodes l'objet se fait par la flèche ``->``, et l'accès statique par l'opérateur de porté ``::``.

.. literalinclude:: _poo/code/syntaxe_1.php
    :language: php