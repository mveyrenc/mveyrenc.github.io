######################
Autres entités du blog
######################

Créez les autres entités nécessaires à la réalisation du blog :

****
User
****

.. container:: wy-text-center

    .. uml::

        @startuml

        object User {
            username    string[30]
            email       string[100]
            password    string[100]
        }

        @enduml

***
Tag
***

.. container:: wy-text-center

    .. uml::

        @startuml

        object Tag {
            name    string[30]
        }

        @enduml

*******
Comment
*******

.. container:: wy-text-center

    .. uml::

        @startuml

        object Comment {
            date    datetime
            comment text
        }

        @enduml
