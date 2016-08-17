###########
Tests Behat
###########

Installation
============

`Behat <http://behat-drupal-extension.readthedocs.org/>`_ est installé par défaut dans le submodule Open Wide **drupal_builder**.

Pour en être sûr, placez-vous à la racine des sources du site puis lancez :

.. code-block:: bash

    $ git submodule update --init
    $ mkdir tests/
    $ ./bin/behat --init
    $ cp behat.example.yml behat.local.yml

Créez ensuite le fichier behat.yml comme suit :

.. literalinclude:: include/behat.yml
    :language: yaml

Pour la gestion de l'environnement, créer le fichier local contenant le chemin de l'instance Drupal + l'URL du site :

.. literalinclude:: include/behat.example.yml
    :language: yaml


Commandes utiles
================

.. code-block:: bash

    # Commandes accessibles sans surcharge
    $ ./bin/behat -dl

    # Idem avec emplacement des méthodes PHP
    $ ./bin/behat -di

    # Afficher les options de config disponibles
    $ ./bin/behat --config-reference

    # Lancement les tests
    $ ./bin/behat

    # Lancement des tests avec une configuration locale
    $ ./bin/behat --config behat.local.yml

    # Lancement des tests sur une feature particulière
    $ ./bin/behat --name=homepage

.. seealso::

    - http://behat-drupal-extension.readthedocs.org
    - http://docs.behat.org