############################
Quelques notions à connaitre
############################

Relation en base de données
===========================

Dans une base de données relationnelle, il y a trois possibilités pour lier des tables entre elle :

    .. container:: wy-text-center

        .. uml::

            @startuml

            note "PK = clé primaire" as N1
            note "FK = clé étrangère" as N2

            @enduml

* One-To-One :  relation unique entre deux objets

    Une personne a un seul permis de conduire. Un permis est détenu par une seule personne.

    .. container:: wy-text-center

        .. uml::

            @startuml

            object Person {
                <<PK>> id
                first_name
                last_name
            }

            object DriverLicense {
                <<PK/FK>> person_id
                license_number
                issue_date
                expiry_date
            }

            Person - DriverLicense

            @enduml



* One-to-Many : une entité peut être en relation avec plusieurs autres entités

    Un utilisateur peut avoir plusieurs adresses. Une adresse est liée à un seul utilisateur.

    .. container:: wy-text-center

        .. uml::

            @startuml

            object User {
                <<PK>> id
                username
                email
                password
            }

            object Address {
                <<PK>> id
                <<FK>> user_id
                street_address_1
                street_address_2
                region
                zip_code
                country
            }

            User - Address

            @enduml

* Many-to-Many : plusieurs entités peuvent être en relation avec plusieurs autres entités

    Un livre peut être écrit par plusieurs auteurs. Un auteur peut écrire plusieurs livres.

    .. container:: wy-text-center

        .. uml::

            @startuml

            object Author {
                <<PK>> id
                first_name
                last_name
            }

            object Book {
                <<PK>> id
                title
                ISBN
                version
            }

            object AuthorBook {
                <<FK>> author_id
                <<FK>> book_id
            }

            Author - AuthorBook
            AuthorBook - Book

            @enduml

Notion du propriétaire et de l'inverse
======================================

Dans une relation, il y a toujours un entité **propriétaire**, et une dite **inverse**.

La logique propriétaire-inverse n'est pas lié à la logique métier, mais elle est purement technique. Le propriétaire de la relation est celui qui porte la clé étrangère.

Dans les exemples ci-dessus :

* ``DriverLicense`` est l'entité propriétaire de la relation One-To-One
* ``Address`` est l'entité propriétaire de la relation One-To-Many
* pour les relations Many-To-Many, c'est à vous de choisir l'entité propriétaire.

Notion d'unidirectionnalité et de bidirectionnalité
===================================================

Une relation peut être unidirectionnalité, à sens unique, ou bidirectionnalité, à double sens.

Une relation bidirectionnelle a toujours une entité propriétaire et une entité inverse. Une relation unidirectionnelle n'a qu'une entité propriété.

Dans le cas d'une relation unidirectionnelle, on peut récupérer les entités inverses à partir de l'entité propriétaire (``$entiteProprietaire->getEntiteInverse()``) mais on ne peut pas récupéré l'entité propriétaire à partir des entités inverses (``$entiteInverse->getEntiteProprietaire()``).

Dans les relations bidirectionnelles, les deux actions sont possibles.