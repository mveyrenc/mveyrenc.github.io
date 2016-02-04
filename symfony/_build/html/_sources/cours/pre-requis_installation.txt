.. _installation:

#######################################
Pré-requis et installation du framework
#######################################

.. admonition:: Avant de commencer
    :class: warning

    Cette procédure est donnée pour une installation sur une :program:`Ubuntu 14.04`. En fonction de la version d':program:`Ubuntu` ou de la distribution utilisée, les paquets à installer peuvent être différents.

**********
Pré-requis
**********

* PHP doit être au minimum à la version PHP 5.3.3
* JSON doit être activé
* ctype doit être activé
* Votre PHP.ini doit avoir le paramètre date.timezone défini
    
Installation de :program:`MySQL`
================================

.. code-block:: console

    sudo apt-get install mysql-server mysql-client

Installation d':program:`Apache`
================================

.. code-block:: console
    
    sudo apt-get install apache2
    
Installation de librairies et outils supplémentaires
====================================================

.. code-block:: console
    
    sudo apt-get install curl git

Installation et configuration de PHP
====================================

.. code-block:: console

    sudo apt-get install php5 php5-cli php5-intl php5-xsl php5-curl php5-mysql

Dans les fichiers de configuration de PHP, ajoutez la timezone :

.. code-block:: ini

    # /etc/php5/apache2/php.ini
    date.timezone = Europe/Paris

.. code-block:: ini

    # /etc/php5/cli/php.ini
    date.timezone = Europe/Paris

.. attention::

    | L'emplacement et le nombre de :file:`php.ini` pour changer en fonction des distributions Linux utilisées.
    | Dans les distributions :program:`Debian` et ses dérivées, comme :program:`Ubuntu`, il y a deux :file:`php.ini` :
    | * :file:`/etc/php5/apache2/php.ini` utilisé par :program:`Apache` et qui nécessite un redémarrage d':program:`Apache` à chaque modification pour qu'elle soit prise en compte.
    | * :file:`/etc/php5/cli/php.ini` utilisé la commande :command:`php`.
    | Certains paramètres peuvent être différents comme le ``memory_limit``, d'autres doivent être identiques comme le ``date.timezone``.

Comme on est sur un poste de développement, on installe :program:`xDebug` :

.. code-block:: console

    sudo apt-get install php5-xdebug

:program:`xDebug` permet de faire plus de contrôle sur l'exécution du code PHP et remonte des erreurs que ne remonte pas PHP par défaut.
:program:`xDebug` contrôle entre autre la profondeur des fonctions appelés et le limite par défaut à 100, ce qui pose problème avec :program`Symfony`. il faut donc modifier la configuration de XDebug pour augmenter cette limite :

.. code-block:: ini

    # /etc/php5/apache2/conf.d/20-xdebug.ini
    xdebug.max_nesting_level = 250

Correction des droits sur les fichiers
======================================

Afin d corriger les droits sur les fichiers une bonne fois pour toute :

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

* Donnons les droits à ``www-data`` d'écrire dans le répertoire :file:`~` pour y déposer nos projets :

    .. code-block:: console

        sudo chown www-data:www-data -R ~
        sudo chmod g+w -R ~

    .. code-block:: console

        $ ls -l ~
        total 4
        drwxrwxr-x 2 www-data www-data 4096 mai   18 13:09 html

**********************************
Installation de Symfony
**********************************

Deux méthodes existent pour télécharger et installer Symfony :

* Via le site de Symfony http://symfony.com/download
* Via :program:`Composer`

Nous allons préféré la seconde.

Téléchargement de Symfony
====================================

Dans un premier temps, installons :program:`Composer` :

.. code-block:: console

    cd ~
    curl -sS https://getcomposer.org/installer | php

.. hint::

    Si vous avez besoin d'aide pour utiliser :program:`Composer`, la commande :command:`php composer.phar -h` pourra vous en fournir.

Ensuite, on utilise :program:`Composer` pour télécharger Symfony, et on déplace le fichier :file:`composer.phar` dans le répertoire d'installation de Symfony :

.. code-block:: console

    cd ~
    php composer.phar create-project symfony/framework-standard-edition ./symfony
    
:program:`Composer` va télécharger et installer toutes les librairies nécessaires au fonctionnent de Symfony dans le répertoire ``~/symfony``.

À la fin l'installation, :program:`Composer` vous propose une série de question pour initialiser le paramétrage Symfony :

.. code-block:: console

    Creating the "app/config/parameters.yml" file
    Some parameters are missing. Please provide them.
    database_host (127.0.0.1): 
    database_port (null): 
    database_name (symfony): 
    database_user (root): symfony
    database_password (null): symfony_pass
    mailer_transport (smtp): 
    mailer_host (127.0.0.1): 
    mailer_user (null): 
    mailer_password (null): 
    secret (ThisTokenIsNotSoSecretChangeIt): 


.. note::

    | Quand une commande de Symfony vous pose une question
    | * la lettre en majuscule dans ``[y/N]`` représente la réponse par défaut dans une réponse oui/non, ici non.
    | * l'élément entre parenthèses, comme dans ``database_driver (pdo_mysql):``, est la valeur par défaut pour les question ouvertes.
    

Tous ces paramètres sont enregistrés dans le fichier :file:`app/config/parameters.yml`.

Pour finir, déplacez le fichier :file:`composer.phar` dans le répertoire de Symfony :

.. code-block:: console
    
    cd ~
    mv composer.phar symfony/

Mise en place du VHost
======================

Le **VHost**, ou *Virtual Host*, est un paramétrage au niveau du serveur web pour qu'il oriente les requêtes HTTP entrantes vers la bonne application.

Dans un premier temps, nous allons créé un hostname qui nous permettra s'accéder à notre application :

.. code-block:: bash

    # /etc/hosts

    127.0.1.1  symfony.loc.epsi.fr

Ensuite, on crée le Vhost :

.. code-block:: apache
    
    # /etc/apache2/sites-available/symfony.conf

    <VirtualHost *:80>
        ServerName symfony.loc.epsi.fr

        DocumentRoot ~/symfony/web
        <Directory ~/symfony/web>
            AllowOverride All
            Require all granted
        </Directory>

        ErrorLog /var/log/apache2/symfony.loc.epsi.fr_error.log
        CustomLog /var/log/apache2/symfony.loc.epsi.fr_access.log combined
    </VirtualHost>

Pour finir, on active le VHost et on recharche Apache :

.. code-block:: console

    sudo a2ensite symfony.conf
    sudo service apache2 reload

Vérifier votre configuration de PHP
===================================

Allez à l'adresse http://symfony.loc.epsi.fr/config.php.

Si vous avez des problèmes de configuration ou de droits, vous verrez cette page :

    .. image:: /_static/images/symfony_config_error.png

    Corrigez tous les problèmes avant de continuer :

    * Change the permissions of either "app/cache/" or "var/cache/" directory so that the web server can write into it.

        .. code-block:: console

            chmod -R 777 app/cache/

    * Change the permissions of either "app/logs/" or "var/logs/" directory so that the web server can write into it.

        .. code-block:: console

            chmod -R 777 app/logs/

    * Set the "date.timezone" setting in php.ini* (like Europe/Paris).

        .. code-block:: ini

            # /etc/php5/apache2/php.ini
            date.timezone = Europe/Paris

        .. code-block:: ini

            # /etc/php5/cli/php.ini
            date.timezone = Europe/Paris

    * Set "xdebug.max_nesting_level" to e.g. "250" in php.ini

        .. code-block:: ini

            # /etc/php5/apache2/conf.d/20-xdebug.ini
            xdebug.max_nesting_level = 250

L'installation de Symfony est terminée lorsque vous affichez cette page :

.. image:: /_static/images/symfony_config_success.png

Rendez-vous sur la page http://symfony.loc.epsi.fr/app_dev.php/, vous devriez voir cette page :

.. image:: /_static/images/symfony_homepage_post_install.png

Vérifier la configuration de PHP en console
===========================================

Pour gagner du temps, vous aurez besoin d'exécuter des commandes PHP via la console, vérifions donc que la configuration de PHP soit correcte :

.. code-block:: console

    cd ~/symfony
    php app/check.php

.. image:: /_static/images/symfony_config_cli.png
    :align: center

