#########################
Création de l'entité Post
#########################

Les entités, ou entity, sont des classes permettent de manipuler les données en base de donnéee.

Pour rappel notre entité Post contient les données suivantes :

.. container:: wy-text-center

    .. scruffy::

        [Post|title:string(100);date:datetime;body:text]


Dans un terminal, lancez la commande suivante pour créer votre entité :

$ php app/console generate:doctrine:entity

  Welcome to the Doctrine2 entity generator



This command helps you generate Doctrine2 entities.

First, you need to give the entity name you want to generate.
You must use the shortcut notation like AcmeBlogBundle:Post.

The Entity shortcut name:

Réponse : EpsiBlogBundle:Post



Dans notre application, nous retrouverons ainsi les Entity:

    * Post
    * Tag
    * User
    * Comment

Ces entités peuvent être stockées dans une base de données. Dans ce cas, nous utilisont un **ORM** (Object-Relation Mapper, ou mapping objet-relationnel en français).
Un ORM est un qui permet de créer l'illusion qu'une base de données relationnelle est une base de données orientée objet en définissant des correspondances entre la base de données et les objets manipulés dans le code.

Autrement dit, au lieu de manipiler des enregistrements qui se trouvent dans une table, on manipule des objets.

Dans Symfony, l'ORM par défaut et le plus utilisé s'appelle Doctrine.

.. toctree::
    :maxdepth: 2
    :glob:
    :hidden:

    entite/creation
    entite/*












