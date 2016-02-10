.. _rappels-poo-mots-reserves:

*************
Mots réservés
*************

* ``class`` : déclaration de classe
* ``const`` : déclaration de constante de classe
* ``function`` : déclaration d'une méthode
* ``public``/``protected``/``private`` : visibilité de l'attribut ou de la méthode (par défaut "public" si aucun accès n'est explicitement défini)
* ``new`` : création d'objet
* ``self`` : résolution de portée (la classe elle-même)
* ``parent`` : résolution de portée (la classe "parent")
* ``static`` : résolution de portée (appel statique)
* ``extends`` : héritage de classe
* ``implements`` : implémentation d'une interface 

Les **méthodes magiques** sont des méthodes qui, si elles sont déclarées dans une classe, ont une fonction déjà prévue par le langage.

* ``__construct()`` : constructeur de la classe, est appelé lors de le création d'un objet
* ``__destruct()`` : destructeur de la classe, est appelé lors de la destruction d'un objet
* ``__set()`` : déclenchée lors de l'accès en écriture à une propriété de l'objet
* ``__get()`` : déclenchée lors de l'accès en lecture à une propriété de l'objet
* ``__call()`` : déclenchée lors de l'appel d'une méthode inexistante de la classe
* ``__callstatic()`` : déclenchée lors de l'appel d'une méthode statique inexistante de la classe
* ``__isset()`` : déclenchée si on applique ``isset()`` à une propriété de l'objet
* ``__unset()`` : déclenchée si on applique ``unset()`` à une propriété de l'objet
* ``__sleep()`` : exécutée si la fonction ``serialize()`` est appliquée à l'objet
* ``__wakeup()`` : exécutée si la fonction ``unserialize()`` est appliquée à l'objet
* ``__toString()`` : appelée lorsque l'on essaie d'afficher directement l'objet : ``echo $object;``
* ``__set_state()`` : méthode statique lancée lorsque l'on applique la fonction ``var_export()`` à l'objet
* ``__clone()`` : appelé lorsque l'on essaie de cloner l'objet
* ``__autoload()`` : cette fonction n'est pas une méthode, elle est déclarée dans le scope global et permet d'automatiser les ``include``/``require`` de classes PHP

Enfin, la variable ``$this`` utilisée à l'intérieur d'une classe, faut toujours référence à l'objet lui-même.