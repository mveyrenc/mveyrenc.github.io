############################
Les tests de qualité de code
############################

Les tests de qualité de code détectent les violations des règles de codage.

Les règles de codage définissent les bonnes pratiques à respecter et les mauvaises à éviter. Elles définissent également les convensions de nommage et de formatage du code à respecter.

***************
PHP_CodeSniffer
***************

CodeSniffer fournit 2 exécutables :

``phpcs``
    Détecte les violations des règles de codage dans le code PHP, CSS et Javascript

``phpcbf``
    Corrige les violations détectées

************
Installation
************

CodeSniffer s'installe via

* les dépôts (paquet php-codesniffer)
* pear ``pear install PHP_CodeSniffer``
* composer

    * ``composer global require "squizlabs/php_codesniffer=*"``
    * .. code-block:: json

        {
            "require-dev": {
                "squizlabs/php_codesniffer": "2.*"
            }
        }

*************************
Intégration dans PhpStorm
*************************

Intallez les plugins **Php Inspections (EA Extended)** et **PHP Toolbox**.

Téléchargez les règles de codage de votre choix :

* `Symfony2 <https://github.com/djoos/Symfony2-coding-standard>`_
* `Drupal <https://www.drupal.org/project/coder>`_

Déposez les fichiers téléchargés dans un sous-répertoire dans le répertoire ``Standards`` de CodeSniffer. Par exemple ``/usr/share/php/PHP/CodeSniffer/Standards/Symfony2``.

Paramétrez le chemin vers ``phpcs`` dans :menuselection:`Settings --> Languages & Frameworks --> PHP --> Code Sniffer` :

    .. thumbnail:: /_static/images/phpstorm-phpcs-path.png
        :align: center

Paramétrez les règles utilisées pour l'inspection dans :menuselection:`Settings --> Editor --> Inspections --> PHP --> PHP Code Sniffer validation` :

    .. thumbnail:: /_static/images/phpstorm-phpcs-rules.png
        :align: center

***********
Utilisation
***********

L'analyse CodeSniffer est lancée lors de l'édition des fichiers.

Les problèmes sont signalés par :

* code couleur dans la barre de défilement
* code souligné
* puce de couleur en haut à droite

    .. thumbnail:: /_static/images/phpstorm-phpcs-errors.png
        :align: center