**************************
Espace de nom ou namespace
**************************

Dans leur définition la plus large, ils représentent un moyen d'encapsuler des éléments. Ils peuvent s'apparenter à un système de fichier. D'ailleurs dans la convention Symfony, le namespace d'une classes reflète son chemin.

Dans le monde PHP, les espaces de noms sont conçus pour résoudre deux problèmes que les auteurs de bibliothèques et applications rencontrent lors de la réutilisation d'éléments tels que des classes ou des bibliothèques de fonctions :

* collisions de noms entre le code que vous créez (les classes, fonctions, constantes) et celle de bibliothèques tièces
* les noms extrêmement longs de classes

Avant les namespaces on avant de genre de nom de classes :

.. code-block:: php

    class PHPUnit_Extensions_Database_DB_MetaData_MySQL extends PHPUnit_Extensions_Database_DB_MetaData_InformationSchema {
        // ...
    }

Aujourd'hui avec les namespaces :
    
.. code-block:: php

    namespace PHPUnit\Extensions\Database\DB\MetaData;
    
    class MySQL extends InformationSchema {
	// ...
    }

Pour utiliser la classe de ce namespace, il faut ajouter ``use PHPUnit\Extensions\Database\DB\MetaData\MySQL`` avant la définition de votre classe.