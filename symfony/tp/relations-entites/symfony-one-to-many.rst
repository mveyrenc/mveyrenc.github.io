#################################
Relation One-To-Many dans Symfony
#################################



Dans le cas des relations OneToMany et ManyToOne, le paramètre ``inversedBy`` est toujours du côté de la relation propriétaire et l'attribut ``mappedBy`` est toujours du côté de l'inverse.

***********************
Déclation des attributs
***********************

Dans l'entité propriétaire
==========================

.. code-block:: php

    class Address {
        // ...

        /**
         * @var User
         *
         * @ORM\ManyToOne(
         *      targetEntity="Namespace\Of\MyBundle\Entity\User",
         *      inversedBy="addresses"
         * )
         */
        private $user;

        // ...
    }

Dans l'entité inverse
=====================

.. code-block:: php

    class User {
        // ...

        /**
         * @var Address[]
         *
         * @ORM\OneToMany(
         *      targetEntity="Namespace\Of\MyBundle\Entity\Address",
         *      mappedBy="user"
         * )
         */
        private $addresses;

         // ...
    }

****************************************
Méthodes get et set générée par Doctrine
****************************************

Dans l'entité propriétaire
==========================

.. code-block:: php

    class Address {
        // ...

        /**
         * Set user
         *
         * @param User $user
         * @return Post
         */
        public function setUser(User $user = null) {
            $this->user = $user;
            return $this;
        }

        /**
         * Get user
         *
         * @return User
         */
        public function getUser() {
            return $this->user;
        }

        // ...
    }

Dans l'entité inverse
=====================

.. code-block:: php

    class User {
        // ...

        /**
         * Constructor
         */
        public function __construct() {
            // ...
            $this->addresses = new ArrayCollection();
            // ...
        }

        // ...

        /**
         * Add addresses
         *
         * @param Address $addresses
         * @return User
         */
        public function addPost(Address $addresses) {
            $this->addresses[] = $addresses;
            return $this;
        }

        /**
         * Remove addresses
         *
         * @param Address $addresses
         */
        public function removePost(Address $addresses) {
            $this->addresses->removeElement($addresses);
        }

        /**
         * Get addresses
         *
         * @return ArrayCollection
         */
        public function getAddresses() {
            return $this->addresses;
        }

        // ...
    }

*******************************************************
Modifications effectuées en base de donnée par Doctrine
*******************************************************

.. code-block:: mysql

    ALTER TABLE address ADD user_id INT DEFAULT NULL;
    ALTER TABLE address ADD CONSTRAINT FK_XXX FOREIGN KEY (user_id) REFERENCES user (id);
