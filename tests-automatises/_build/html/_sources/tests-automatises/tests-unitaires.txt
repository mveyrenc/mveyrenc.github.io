###################
Les tests unitaires
###################

Un test unitaire est un procédé permettant de s'assurer du bon fonctionnement d'une unité de programme.

Il s'agit simplement de vérifier, qu'en fonction de certaines données fournies en entrée d'un module de code, les données
qui en sortent ou les actions qui en découlent sont conformes aux spécifications du module.

.. admonition:: +

    * Rapides
    * Peuvent couvrir des fonctionnalités rarement utilsés
    * Peuvent couvrir des cas qui se produisent rarement
    * Permettent de tester la stabilité du code de votre application

.. admonition:: -
    :class: warning

    * Ne testent pas les relations entre les composants
    * Très sensibles aux changements de code

*******
Exemple
*******

.. code-block:: php

    class Addition
    {
        /**
         * @param int $a
         * @param int $b
         * @return int
         */
        public function go($a, $b)
        {
            return $a + $b;
        }
    }

.. code-block:: php

    class AdditionTest extends PHPUnit_Framework_TestCase
    {
        public function setUp()
        {
            $this->operation = new Addition;
        }

        public function testGo()
        {
            $this->assertEquals(5, $this->operation->go(2, 3));
        }
    }

Frameworks :

* `PHPUnit <https://phpunit.de/>`_
* `Codeception <http://codeception.com/>`_
* `phpspec <http://www.phpspec.net/>`_
* `atoum <http://atoum.org>`_

**
TP
**

:download:`Sujet du TP </_downloads/poe-tdd-training-master.tar.gz>`

Installation
============

.. code-block:: console

    composer install --prefer-dist


Lancement les tests
===================


.. code-block:: console

    bin/phpunit tests/tp1

Pour lancer les tests et voir la couverture de code :

.. code-block:: console

    bin/phpunit tests/tp1 --coverage-html coverage-html

TP1
===

Implémenter les tests de la classe  ``ParameterBag``.


TP2
===

Implémenter les différentes classes en utilisant une méthodologie TDD.
Faites d'abord la classe ``Person`` puis ``Enterprise`` et enfin ``HRDepartment``.


TP2 - Suite
===========

Nouvelle classe :

    * ``SalaryTable``
    * ``SalaryTable::grantSalary($salary, Person $person)``
    * ``SalaryTable::getSalary(Person $person)``


Changement dans les classes :

    * ``HRDepartment::__construct(Enterprise $enterprise, SalaryTable $salaryTable)``
    * ``HRDepartment::hire(Person $person, $salary)``


Ajout de méthodes :

    * ``HRDepartment::increaseSalary(Person $person, $percentage)``
    * ``HRDepartment::getAverageSalary()``

*********
Les mocks
*********

Dans les tests unitaires, les mocks simulent le comportement d'un vrai objet.

Exemple
=======

.. code-block:: php

    /**
     * Class Addition
     */
    class Addition
    {
        /**
         * @return number
         */
        public function go()
        {
            return array_sum(func_get_args());
        }
    }

.. code-block:: php

    /**
     * Class Soustraction
     */
    class Soustraction
    {

        /**
         * @return number
         */
        public function go()
        {
            $argList = func_get_args();
            $init = array_pop($argList);
            array_walk($argList, 'Soustraction::reverseSign');

            return $init + array_sum($argList);
        }

        /**
         * @param $item
         * @static
         */
        protected static function reverseSign(&$item)
        {
            $item *= -1;
        }

    }

.. code-block:: php

    /**
     * Class Multiplication
     */
    class Multiplication
    {

        /**
         * @return number
         */
        public function go()
        {
            return array_product(func_get_args());
        }

    }

.. code-block:: php

    /**
     * Class Calculatrice
     */
    class Calculatrice
    {

        /**
         * @var array
         */
        protected $valeurs = array();

        /**
         * @var null
         */
        protected $operation = NULL;

        /**
         * @var null
         */
        protected $result = NULL;

        /**
         * @param string $operation
         */
        public function setOperation($operation)
        {
            $this->operation = $operation;
        }

        /**
         * @param int $value,...
         */
        public function setValeurs()
        {
            $this->valeurs = func_get_args();
            if (count($this->valeurs) < 2) {
                $this->valeurs[] = 0;
            }
            array_walk($this->valeurs, 'Calculatrice::validateArrayValues');
        }

        /**
         * @return null
         */
        public function getResultat()
        {
            return $this->result;
        }

        /**
         * @return number
         */
        public function calcul()
        {
            $this->result = call_user_func_array(array(
                $this->operation,
                "go",
            ), $this->valeurs);

            return $this->result;
        }

        /**
         * @param $item
         * @static
         */
        protected static function validateArrayValues(&$item)
        {
            if (!is_numeric($item)) {
                throw new InvalidArgumentException();
            }
        }
    }

Pour tester la méthode ``Calculatrice::calcul()`` :

.. code-block:: php

    /**
     * Class CalculatriceTest
     */
    class CalculatriceTest extends PHPUnit_Framework_TestCase
    {

        public function setUp()
        {
            $this->calc = new Calculatrice;
        }

        public function testCalcul()
        {
            $mock = Mockery::mock('Operation');
            $mock->shouldReceive('go')
                ->once()
                ->with(5, 0)
                ->andReturn(5);
            $this->calc->setValeurs(5);
            $this->calc->setOperation($mock);
            $resultat = $this->calc->calcul();
            $this->assertEquals(5, $resultat);
        }

    }
