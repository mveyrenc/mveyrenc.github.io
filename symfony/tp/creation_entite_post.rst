###########
Les entités
###########

Les entités, ou entity, sont des classes métiers qui décrivent chaque objet de notre application.

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












