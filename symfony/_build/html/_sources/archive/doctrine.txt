.. _doctrine:

#############################
Doctrine et la base de donnée
#############################

*********************
Qu'est ce qu'un ORM ?
*********************

Un ORM (Object-Relation Mapper, ou mapping objet-relationnel en français) et un composant qui permet de créer l'illusion qu'une base de données relationnelle est une base de données orientée objet en définissant des correspondances entre la base de données et les objets manipulés dans le code.

.. _doctrine-creation-entite:

********************
Création des entités
********************

Les entités Doctrine sont de simples classes PHP avec des propriétés et des méthodes. Comme pour les bundles, Symfony propose un générateur créer ces classes.

L'entité ``User``
=================

Structure de l'entité
---------------------

+-----------+---------------+-------------------+
| Nom       | Type de champ | Taille du champ   |
+===========+===============+===================+
| username  | string        | 30                |
+-----------+---------------+-------------------+
| email     | string        | 100               |
+-----------+---------------+-------------------+
| password  | string        | 100               |
+-----------+---------------+-------------------+

Utilisation du générateur
-------------------------

.. literalinclude:: /code-block/doctrine/entity_user.txt

Le générateur crée deux fichiers dans le répertoire ``Entity`` de notre bundle : ``User.php`` et ``UserRepository.php``. La classe ``User`` est la classe représentant l'entité en elle même, est propriétés et ses méthodes. La classe ``UserRepository`` est une classe de dépôt où l'on va mettre les méthodes qui vont permettent de récupérer les entités depuis la base de données.

La classe ``User``
------------------

.. literalinclude:: /code-block/doctrine/User_1.php
    :language: php


Le générateur a automatiquement ajouté un champ ``id`` ainsi que tous les getter et setter pour toutes les propriétés.

* L'annotation ``@ORM\Entity`` doit être placé avant la définition de la classe. Elle définit que notre objet est une entité et donc qu'il doit être persisté par Doctrine. Cette annotation un seul paramètre facultatif, ``repositoryClass`` qui permet de préciser le namespace complet du repository qui gère cette entité.
* L'annotation ``@ORM\Table`` doit être également placé avant la définition de la classe, mais elle est facultative. Elle permet juste de personnaliser le nom de la table créée en base de données, par exemple ``@ORM\Table(name="epsi_user")``, et d'ajouter des paramètres pour le création de la table. Par défaut, si ne nom n'est pas personnalisé, Doctrine utilisera la nom de l'entité comme nom de table, ici ``User``. Par conséquent, les noms de vos tables peuvent comporter des majuscules, or la convention de nommage des tables d'une base de donnée et de ne pas mettre de majuscule car sur un serveur Linux, vous aurez des erreurs. Pour éviter de personnaliser le nom de la table pour chaque entité, on peut paramétré Doctrine pour qu'il utilise une autre convention de nommage pour ses tables :

    .. code-block:: yaml

        # app/config/config.yml

        doctrine:
            # ...

            orm:
                # ...
                naming_strategy: doctrine.orm.naming_strategy.underscore

* L'annotation ``@ORM\Column`` s'applique aux attributs de classe et se positionne juste avant leur définition. Elle permet de définir les caractéristiqued de la colonne :

    * ``type`` : le type **Doctrine** de la colonne, par défaut ``string``. Voici la liste des types utilisables :

        * ``array`` : tableau sérialisé en utilisant les méthodes ``serialize()`` et ``unserialize()`` stocké dans un CLOB
        * ``simple_array`` : tableau sérialisé en utilisant les méthodes ``implode()`` et ``explode()`` avec la virgule comme séparateur stocké dans un CLOB
        * ``json_array`` : tableau sérialisé en utilisant les méthodes ``json_encode()`` et ``json_decode()`` stocké dans un CLOB
        * ``object`` : objet sérialisé en utilisant les méthodes ``serialize()`` et ``unserialize()`` stocké dans un CLOB
        * ``boolean`` : booléen stocké dans un BOOLEAN ou un TINYINT
        * ``integer`` : entier jusqu'à 2 147 483 647 stocké dans un INT
        * ``smallint`` : entier jusqu'à 32 767 stocké dans un SMALLINT
        * ``bigint`` : entier jusqu'à 9 223 372 036 854 775 807 stocké dans un BIGINT. Si vous êtes en 32bits, PHP recevra une chaîne de caractères
        * ``string`` : chaîne de caractères stockée dans un VARCHAR
        * ``text`` : texte stocké dans un CLOB
        * ``datetime`` : date et heure stockées dans un DATETIME ou un TIMESTAMP
        * ``datetimetz`` : date et heure avec le fuseau horaire stockées dans un DATETIME ou un TIMESTAMP
        * ``date`` : date stockée dans un DATETIME
        * ``time`` : heure stockée dans un TIME
        * ``decimal`` : nombre flottant stocké dans un DECIMAL
        * ``float`` : nomre flottant stocké dans un FLOAT
        * ``blob`` : binaire stocké dans un BLOB
        * ``guid`` : identifiant stocké dans un GUID ou un UUID

    * ``name`` : le nom de la colonne dans la table. Par défaut : le nom de l'attribut
    * ``length`` : taille de la colonne pour les colonnes de type ``string``. Par défaut ``255``
    * ``unique`` : ajoute un index ``UNIQUE`` si le paramètre vaut ``true``. Par défaut ``false``
    * ``nullable`` : permet à la colonne de contenir des ``NULL`` si le parametre vaut ``true``. Par défaut ``false``
    * ``precision`` : précision des ``decimal`` (nombre de chiffres en tout)
    * ``scale`` : nombre de chiffres après la virgule d'un ``decimal``
    * ``options`` : des options supplémentaires :

        * ``default`` : valeur par défaut du champ
        * ``unsigned`` : supporte des entiers signés
        * ``fixed`` : la taille de la chaîne doit être fixe où doit-elle variée
        * ``comment`` : commentaire dans la déclaration de la colonne
        * ``customSchemaOptions`` : permet d'ajouter des options supplémentaires en fonction du type de champ et du SGBD utilisé

Pour plus d'information sur les annotations Doctrine, voici la doc : http://doctrine-orm.readthedocs.org/en/latest/reference/annotations-reference.html

La classe ``UserRepository``
----------------------------

.. literalinclude:: /code-block/doctrine/UserRepository_1.php
    :language: php

Quant à la classe ``UserRepository`` pour l'instant , elle attend nos méthodes.

Création des autres entités
===========================

Créez maintenant les autres entités du blog :

L'entité ``Post``
-----------------

+-----------+---------------+-------------------+
| Nom       | Type de champ | Taille du champ   |
+===========+===============+===================+
| title     | string        | 255               |
+-----------+---------------+-------------------+
| date      | datetime      |                   |
+-----------+---------------+-------------------+
| body      | text          |                   |
+-----------+---------------+-------------------+

L'entité ``Tag``
----------------

+-----------+---------------+-------------------+
| Nom       | Type de champ | Taille du champ   |
+===========+===============+===================+
| name      | string        | 30                |
+-----------+---------------+-------------------+

L'entité ``Comment``
--------------------

+-----------+---------------+-------------------+
| Nom       | Type de champ | Taille du champ   |
+===========+===============+===================+
| date      | datetime      |                   |
+-----------+---------------+-------------------+
| comment   | text          |                   |
+-----------+---------------+-------------------+

L'entité ``Image``
--------------------

+-----------+---------------+-------------------+
| Nom       | Type de champ | Taille du champ   |
+===========+===============+===================+
| url       | string        |                   |
+-----------+---------------+-------------------+
| alt       | string        |                   |
+-----------+---------------+-------------------+

.. _doctrine-valeur-defaut:

*******************************
Définition de valeur par défaut
*******************************

Les entités ``Post`` et ``Comment`` ont une date qui correspond à leur date de création. Pour éviter d'avoir à le saisir à chaque fois, on peut placer l'initialisation de ce champ dans le constructeur :

.. code-block:: php

    class Post {
        ...
        /**
        * Constructor
        */
       public function __construct() {
           $this->date = new \DateTime('now');
       }
       ...
    }

.. _doctrine-relations-entite:

************************
Définition des relations
************************

Le générateur d'entités ne crée pas propriétés et méthodes nécessaires à la manipulation des relations entre les entités. Il faut les ajouter manuellement après la génération de l'entité.

Doctrine gère plusieurs types de relations dans les entités : ``OneToOne``, ``OneToMany``, ``ManyToOne`` et ``ManyToMany``.

Les relations sont traitées comme les autres champs gérés par Doctrine. Il faut ajouter un attribut à la classe et le précéder d'annotations décrivant la relation. Ensuite, vous pouvez utiliser la commande suivante pour générer le getter et setter nécessaire pour le nouvel attribut :

.. code-block:: console
    
    php app/console doctrine:generate:entities EpsiBlogBundle:User


Notions techniques à savoir
===========================

Notion du propriétaire et de l'inverse
--------------------------------------

Dans une relation, il y a toujours un entité **propriétaire**, et une dite **inverse**. L'entité propriétaire est celle qui contient la référence à l'autre entité. Par contre, attention, la logique propriétaire-inverse n'est pas lié à la logique métier, mais elle est purement technique. Le propriétaire de la relation est celui qui porte la clé étrangère.

Notion d'unidirectionnalité et de bidirectionnalité
---------------------------------------------------

Une relation peut être unidirectionnalité, à sens unique, ou bidirectionnalité, à double sens.

Une relation bidirectionnelle a toujours une entité propriétaire et une entité inverse. Une relation unidirectionnelle n'a qu'une entité propriété. 

Dans le cas d'une relation unidirectionnelle, on peut récupérer les entités inverses à partir de l'entité propriétaire (``$entiteProprietaire->getEntiteInverse()``) mais on ne peut pas récupéré l'entité propriétaire à partir des entités inverses (``$entiteInverse->getEntiteProprietaire()``).
Dans les relations bidirectionnelles, les deux actions sont possibles.

Les cas présentés ci-dessous sont tous des relations bidirectionnelles.

.. _doctrine-relations-entite-o2o:

Relation One-To-One
===================

Comme l'indique son nom, c'est une relation unique entre deux objets.

L'annotation ``@ORM\OneToOne`` définit la relation vers l'autre entité. Elle possède au moins l'option ``targetEntity`` qui vaut le namespace complet vers l'entité liée. L'option ``cascade`` permet de "cascader" les actions effectuées sur l'entité sur ses entités liées par la relation (``persist``, ``remove``, ``merge``, ``detach``, ``refresh``).

Dans l'entité propriétaire
--------------------------
        
.. code-block:: php

    class User {
        // ...

        /**
         * @var Image
         * 
         * @ORM\OneToOne(
         *        targetEntity="Epsi\Bundle\BlogBundle\Entity\Image", 
         *        inversedBy="user",
         *        cascade={"persist"}
         * )
         */
        private $avatar;

        // ...
    }

Doctrine le traduit par l'ajout des méthodes suivantes dans la classe ``User`` :

.. code-block:: php

    class User {
        // ...
    
        /**
         * Set avatar
         *
         * @param \Epsi\Bundle\BlogBundle\Entity\Image $avatar
         * @return User
         */
        public function setAvatar(\Epsi\Bundle\BlogBundle\Entity\Image $avatar = null) {
            $this->avatar = $avatar;
            return $this;
        }

        /**
         * Get avatar
         *
         * @return \Epsi\Bundle\BlogBundle\Entity\Image 
         */
        public function getAvatar() {
            return $this->avatar;
        }

        // ...
    }

Dans la base de données, Doctrine ajoutera un champ ``avatar_id`` dans la table ``user`` et une contrainte d'intégrité sur ce champ :

.. code-block:: mysql

    ALTER TABLE user ADD avatar_id INT DEFAULT NULL;
    ALTER TABLE user ADD CONSTRAINT FK_8D93D64986383B10 FOREIGN KEY (avatar_id) REFERENCES image (id);


Dans l'entité inverse
---------------------

.. code-block:: php

    class Image {
        // ...

        /**
         * @var User
         * 
         * @ORM\OneToOne(
         *        targetEntity="Epsi\Bundle\BlogBundle\Entity\User", 
         *        mappedBy="avatar"
         * )
         */
        private $user;

        // ...
    }

Doctrine le traduit par l'ajout des méthodes suivantes dans la classe ``Image`` :

.. code-block:: php

    class Image {
        // ...

        /**
         * Set user
         *
         * @param \Epsi\Bundle\BlogBundle\Entity\User $user
         * @return Image
         */
        public function setUser(\Epsi\Bundle\BlogBundle\Entity\User $user = null) {
            $this->user = $user;
            return $this;
        }

        /**
         * Get user
         *
         * @return \Epsi\Bundle\BlogBundle\Entity\User 
         */
        public function getUser() {
            return $this->user;
        }

        // ...
    }

Aucune modification n'est nécessaire sur la table ``image``.

.. _doctrine-relations-entite-m2o-o2m:

Relation Many-To-One et One-To-Many
===================================

Cette relation permet à une entité d'avoir une relation vers plusieurs autres entités comme par exemple, un ``User`` qui est lié à plusieurs ``Post``.

Dans le cas des relations OneToMany et ManyToOne, le paramètre ``inversedBy`` est toujours du côté de la relation propriétaire et l'attribut ``mappedBy`` est toujours du côté de l'inverse.

Dans l'entité propriétaire
--------------------------

.. code-block:: php

    class Post {
        // ...

        /**
         * @var User
         * 
         * @ORM\ManyToOne(
         *      targetEntity="Epsi\Bundle\BlogBundle\Entity\User",
         *      inversedBy="posts"
         * )
         * @ORM\JoinColumn(nullable=false)
         */
        private $author;

        // ...
    }

Doctrine le traduit par l'ajout des méthodes suivantes dans la classe ``Post`` :

.. code-block:: php

    class Post {
        // ...

        /**
         * Set author
         *
         * @param User $author
         * @return Post
         */
        public function setAuthor(User $author = null) {
            $this->author = $author;
            return $this;
        }

        /**
         * Get author
         *
         * @return User 
         */
        public function getAuthor() {
            return $this->author;
        }

        // ...
    }

Dans la base de données, Doctrine ajoutera un champ ``author_id`` dans la table ``post`` et une contrainte d'intégrité sur ce champ :

.. code-block:: mysql

    ALTER TABLE user ADD author_id INT NOT NULL;
    ALTER TABLE user ADD CONSTRAINT FK_5A8A6C8DF675F31B FOREIGN KEY (author_id) REFERENCES user (id);

Dans l'entité inverse
---------------------

.. code-block:: php

    class User {
        // ...

        /**
         * @var ArrayCollection
         * 
         * @ORM\OneToMany(
         *      targetEntity="Epsi\Bundle\BlogBundle\Entity\Post",
         *      mappedBy="author",
         *      cascade={"persist"}
         * )
         */
        private $posts;

         // ...
    }

Doctrine le traduit par l'ajout des méthodes suivantes dans la classe ``User`` :

.. code-block:: php

    class User {
        // ...

        /**
         * Constructor
         */
        public function __construct() {
            // ...
            $this->posts = new ArrayCollection();
            // ...
        }

        // ...

        /**
         * Add posts
         *
         * @param Post $posts
         * @return User
         */
        public function addPost(Post $posts) {
            $this->posts[] = $posts;
            return $this;
        }

        /**
         * Remove posts
         *
         * @param Post $posts
         */
        public function removePost(Post $posts) {
            $this->posts->removeElement($posts);
        }

        /**
         * Get posts
         *
         * @return Collection 
         */
        public function getPosts() {
            return $this->posts;
        }

        // ...
    }

Aucune modification n'est nécessaire sur la table ``user``.

.. _doctrine-relations-entite-m2m:

Relation Many-To-Many
=====================

Cette relation permet à plusieurs entités d'avoir une relation vers plusieurs autres entités comme par exemple, des ``Post`` qui sont liés à plusieurs ``Tag``.

Dans l'entité propriétaire
--------------------------

.. code-block:: php

    class Post {
        // ...

        /**
         * @var Tag
         * 
         * @ORM\ManyToMany(
         *      targetEntity="Tag",
         *      inversedBy="posts"
         * )
         */
        private $tags;

        // ...
    }

Doctrine le traduit par l'ajout des méthodes suivantes dans la classe ``Post`` :

.. code-block:: php

    class Post {
        // ...

        /**
         * Constructor
         */
        public function __construct() {
            // ...
            $this->tags = new ArrayCollection();
            // ...
        }

        // ...

        /**
         * Add tags
         *
         * @param Tag $tags
         * @return Post
         */
        public function addTag(Tag $tags) {
            $this->tags[] = $tags;
            return $this;
        }

        /**
         * Remove tags
         *
         * @param Tag $tags
         */
        public function removeTag(Tag $tags) {
            $this->tags->removeElement($tags);
        }

        /**
         * Get tags
         *
         * @return Collection 
         */
        public function getTags() {
            return $this->tags;
        }

        // ...
    }

En base de données, Doctrine crée la table de jointure :

.. code-block:: mysql

    CREATE TABLE post_tag (
        post_id int(11) NOT NULL,
        tag_id int(11) NOT NULL,
        PRIMARY KEY (post_id,tag_id)
    );
    ALTER TABLE post_tag ADD CONSTRAINT FK_5ACE3AF04B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE;
    ALTER TABLE post_tag ADD CONSTRAINT FK_5ACE3AF0BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE;

Dans l'entité inverse
---------------------

.. code-block:: php

    class Tag {
        // ...

        /**
         * @var Post
         * 
         * @ORM\ManyToMany(
         *      targetEntity="Post",
         *      mappedBy="tags"
         * )
         */
        private $posts;

        // ...
    }

Doctrine le traduit par l'ajout des méthodes suivantes dans la classe ``Tag`` :

.. code-block:: php

    class Tag {
        // ...

        /**
         * Constructor
         */
        public function __construct() {
            // ...
            $this->posts = new ArrayCollection();
            // ...
        }

        // ...

        /**
         * Add posts
         *
         * @param Post $posts
         * @return Tag
         */
        public function addPost(Post $posts) {
            $this->posts[] = $posts;
            return $this;
        }

        /**
         * Remove posts
         *
         * @param Post $posts
         */
        public function removePost(Post $posts) {
            $this->posts->removeElement($posts);
        }

        /**
         * Get posts
         *
         * @return Collection 
         */
        public function getPosts() {
            return $this->posts;
        }

        // ...
    }

.. note::

    Lorsque vous ajoutez des propriétés dans une entité, pensez à générer les getter et setter en lançant la commande :

    .. code-block:: console

        php app/console doctrine:generate:entities [BundleName[:Entity]]

********************************************
Création de la base de données et des tables
********************************************

Les paramètres de connexion à la base de données se trouvent habituellement dans le fichier ``app/config/parameters.yml`` :

.. literalinclude:: /code-block/doctrine/parameters.yml
    :language: yaml
    :lines: 2-8

Ces paramètres sont repris dans le fichier ``app/config/config.yml`` :

.. code-block:: yaml

    doctrine:
        dbal:
            driver:   "%database_driver%"
            host:     "%database_host%"
            dbname:   "%database_name%"
            user:     "%database_user%"
            password: "%database_password%"

Maintenant que Doctrine connaît vos paramètres de connexion, vous pouvez lui demander de créer votre base de données :

.. code-block:: console

    $ php app/console doctrine:database:create

Si l'utilisateur ``symfony`` ne peut pas se connecter à la base de données, ajoutez lui les droits puis relancer la création de la base :

.. code-block:: mysql

    # mysql -uroot -p
    GRANT ALL ON symfony.* TO symfony IDENTIFIED BY 'symfony';
    FLUSH PRIVILEGES;



.. admonition:: Pour supprimer la base de données
    :class: hint

        .. code-block:: console

            $ php app/console doctrine:database:drop --force

Ensuite, pour créer le schéma dans la base de données, il suffit de taper la commande :

.. code-block:: console

    $ php app/console doctrine:schema:update --dump-sql --force

Cette commande compare à quoi votre base *devrait* ressembler en se basant sur le mapping de vos entités, à ce quoi quoi en ressemble *vraiment*, et génère les requêtes SQL nécessaires pour mettre à jour la base de données.

************************
Manipulation des données
************************

Les données sont manipulées par le service EntityManager qui est appelé depuis le contrôleur de la façon suivante :

.. code-block:: php

    $em = $this->getDoctrine()->getManager();

Comme tout service qui se respecte, il peut aussi être appelé de la façon suivante :

.. code-block:: php

    $em = $this->get('doctrine.orm.entity_manager');

Enregistrer les entités dans la base de donnée
==============================================

.. code-block:: php

    $tag = new Tag();
    $tag->setName( 'symfony' );
    
    $em = $this->getDoctrine()->getManager();
    $em->persist($tag);
    $em->flush();

La méthode ``persist`` traite indifféremment les nouvelles entités de celles déjà en base de données. Vous pouvez donc lui passer une entité fraîchement créée ou une entité que vous avez modifié. Cette méthode ne fait pas la requête SQL qui permet d'enregistrer les données dans la base, elle permet juste de dire à l'EntityManager de garder la modification en mémoire et de l'enregistrer au prochain appel de la méthode ``flush``.

La méthode ``flush`` quant à elle, elle ouvre une transation et enregistre toutes les entités qui lui ont été données depuis le dernier ``flush``.

En plus des méthodes ``persist`` et ``flush``, l'EntityManager dispose d'autres méthodes intéressantes :

* ``clear( $nomEntity )`` : annule tous les ``persist`` effectués. Si un nom d'entité est passé en paramètre, alors seuls les ``persist`` sur les entités de ce type seront annulés
* ``detach( $entite )`` : annule le ``persist`` sur l'entité passé en argument
* ``contains( $entite )`` : retourne ``true`` si l'entité est gérée pas l'EntityManager, c'est à dire s'il y a eu un ``persist`` sur l'entité
* ``refresh( $entite )`` : met à jour l'entité donnée en argument dans l'état où elle est en base de données
* ``remove( $entite )`` : supprime l'entité donnée en argument de la base de données lors du prochain ``flush``
        
Récupérer ses entités avec un EntityRepository
==============================================

À partir d'un repository, nous pouvons utiliser du DQL pour composer une requête. Le DQL (Doctrine Qauery Language) est le pseudo-SQL de Doctrine, il est compatible avec les bases de données supportées par Doctrine. Sa syntaxe est très proche du SQL, amis il propose moins d'opérateurs et de fonctions pas soucis de portabilité entre ces systèmes.

Les repositories nous proposent également d'utiliser un QueryBuilder. C'est un outil qui permet de construire des requêtes en utilisant des instructions chaînées et reflétant d'assez près la construction d'une requête SQL.

Tout d'abord, il faut récupérer le repository de l'entité :

.. code-block:: php 

    $repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('EpsiBlogBundle:Post');

Depuis ce repository, sans rien implémenter on peut déjà :

* récupérer une entité à partir de son ID

    .. code-block:: php 

        $repository->find($id);

* récupérer tous les entités

    .. code-block:: php 

        $repository->findAll();

* récupérer les entités en fonction de critères

    .. code-block:: php 

        $repository->findBy(array $criteres, array $orderBy = null, $limite = null, $offset = null);

* récupérer une entité en fonction de critères

    .. code-block:: php 

        $repository->findOneBy(array $criteres);

On a aussi à disposition des méthodes magiques qui permettent rapidement de récupérer une ou plusieurs entités en fonction d'un critère :

* ``findByX($valeur)`` 
* ``findOneByX($valeur)`` 

X doit être remplacé par le nom d'une propriété, Par exemple ``findByTitre()``, ``findOneByTitre()``, ``findByDate()``, ``findOneByDate()``

Pour toutes les autres requêtes, il va falloir les construire dans le repository grâce au QueryBuilder.

Par exemple, recréons la méthode ``findAll`` dans le repository ``Post`` pour que les ``Post`` soient triés par date :

.. code-block:: php

    class PostRepository extends EntityRepository {

        public function findAllOrderByDate() {
            $queryBuilder = $this->createQueryBuilder('p');

            $queryBuilder->orderBy('p.date', 'ASC');

            // On a fini de construire notre requête
            // On récupère la Query à partir du QueryBuilder
            $query = $queryBuilder->getQuery();

            // On récupère les résultats à partir de la Query
            $resultats = $query->getResult();

            // On retourne ces résultats
            return $resultats;
        }

    }

Voici la liste des méthodes disponibles dans le QueryBuilder :

    .. code-block:: php

        class QueryBuilder {

            // Example - $qb->select('u')
            // Example - $qb->select(array('u', 'p'))
            // Example - $qb->select($qb->expr()->select('u', 'p'))
            public function select($select = null);

            // addSelect does not override previous calls to select
            //
            // Example - $qb->select('u');
            //              ->addSelect('p.area_code');
            public function addSelect($select = null);

            // Example - $qb->delete('User', 'u')
            public function delete($delete = null, $alias = null);

            // Example - $qb->update('Group', 'g')
            public function update($update = null, $alias = null);

            // Example - $qb->set('u.firstName', $qb->expr()->literal('Arnold'))
            // Example - $qb->set('u.numChilds', 'u.numChilds + ?1')
            // Example - $qb->set('u.numChilds', $qb->expr()->sum('u.numChilds', '?1'))
            public function set($key, $value);

            // Example - $qb->from('Phonenumber', 'p')
            // Example - $qb->from('Phonenumber', 'p', 'p.id')
            public function from($from, $alias, $indexBy = null);

            // Example - $qb->join('u.Group', 'g', Expr\Join::WITH, $qb->expr()->eq('u.status_id', '?1'))
            // Example - $qb->join('u.Group', 'g', 'WITH', 'u.status = ?1')
            // Example - $qb->join('u.Group', 'g', 'WITH', 'u.status = ?1', 'g.id')
            public function join($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

            // Example - $qb->innerJoin('u.Group', 'g', Expr\Join::WITH, $qb->expr()->eq('u.status_id', '?1'))
            // Example - $qb->innerJoin('u.Group', 'g', 'WITH', 'u.status = ?1')
            // Example - $qb->innerJoin('u.Group', 'g', 'WITH', 'u.status = ?1', 'g.id')
            public function innerJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

            // Example - $qb->leftJoin('u.Phonenumbers', 'p', Expr\Join::WITH, $qb->expr()->eq('p.area_code', 55))
            // Example - $qb->leftJoin('u.Phonenumbers', 'p', 'WITH', 'p.area_code = 55')
            // Example - $qb->leftJoin('u.Phonenumbers', 'p', 'WITH', 'p.area_code = 55', 'p.id')
            public function leftJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

            // NOTE: ->where() overrides all previously set conditions
            //
            // Example - $qb->where('u.firstName = ?1', $qb->expr()->eq('u.surname', '?2'))
            // Example - $qb->where($qb->expr()->andX($qb->expr()->eq('u.firstName', '?1'), $qb->expr()->eq('u.surname', '?2')))
            // Example - $qb->where('u.firstName = ?1 AND u.surname = ?2')
            public function where($where);

            // NOTE: ->andWhere() can be used directly, without any ->where() before
            //
            // Example - $qb->andWhere($qb->expr()->orX($qb->expr()->lte('u.age', 40), 'u.numChild = 0'))
            public function andWhere($where);

            // Example - $qb->orWhere($qb->expr()->between('u.id', 1, 10));
            public function orWhere($where);

            // NOTE: -> groupBy() overrides all previously set grouping conditions
            //
            // Example - $qb->groupBy('u.id')
            public function groupBy($groupBy);

            // Example - $qb->addGroupBy('g.name')
            public function addGroupBy($groupBy);

            // NOTE: -> having() overrides all previously set having conditions
            //
            // Example - $qb->having('u.salary >= ?1')
            // Example - $qb->having($qb->expr()->gte('u.salary', '?1'))
            public function having($having);

            // Example - $qb->andHaving($qb->expr()->gt($qb->expr()->count('u.numChild'), 0))
            public function andHaving($having);

            // Example - $qb->orHaving($qb->expr()->lte('g.managerLevel', '100'))
            public function orHaving($having);

            // NOTE: -> orderBy() overrides all previously set ordering conditions
            //
            // Example - $qb->orderBy('u.surname', 'DESC')
            public function orderBy($sort, $order = null);

            // Example - $qb->addOrderBy('u.firstName')
            public function addOrderBy($sort, $order = null); // Default $order = 'ASC'
        }

Pour plus d'info : http://doctrine-orm.readthedocs.org/en/latest/reference/query-builder.html