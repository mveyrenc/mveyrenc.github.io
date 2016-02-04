.. _aide-memoire-console:

#######
Console
#######

********************
Création d'un bundle
********************

.. code-block:: console

    $ php app/console generate:bundle
    # puis répondre aux questions

*********************
Création d'une entité
*********************

.. code-block:: console

    $ php app/console doctrine:generate:entity
    # puis répondre aux questions

*****************************************************
Déployer les fichiers statiques des bundles dans web/
*****************************************************

.. code-block:: console

    $ php app/console assets:install web --symlink

****************************
Manipuler la base de données
****************************

.. code-block:: console

    # créer la base de données
    $ php app/console doctrine:database:create

    # supprimer la base de données
    $ php app/console doctrine:database:drop

    # afficher les requêtes SQL nécessaire pour créer le schéma de la base
    $ php app/console doctrine:schema:create --dump-sql

    # exécuter les requêtes SQL nécessaire pour créer le schéma de la base
    $ php app/console doctrine:schema:create

    # afficher les requêtes SQL nécessaire pour supprimer le schéma de la base
    $ php app/console doctrine:schema:drop --dump-sql

    # exécuter et/ou afficher les requêtes SQL nécessaire pour supprimer le schéma de la base
    $ php app/console doctrine:schema:drop --dump-sql --force

    # exécuter et/ou afficher les requêtes SQL nécessaire pour mettre à jour le schéma de la base
    $ php app/console doctrine:schema:update --dump-sql --force

    # vérifier les entités Doctrine et si le schéma de la base de données est à jour
    $ php app/console doctrine:schema:validate

******************
Génération de code
******************

.. code-block:: console

    # générer la classe de formulaire associée à une entité
    $ php app/console doctrine:generate:form EpsiBlogBundle:User

    # générer le contrôleur, les templates et le formulaire pour gérer une entité
    $ php app/console doctrine:generate:crud
    # puis répondre aux questions

    # compléter les entités en fonction des annotations présentes dans les entités
    $ php app/console doctrine:generate:entities EpsiBlogBundle[:User]

****************************************
Transformer la configuration des entités
****************************************

.. code-block:: console

    $ php app/console doctrine:mapping:convert annotation ./src/Epsi/Bundle/BlogBundle/Entity

*****
Debug
*****

.. code-block:: console

    # voir toutes les routes
    $ php app/console debug:route

    # effacer le cache
    $ php app/console cache:clear

    # voir la liste des services
    $ php app/console debug:container