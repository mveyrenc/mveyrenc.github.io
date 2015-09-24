**********
Exceptions
**********

Les exceptions ne sont pas un système élaboré de gestion d'erreur. Une erreur est dans la majorité des cas assimilable à un bug, c'est à dire une réaction non désirée. Une exception est un traitement qui sera appelé lorsqu'un cas marginal est détecté pendant le déroulement du programme.

.. literalinclude:: _poo/code/exception_1.php
    :language: php

Lorsqu'une exception est lancée depuis un bloc ``try``, le bloc ``catch`` permet de l'attraper et de traiter l'incident.