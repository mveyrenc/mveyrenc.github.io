
.. revealjs::

    .. revealjs:: Rappels PHP
        :title-heading: h1

    .. revealjs:: Terminologie

        Classe
            * représentation abstraite d’un objet
            * somme des propriétés (attributs) de l’objet et des traitements (méthodes) dont il est capable
        Objet
            * instance de classe

    .. revealjs:: Mots réservés

        .. list-table::
            :widths: 30 70
            
            *   - **class** 
                - déclaration de classe
            *   - **const** 
                - déclaration de constante de classe
            *   - **function** 
                - déclaration d'une méthode
            *   - | **public**
                  | **protected**
                  | private 
                - visibilité de l'attribut ou de la méthode (par défaut "public" si aucun accès n'est explicitement défini)
            *   - **new** 
                - création d'objet

    .. revealjs:: Mots réservés

        .. list-table::
            :widths: 30 70

            *   - self 
                - résolution de portée (la classe elle-même)
            *   - **parent** 
                - résolution de portée (la classe "parent")
            *   - static 
                - résolution de portée (appel statique)
            *   - **extends** 
                - héritage de classe
            *   - implements 
                - implémentation d'une interface 

    .. revealjs:: Méthodes magiques

        .. list-table::
            :widths: 30 70

            *   - **__construct()**
                - constructeur de la classe, est appelé lors de le création d'un objet
            *   - __destruct() 
                - destructeur de la classe, est appelé lors de la destruction d'un objet
            *   - **__set()** 
                - déclenchée lors de l'accès en écriture à une propriété de l'objet
            *   - **__get()** 
                - déclenchée lors de l'accès en lecture à une propriété de l'objet

    .. revealjs:: Méthodes magiques

        .. list-table::
            :widths: 30 70

            *   - **__call()** 
                - déclenchée lors de l'appel d'une méthode inexistante de la classe
            *   - __callstatic() 
                - déclenchée lors de l'appel d'une méthode statique inexistante de la classe
            *   - **__isset()** 
                - déclenchée si on applique ``isset()`` à une propriété de l'objet
            *   - __unset() 
                - déclenchée si on applique ``unset()`` à une propriété de l'objet

    .. revealjs:: Méthodes magiques

        .. list-table::
            :widths: 30 70

            *   - __sleep() 
                - exécutée si la fonction ``serialize()`` est appliquée à l'objet
            *   - __wakeup() 
                - exécutée si la fonction ``unserialize()`` est appliquée à l'objet
            *   - **__toString()** 
                - appelée lorsque l'on essaie d'afficher directement l'objet : ``echo $object;``
            *   - __set_state()
                - méthode statique lancée lorsque l'on applique la fonction ``var_export()`` à l'objet

    .. revealjs:: Méthodes magiques

        .. list-table::
            :widths: 30 70

            *   - __clone() 
                - appelé lorsque l'on essaie de cloner l'objet
            *   - __autoload() 
                - cette fonction n'est pas une méthode, elle est déclarée dans le scope global et permet d'automatiser les ``include``/``require`` de classes PHP

    .. revealjs:: Variables réservés

        .. list-table::
            :widths: 30 70
            
            *   - **$this** 
                - objet lui-même à l’intérieur d’une classe

    .. revealjs:: Syntaxe de base

        .. code-block:: php

            class Voiture {

                const CONSOMMATION = 4; # L/100km
                const CAPACITE_RESERVOIR = 60; #L

                public $kilometrage = 0;
                protected $resteReservoir = 60;

                public function roule( $distance ) {
                    $this->kilometrage += $distance;
                    $this->resteReservoir -= self::CONSOMMATION * $distance;
                }

                public function peutEncoreRouler() {
                    echo $this->resteReservoir * self::CONSOMMATION;
                }

            }

            $voiture1 = new Voiture();
            $voiture1->roule( 60 );
            $voiture1->peutEncoreRouler( );
            var_dump( Voiture::CONSOMMATION );  // Affiche int(4)

    .. revealjs:: Héritage

        .. code-block:: php

            class Vehicule {

                public $kilometrage = 0;

                public function roule( $distance ) {
                    $this->kilometrage += $distance;
                }

            }

            class Voiture extends Vehicule {

                const CONSOMMATION = 4; # L/100km
                const CAPACITE_RESERVOIR = 60; #L

                protected $resteReservoir = 60;

                public function roule( $distance ) {
                    parent::roule( $distance );
                    $this->resteReservoir -= self::CONSOMMATION * $distance;
                }

                public function peutEncoreRouler() {
                    echo $this->resteReservoir * self::CONSOMMATION;
                }

            }

    .. revealjs:: Exceptions

        .. code-block:: php

            try {
                throw new Exception('Incident XY');
            } catch (Exception $e) {
                echo $e->getMessage(); //affiche "Incident XY"
            }

    .. revealjs:: Namespace

        .. code-block:: php
            
            namespace PHPUnit\Extensions\Database\DB\MetaData;

            class MySQL extends InformationSchema {
                // ...
            }