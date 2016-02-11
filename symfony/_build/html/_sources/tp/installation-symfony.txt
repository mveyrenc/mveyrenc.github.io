.. _tp-installation:

#######################
Installation de Symfony
#######################

.. admonition:: Avant de commencer
    :class: warning

    Le TP est doit être réalisé avec la version 2.7 de Symfony.

************
Installation
************

Sous Linux
==========

.. code-block:: console

    $ cd ~
    $ curl -LsS https://symfony.com/installer -o symfony.phar
    $ chmod a+x symfony.phar
    $ php symfony.phar new symfony 2.7

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

        DocumentRoot ~/Symfony/web
        <Directory ~/Symfony/web>
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

Sous Mac OS
===========

.. code-block:: console

    $ cd /Applications/MAMP/htdocs/
    $ curl -LsS https://symfony.com/installer -o symfony.phar
    $ chmod a+x symfony.phar
    $ php symfony.phar new Symfony 2.7

Sous Windows
============

.. code-block:: console

    c:\> cd c:\wamp\www
    c:\> php -r "readfile('https://symfony.com/installer');" > symfony.phar
    c:\> php symfony.phar new Symfony 2.7

.. important::
    A la fin de l'installation, votre Symfony sera accéssible à l'adresse :

        * Sous Linux : http://symfony.loc.epsi.fr
        * Sous MacOS : http://localhost:8888/Symfony/web
        * Sous Windows : http://localhost/Symfony/web

    Toutes les URL données dans le TP doivent être préfixées par l'URL d'accès de Symfony. Par exemple, si on vous demande d'afficher la page ``/app_dev.php/blog1``, il faudra aller sur la page :

        * Sous Linux : http://symfony.loc.epsi.fr/app_dev.php/blog1
        * Sous MacOS : http://localhost:8888/Symfony/web/app_dev.php/blog1
        * Sous Windows : http://localhost/Symfony/web/app_dev.php/blog1


    Toutes les commandes doivent être exécutées dans le répertoire de Symfony :

        * Sous Linux : ``~/symfony``
        * Sous MacOS : ``/Applications/MAMP/htdocs/Symfony``
        * Sous Windows : ``cd c:\wamp\www\Symfony``

    De plus, pour ceux travaillant sous Windows, il faudra remplacer les ``/`` dans les lignes de commande par ``\``.

*******************************
Vérification  de l'installation
*******************************

Vérifier votre configuration de PHP
===================================

Allez à l'adresse :

        * Sous Linux : http://symfony.loc.epsi.fr/config.php
        * Sous MacOS : http://localhost:8888/Symfony/web/config.php
        * Sous Windows : http://localhost/Symfony/web/config.php

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

            date.timezone = Europe/Paris

        .. code-block:: ini

            date.timezone = Europe/Paris

    * Set "xdebug.max_nesting_level" to e.g. "250" in php.ini

        .. code-block:: ini

            xdebug.max_nesting_level = 250

L'installation de Symfony est terminée lorsque vous affichez cette page :

.. image:: /_static/images/symfony_config_success.png

Rendez-vous sur la page ``/app_dev.php``, vous devriez voir cette page :

.. image:: /_static/images/symfony_homepage_post_install.png

Vérifier la configuration de PHP en console
===========================================

Pour gagner du temps, vous aurez besoin d'exécuter des commandes PHP via la console, vérifions donc que la configuration de PHP soit correcte :

.. code-block:: console

    php app/check.php

.. image:: /_static/images/symfony_config_cli.png
    :align: center

