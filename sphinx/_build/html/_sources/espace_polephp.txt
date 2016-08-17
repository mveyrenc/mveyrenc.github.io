##############################
Documentation commune pôle PHP
##############################

************
Présentation
************

L'espace documentaire du pôle PHP est accessible depuis l'URL : http://docs.owsi-vm-polephp.accelance.net.

L'idée est de regrouper le maximum de documentations HTML / PDF / présentations générées via Sphinx.

Elles sont organisées par catégories :

- Outils
- Clients
- Clients archivés

*************************
Contribution sur le dépôt
*************************

.. code-block:: bash

    $ git clone https://gitlab.openwide.fr/open-wide/docs-polephp.git

Création d'une documentation client
===================================

Exemple : Je souhaite créer des spécifications fonctionnelles pour la refonte du site de mon client **Ministère de l'Intérieur**.

- S'il n'existe pas déjà, il faut au préalable créer un dépôt Git spécifique **au client**
- A la racine de ce dépôt, placer une image ``/logo.png`` relative au client
- A la racine également, créer un fichier ``/README`` optionnel qui peut donner des détails sur le client / projets ...
- Créer un dossier qui va contenir la documentation souhaitée, et nommer le dossier comme suit : ``[AAAA]-[type_projet]-[type_de_document]``, comme par exemple : ``2015-Site_ez-Specifications_fonctionnelles``.
- Dans le dépôt de documentation générale du pôle PHP, lier ce submodule nouvellement créé :

.. code-block:: bash

    $ git submodule add https://gitlab.openwide.fr/open-wide/[XXX_CLIENT_DOCS_XXX].git docs/clients/[XXX_CLIENT_XXX]

Création d'une documentation outils
===================================

Les outils du pôle ne sont pas dans des dépôts séparés, donc il n'est pas nécessaire de faire un submodule.

Placer simplement la documentation dans le dossier ``/outils/``.

Affichage dans le menu
======================

L'affichage des différents clients/outils n'est pas automatique, mais provient d'un fichier de configuration ``/config.php`` :

.. code-block:: php

    <?php
    $categories = array(
        /*
        'GROUP_LABEL' => array(
            'doc_folder_name' => 'LABEL',
        ),
        */
        'Outils' => array(
            'outils/docker' => 'Docker',
            'outils/drupal_7' => 'Drupal 7',
            'outils/sphinx' => 'Sphinx',
            'outils/symfony' => 'Symfony',
            // ...
        ),
        'Clients' => array(
            'clients/cfdt-f3c' => 'CFDT F3C',
            // ...
        ),
        'Clients archivés' => array(
            // ...
        ),
    );
