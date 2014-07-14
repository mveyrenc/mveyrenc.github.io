------------
Introduction
------------

Installation
============

Il faut installer un serveur web (``apache2``), l'interpréteur PHP (``php5`` et ``php5-cli``), un SGBD (``mysql-server``) 
et le connecteur entre PHP e le SGBD (``php5-mysql``).

.. code-block:: bash

	$ sudo apt-get install apache2 php5 php5-cli
	$ sudo apt-get install mysql-server php5-mysql

Si c'est pour un poste de développement :

.. code-block:: bash

	$ sudo apt-get install php5-xdebug
	
En option, on peut installer PHPMyAdmin :

.. code-block:: bash

	$ sudo apt-get install phpmyadmin
	
Configuration
=============

Fichier de configuration
------------------------

La configuration de PHP se fait dans le fichier ``php.ini``.

Sous Débian et ses dérivées, il y a un ``php.ini`` pour le serveur web, un autre pour la ligne de commande : 

* ``/etc/php5/apache2/php.ini``
* ``/etc/php5/cli/php.ini``

Quelques éléménts à configurer
------------------------------

* ``date.timezone = 'Europe/Paris'`` : le fuseau horaire à utiliser pour les fontions date
* ``short_open_tag = Off`` : ne pas interpréter les basises <? ?> et <?= ?> comme du PHP
* ``magic_quotes_gpc = Off`` : tous les caractères ' (guillemets simples), " (guillemets doubles), \ (antislash) et NUL ne sont pas échappés avec un antislash 
  pour les opérations GPC (Get/Post/Cookie). Fonction obselète en 5.3.0, supprimée depuis 5.4.0
* ``register_globals = Off`` : désativer les variables super-globales. Fonction obselète en 5.3.0, supprimée depuis 5.4.0
* ``session.auto_start = Off`` : Spécifie si le module de session doit démarrer automatiquement au début de chaque script PHP
* ``upload_max_filesize`` : taille maxi autorisée pour uploder des fichiers
* ``post_max_size`` : taille maxi autorisée pour une requète POST 
* ``memory_limit`` : mémoire maxi qu'un script PHP peut allouer. Si ce paramètre vaut -1, alors la mémoire n'est pas limitée
* ``max_execution_time`` : temps d'éxcution maxi pour un script. Si ce paramètre vaut -1, alors le temps n'est pas limitée
* ``display_errors`` : affiche les erreurs. Doit être à On sur un poste de développement
* ``html_errors`` : affiche les erreurs en HTML. Doit être à On sur un poste de développement
 
