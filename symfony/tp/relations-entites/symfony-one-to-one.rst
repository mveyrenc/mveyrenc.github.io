################################
Relation One-To-One dans Symfony
################################

***********************
Déclation des attributs
***********************

Dans l'entité propriétaire
==========================

.. code-block:: php

    class DriverLicense {
        // ...

        /**
         * @var Person
         *
         * @ORM\OneToOne(
         *      targetEntity="Namespace\Of\MyBundle\Entity\Person",
         *      inversedBy="driverLicense"
         * )
         */
        private $person;

        // ...
    }

Dans l'entité inverse
=====================

.. code-block:: php

    class Person
    {
        // ...

        /**
         * @var DriverLicense
         *
         * @ORM\OneToOne(
         *      targetEntity="Namespace\Of\MyBundle\Entity\DriverLicense",
         *      mappedBy="person"
         * )
         */
        private $driverLicense;

        // ...
    }

****************************************
Méthodes get et set générée par Doctrine
****************************************

Dans l'entité propriétaire
==========================

.. code-block:: php

    class DriverLicense {
        // ...

        /**
         * Set person
         *
         * @param \Namespace\Of\MyBundle\Entity\Person $person
         * @return DriverLicense
         */
        public function setPerson(\Namespace\Of\MyBundle\Entity\Person $person = null) {
            $this->person = $person;
            return $this;
        }

        /**
         * Get person
         *
         * @return \Namespace\Of\MyBundle\Entity\Person
         */
        public function getPerson() {
            return $this->person;
        }

        // ...
    }

Dans l'entité inverse
=====================

.. code-block:: php

    class Person {
        // ...

        /**
         * Set user
         *
         * @param \Namespace\Of\MyBundle\Entity\DriverLicense $driverLicense
         * @return Person
         */
        public function setDriverLicense(\Namespace\Of\MyBundle\Entity\DriverLicense $driverLicense = null) {
            $this->driverLicense = $driverLicense;
            return $this;
        }

        /**
         * Get user
         *
         * @return \Namespace\Of\MyBundle\Entity\DriverLicense
         */
        public function getDriverLicense() {
            return $this->driverLicense;
        }

        // ...
    }

*******************************************************
Modifications effectuées en base de donnée par Doctrine
*******************************************************

.. code-block:: mysql

    ALTER TABLE driver_licence ADD person_id INT DEFAULT NULL;
    ALTER TABLE driver_licence ADD CONSTRAINT FK_XXX FOREIGN KEY (person_id) REFERENCES person (id);