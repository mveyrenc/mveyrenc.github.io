.. _tp-installation-configuration-php:

####################################
Installation et configuration de PHP
####################################

.. _tp-installation-php:

************
Installation
************

Il faut installer un serveur web (``apache2``), l'interpréteur PHP (``php5`` et ``php5-cli``), un SGBD (``mysql-server``) 
et le connecteur entre PHP et le SGBD (``php5-mysql``).

.. _tp-installation-php-linux:

Sous Linux (Debian/Ubuntu)
==========================

Lancez les commandes suivantes pour installer les paquets nécessaires :

.. code-block:: console

	$ sudo apt-get install apache2 mysql-server mysql-client php5 php5-cli php5-mysql
	$ sudo apt-get install php5-intl php5-xsl php5-curl
	$ sudo apt-get install curl git

Si c'est pour un poste de développement :

.. code-block:: console

	$ sudo apt-get install php5-xdebug phpmyadmin

Afin de corriger les droits sur les fichiers une bonne fois pour toute :

* Ajoutons l'utilisateur d':program:`Apache` (``www-data``) dans notre groupe

    .. code-block:: console

        sudo usermod -a -G www-data $(whoami)

* Ajoutons dans le groupe ``www-data``

    .. code-block:: console

        sudo usermod -a -G $(whoami) www-data

* Forçons les droits à 775 pour tous les nouveaux fichiers créés par notre utilisateur

    .. code-block:: bash

        # ~/.profile
        ...

        # umask  002 pour passer les permission de fichiers à 0664 et de dossiers à 0775
        umask 002

* Rechargeons notre profil

    .. code-block:: console

        source ~/.profile

* Faisons de même pour www-data

    .. code-block:: bash

        # /etc/apache2/envvars
        ...

        # umask  002 pour passer les permission de fichiers à 0664 et de dossiers à 0775
        umask 002

* Redémarrons :program:`Apache`

    .. code-block:: console

        sudo service apache2 restart

.. _tp-installation-php-macos:

Sous MacOS
==========

Il faut télécharger et installer `MAMP <https://www.mamp.info/>`_.

.. _tp-installation-php-windows:

Sous Windows
============

Il faut télécharger et installer `WAMP <http://www.wampserver.com/>`_.

Puis, sous Windows 7, XP, Vista, 2008, 2012 et plus récent :

#. Allez dans le centre de contrôle et ouvrez l'icône système (:menuselection:`Démarrer --> Panneau de configuration --> Système et sécurité --> Système --> Paramètres système avancés`)

#. Cliquez sur le bouton "Variables d'environnements"

#. Regardez dans le panneau "Variables systèmes"

#. Trouvez l'entrée "Path" (vous devriez avoir à faire descendre l'ascenseur pour le trouver)

#. Double cliquez sur l'entrée "Path"

#. Entrez votre répertoire PHP à la fin, sans oublier cd commender par un point virgule (;), par exemple ``;c:\wamp\bin\php\php5.5.12``

#. Confirmez en cliquant sur OK

.. _tp-configuration-php:

*************
Configuration
*************

Fichier de configuration
========================

La configuration de PHP se fait dans le fichier ``php.ini``.

Pour savoir où se trouve le ou les ``php.ini`` utilisés par votre interpreteur, lancez la commande suivante :

.. code-block:: console

	$ php --ini

.. attention::

	Sous certaines distribution linux comme les Debian et ses dérivés, dont fait parti Ubuntu, Apache et le client en ligne de commande utilisent deux configurations différentes.

	Lorsque vous taper la commande ``php --ini``, vous voyez la liste des fichiers de configuration utilisés par le client en ligne de commande.

	Pour savoir quels fichiers sont utilisés par Apache, il faut juste remplacer ``cli`` par ``apache2`` dans les chemins. Ainsi, ``/etc/php5/cli/php.ini`` devient ``/etc/php5/apache2/php.ini``.

Quelques éléménts à configurer
==============================

* ``date.timezone = 'Europe/Paris'`` : le fuseau horaire à utiliser pour les fonctions date
* ``short_open_tag = Off`` : ne pas interpréter les balises <? ?> et <?= ?> comme du PHP
* ``magic_quotes_gpc = Off`` : tous les caractères ' (guillemets simples), " (guillemets doubles), \ (antislash) et NUL ne sont pas échappés avec un antislash 
  pour les opérations GPC (Get/Post/Cookie). Fonction obsolète en 5.3.0, supprimée depuis 5.4.0
* ``register_globals = Off`` : désativer les variables super-globales. Fonction obsolète en 5.3.0, supprimée depuis 5.4.0
* ``session.auto_start = Off`` : Spécifie si le module de session doit démarrer automatiquement au début de chaque script PHP
* ``upload_max_filesize`` : taille maxi autorisée pour uploder des fichiers
* ``post_max_size`` : taille maxi autorisée pour une requête POST 
* ``memory_limit`` : mémoire maxi qu'un script PHP peut allouer. Si ce paramètre vaut -1, alors la mémoire n'est pas limitée
* ``max_execution_time`` : temps d'exécution maxi pour un script. Si ce paramètre vaut -1, alors le temps n'est pas limitée
* ``display_errors`` : affiche les erreurs. Doit être à On sur un poste de développement
* ``html_errors`` : affiche les erreurs en HTML. Doit être à On sur un poste de développement

.. code-block:: ini

    # /etc/php5/apache2/conf.d/20-xdebug.ini
    xdebug.max_nesting_level = 250
 
