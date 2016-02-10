.. _rappels-poo-resolution-porte:

****************************************
L'opérateur de résolution de portée (::)
****************************************

L'opérateur de résolution de portée, le symbole "double deux-points" (::), fournit un moyen d'accéder aux membres ``static`` ou ``constant``, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.

Lorsque vous référencez ces éléments en dehors de la définition de la classe, utilisez le nom de la classe.

.. literalinclude:: /rappels/code/constante-class.php
    :language: php
    :lines: 3-

Trois mots-clé spéciaux, ``self``, ``parent``, et ``static`` sont utilisés pour accéder aux propriétés ou aux méthodes depuis la définition de la classe.

Les mots clefs ``self`` et ``parent`` sont utilisés pour accéder à une propriété ou méthode (statique ou non) de la classe elle-même ou de son parent.

Le mot clef ``static`` a la même utilité mais il résout la portée au moment de l'exécution du script.

.. literalinclude:: /rappels/code/self-static.php
    :language: php
    :linenos:
    :lines: 2-

