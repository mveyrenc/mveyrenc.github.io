.. _rappels-poo-extend:

********
Héritage
********

On parle d'**héritage** lorsque l'on définit une hiérarchie de classes. L'héritage est très utile pour définir et abstraire certaines fonctionnalités communes à plusieurs classes, tout en permettant la mise en place de fonctionnalités supplémentaires dans les classes enfants, sans avoir à réimplémenter en leur sein toutes les fonctionnalités communes.

Lorsque vous étendez une classe, la classe fille hérite de toutes les méthodes publiques et protégées de la classe parente. Tant qu'une classe n'écrase pas ces méthodes, elles conservent leur fonctionnalité d'origine.

L'héritage est très utile pour définir et abstraire certaines fonctionnalités communes à plusieurs classes, tout en permettant la mise en place de fonctionnalités supplémentaires dans les classes enfants, sans avoir à réimplémenter en leur sein toutes les fonctionnalités communes.

.. literalinclude:: /rappels/code/heritage_1.php
    :language: php
    :linenos:
    :lines: 2-

Le mot clé ``final`` empêche les classes filles de surcharger une méthode. Si la classe elle-même est définie comme finale, elle ne pourra pas être étendue.