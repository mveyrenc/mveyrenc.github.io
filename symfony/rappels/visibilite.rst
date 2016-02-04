**********
Visibilité
**********

La visibilité d'une propriété ou d'une méthode peut être définie en préfixant sa déclaration avec un mot-clé : ``public``, ``protected``, ou ``private``. 

Les éléments déclarés comme **publics** peuvent être utilisés par n'importe quelle partie du programme. 

L'accès aux éléments **protégés** est limité à la classe elle-même, ainsi qu'aux classes qui en héritent, et à ses classes parentes.

L'accès aux éléments **privés** est uniquement réservé à la classe qui les a défini.

.. literalinclude:: /rappels/code/visibilite_1.php
    :language: php