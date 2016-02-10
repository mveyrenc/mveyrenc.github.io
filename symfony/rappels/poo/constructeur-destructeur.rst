.. _rappels-poo-construct-destruct:

*****************************
Constructeurs et destructeurs
*****************************

Constructeur
============

.. code-block:: php

    void __construct ([ mixed $args = "" [, $... ]] )

PHP permet aux développeurs de déclarer des constructeurs pour les classes. Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé.

Destructeur
===========

PHP 5 introduit un concept de destructeur similaire à celui d'autres langages orientés objet, comme le C++. La méthode destructeur est appelée dès qu'il n'y a plus de référence sur un objet donné, ou dans n'importe quel ordre pendant la séquence d'arrêt.

.. code-block:: php

    void __destruct ( void )