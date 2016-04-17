####################################
Ajout d'une relation étape par étape
####################################

Prenons comme exemple la relation entre ``Post`` et ``User``.

******************************************************
1. Ajout des attributs dans les classes de la relation
******************************************************

Ouvrez les deux classes des entités concernées par la relation :

.. raw:: html

    <style>
        .rst-content .code-in-two-column div[class^='highlight'] {border: none;}
        .rst-content .code-in-two-column table.docutils td {padding: 0px;vertical-align: top;}
    </style>

Un post est écrit par un auteur, on ajoute donc l'attribut ``$author`` dans la classe ``Post``.

.. code-block:: php
    :emphasize-lines: 17

    namespace Epsi\Bundle\BlogBundle\Entity;

    class Post
    {
        /*...*/
        private $id;

        /*...*/
        private $title;

        /*...*/
        private $date;

        /*...*/
        private $body;

        private $author;

        //...
    }

Un auteur peut écrire plusieurs posts, on ajoute donc l'attribut ``$posts`` dans la classe ``User``.

.. code-block:: php
    :emphasize-lines: 17

    namespace Epsi\Bundle\BlogBundle\Entity;

    class User
    {
        /*...*/
        private $id;

        /*...*/
        private $username;

        /*...*/
        private $email;

        /*...*/
        private $password;

        private $posts;

        //...
    }

.. attention::

    Lorsque vous ajoutez les attributs dans vos classes, faites bien attention à mettre votre attribut

    * au singulier si vous faites une relation vers un élément
    * au pluriel si vous faites une relation vers plus d'un éléments


****************************
2. Choix du type de relation
****************************

Dans la classe ``Post``, comme on n'a qu'on auteur, le type de relation se terminera obligatoirement par ``ToOne``.

Dans la classe ``User``, comme on a plusieurs posts, le type de relation se terminera obligatoirement par ``ToMany``.

En mixant les deux, on obtient une ``ManyToOne`` dans ``Post`` :

.. code-block:: php
    :emphasize-lines: 7-14

    namespace Epsi\Bundle\BlogBundle\Entity;

    class Post
    {
        //...

        /**
         * @var User
         *
         * @ORM\ManyToOne(
         *      targetEntity="",
         *      inversedBy=""
         * )
         */
        private $author;

        //...
    }

Et une ``OneToMany`` dans ``User`` :

.. code-block:: php
    :emphasize-lines: 7-14

    namespace Epsi\Bundle\BlogBundle\Entity;

    class User
    {
        /*...*/

        /**
         * @var Post[]
         *
         * @ORM\OneToMany(
         *      targetEntity="",
         *      mappedBy=""
         * )
         */
        private $posts;

        //...
    }

**********************************
3. Paramétrage du ``targetEntity``
**********************************

Le targetEntity correspond à l'entité vers laquelle on fait la relation. Dans la classe ``Post``, il s'agit de ``User`` :

.. code-block:: php
    :emphasize-lines: 11

    namespace Epsi\Bundle\BlogBundle\Entity;

    class Post
    {
        //...

        /**
         * @var User
         *
         * @ORM\ManyToOne(
         *      targetEntity="Epsi\Bundle\BlogBundle\Entity\User",
         *      inversedBy=""
         * )
         */
        private $author;

        //...
    }

Et dans ``User``, c'est ``Post`` :

.. code-block:: php
    :emphasize-lines: 11

    namespace Epsi\Bundle\BlogBundle\Entity;

    class User
    {
        /*...*/

        /**
         * @var Post[]
         *
         * @ORM\OneToMany(
         *      targetEntity="Epsi\Bundle\BlogBundle\Entity\Post",
         *      mappedBy=""
         * )
         */
        private $posts;

        //...
    }

************************************************
4. Paramétrage de ``inversedBy`` et ``mappedBy``
************************************************

Les paramètres ``inversedBy`` et ``mappedBy`` doivent être égals au nom de l'attribut faisant la relation dans le targetEntity.

On utilise le paramètre ``inversedBy`` dans l'entité propriétaire :

.. code-block:: php
    :emphasize-lines: 12

        namespace Epsi\Bundle\BlogBundle\Entity;

        class Post
        {
            //...

            /**
             * @var User
             *
             * @ORM\ManyToOne(
             *      targetEntity="Epsi\Bundle\BlogBundle\Entity\User",
             *      inversedBy="posts"
             * )
             */
            private $author;

            //...
        }

On utilise le paramètre ``mappedBy`` dans l'entité inverse :

.. code-block:: php
    :emphasize-lines: 12

        namespace Epsi\Bundle\BlogBundle\Entity;

        class User
        {
            /*...*/

        /**
         * @var Post[]
         *
         * @ORM\OneToMany(
         *      targetEntity="Epsi\Bundle\BlogBundle\Entity\Post",
         *      mappedBy="author"
         * )
         */
        private $posts;

        //...
    }

*************************************
5. Génération des méthodes get et set
*************************************

Lancer la commande suivante :

.. code-block:: console

    $ php app/console doctrine:generate:entities Epsi

Cette méthode ajoute les méthodes get et set manquantes dans vos entités :

* Dans ``Post`` : ``setAuthor`` et ``getAuthor``
* Dans ``User`` : ``addPost``, ``removePost`` et ``getPosts``

**********************************************
6. Mise à jour du schema de la base de données
**********************************************

Lancer la commande suivante :

.. code-block:: console

    $ php app/console doctrine:schema:update --force --dump-sql
