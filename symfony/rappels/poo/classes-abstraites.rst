.. _rappels-poo-abstract:

******************
Classes abstraites
******************

Les classes définies comme abstraites ne peuvent pas être instanciées, et toute classe contenant au moins une méthode abstraite doit elle-aussi être abstraite.
Les méthodes définies comme abstraites déclarent simplement la signature de la méthode - elles ne peuvent définir son implémentation.
Lors de l'héritage d'une classe abstraite, toutes les méthodes marquées comme abstraites dans la déclaration de la classe parente doivent être définies par l'enfant.

.. literalinclude:: /rappels/code/classes-abstraites_1.php
    :language: php
    :linenos:
    :lines: 2-