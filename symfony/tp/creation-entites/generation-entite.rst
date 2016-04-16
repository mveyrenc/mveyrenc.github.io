######################
Génération de l'entité
######################

Dans un terminal, lancez la commande suivante pour créer votre entité :

.. code-block:: console

    $ php app/console generate:doctrine:entity

      Welcome to the Doctrine2 entity generator



    This command helps you generate Doctrine2 entities.

    First, you need to give the entity name you want to generate.
    You must use the shortcut notation like AcmeBlogBundle:Post.

    The Entity shortcut name:

**Répondez** ``EpsiBlogBundle:Post``

.. code-block:: console

    Determine the format to use for the mapping information.

    Configuration format (yml, xml, php, or annotation) [annotation]:

**Répondez** ``annotation``

***************
Champ ``title``
***************

    .. code-block:: console

        Instead of starting with a blank entity, you can add some fields now.
        Note that the primary key will be added automatically (named id).

        Available types: array, simple_array, json_array, object,
        boolean, integer, smallint, bigint, string, text, datetime, datetimetz,
        date, time, decimal, float, binary, blob, guid.

        New field name (press <return> to stop adding fields):

    **Répondez** ``title``

    .. code-block:: console

        Field type [string]:

    **Répondez** ``string``

    .. code-block:: console

        Field length [255]:

    **Répondez** ``100``

**************
Champ ``date``
**************

    .. code-block:: console

        New field name (press <return> to stop adding fields):

    **Répondez** ``date``

    .. code-block:: console

         Field type [string]:

    **Répondez** ``datetime``

**************
Champ ``body``
**************

    .. code-block:: console

         New field name (press <return> to stop adding fields):

    **Répondez** ``body``

    .. code-block:: console

        Field type [string]:

    **Répondez** ``text``

************************************
Finalisation la création de l'entité
************************************

    .. code-block:: console

        New field name (press <return> to stop adding fields):

    **Tapez juste sur la touche Entrée pour stopper l'ajout de champ dans l'entité**

    .. code-block:: console

        Do you want to generate an empty repository class [no]?

    **Répondez** ``yes``

    .. code-block:: console

          Summary before generation


        You are going to generate a "EpsiBlogBundle:Post" Doctrine2 entity
        using the "annotation" format.

        Do you confirm generation [yes]?

    **Répondez** ``yes``

Le générateur a créé deux fichiers dans le dossier ``src/Epsi/Bundle/BlogBundle/Entity/`` :

    :file:`Post.php`
        Ce fichier contient la classe ``Post`` qui représente un post dans notre application.

    :file:`PostRepository.php`
        Ce fichier contient la classe ``PostRepository`` qui permet de faire des requêtes dans la table qui contient les posts dans notre base de données.