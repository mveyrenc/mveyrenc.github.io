*************************
Création de l'entité Post
*************************

Les entités Doctrine sont de simples classes PHP avec des propriétés et des méthodes. Comme pour les bundles, Symfony propose un générateur créer ces classes.

Structure de l'entité Post
==========================

+-----------+---------------+-------------------+
| Nom       | Type de champ | Taille du champ   |
+===========+===============+===================+
| title     | string        | 100               |
+-----------+---------------+-------------------+
| date      | datetime      |                   |
+-----------+---------------+-------------------+
| body      | text          |                   |
+-----------+---------------+-------------------+

Utilisation du générateur
=========================

.. code-block:: console

    $ php app/console doctrine:generate:entity

Ce générateur vous demande dans un premier temps le nom de l'entité que vous souhaitez créer :

.. code-block:: console

      Welcome to the Doctrine2 entity generator

    This command helps you generate Doctrine2 entities.

    First, you need to give the entity name you want to generate.
    You must use the shortcut notation like AcmeBlogBundle:Post.

    The Entity shortcut name:

Ici, il faut saisir ``EpsiBlogBundle:Post``, autrement dit, le nom de votre bundle, suivit de ``:`` et efin le nom de l'entité.

Ensuite, Symfony votre demande quel format de la configuration de votre entité, vous gardez la valeur par défaut ``annotation`` :

.. code-block:: console

    Determine the format to use for the mapping information.

    Configuration format (yml, xml, php, or annotation) [annotation]:

Ensuite vous pouvez commencer à entrer les différents champs composant votre entité.

Commençez par ``title`` :

.. code-block:: console

    Instead of starting with a blank entity, you can add some fields now.
    Note that the primary key will be added automatically (named id).

    Available types: array, simple_array, json_array, object,
    boolean, integer, smallint, bigint, string, text, datetime, datetimetz,
    date, time, decimal, float, binary, blob, guid.

    New field name (press <return> to stop adding fields): title
    Field type [string]:
    Field length [255]: 10

Ensuite, passez au champ ``date`` :

.. code-block:: console

    New field name (press <return> to stop adding fields): date
    Field type [string]: datetimetz

Puis ``body`` :

.. code-block:: console

    New field name (press <return> to stop adding fields): body
    Field type [string]: text

Pour finir, lorsque Symfony vous propose d'entrer un nouveau champ, laissez le nom vide et validez. Cela permet d'arrêter l'ajout de champs dans l'entité.

Symfony vous propose ensuite de créer une classe repository vide, répondez ``yes`` à cette question :

.. code-block:: console

    New field name (press <return> to stop adding fields):

    Do you want to generate an empty repository class [no]? yes

Pour finir, Symfony vous demande de confirmer la génération de l'entité :

.. code-block:: console

      Summary before generation


    You are going to generate a "EpsiBlogBundle:Post" Doctrine2 entity
    using the "annotation" format.

    Do you confirm generation [yes]?


      Entity generation


    Generating the entity code: OK


      You can now start using the generated code!