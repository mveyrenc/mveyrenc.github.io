**************************
Espace de nom ou namespace
**************************

Dans leur définition la plus large, ils représentent un moyen d'encapsuler des éléménts. Ils peuvent s'apparenter à un système de fichier. D'ailleur dans la convention Symfony, le namespace d'une classes reflète son chemin.

Dans le monde PHP, les espaces de noms sont conçus pour résoudre deux problèmes que les auteurs de bibliothèques et applications rencontrent lors de la réutilisation d'éléments tels que des classes ou des bibliothèques de fonctions :

* collisions de noms entre le code que vous créez (les classes, fonctions, constantes) et celle de bibliothèques tièces
* les noms extèmement longs de classes

.. code-block:: php

    class PHPUnit_Extensions_Database_DB_MetaData_MySQL extends PHPUnit_Extensions_Database_DB_MetaData_InformationSchema {
        // ...
    }
    
.. code-block:: php

    namespace PHPUnit\Extensions\Database\DB\MetaData;
    
    class MySQL extends InformationSchema {
	// ...
    }