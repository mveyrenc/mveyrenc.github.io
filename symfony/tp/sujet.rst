###########
Sujet du TP
###########

Le blog que nous allons créer est très simple. En voici les grandes lignes :

* Nous aurons des posts écrits par des auteurs, auxquels nous attacherons des tags.
* Les tags pourront être attachés à plusieurs posts.
* Les auteurs peuvent écrire plusieurs posts.
* Nous pourrons lire, écrire, éditer et rechercher des posts.
* Nous pourrons créer, modifier et supprimer des tags.
* Nous pourrons également commenter les posts.
* Nous n'aurons pas de système de gestion des utilisateurs : nous devrons choisir l'utilisateur lorsque nous rédigerons un post ou un commentaire.

.. entite-tp-schema-start

.. container:: wy-text-center

    .. uml::

        @startuml

        object User {
            username    string[30]
            email       string[100]
            password    string[100]
        }

        object Post {
            title   string[100]
            date    datetime
            body    text
        }

        object Tag {
            name    string[30]
        }

        object Comment {
            date    datetime
            comment text
        }

        User "1" -- "0..*" Post : écrit >
        Tag "0..*" -- "0..*" Post : tagge >
        Comment "0..*" - "1" Post : commente >
        User "1" - "0..*" Comment : écrit >

        @enduml

.. entite-tp-schema-end

