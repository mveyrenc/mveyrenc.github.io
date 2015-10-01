.. revealjs::

    .. revealjs:: Installation
        :title-heading: h1

    .. revealjs:: Installation des paquets
        :class: text-left

        Exécutez les commandes suivantes

        .. code-block:: console

            sudo apt-get install mysql-server mysql-client
            sudo apt-get install apache2
            sudo apt-get install curl git
            sudo apt-get install php5 php5-cli php5-intl php5-xsl \
                php5-curl php5-mysql
            sudo apt-get install php5-xdebug

    .. revealjs:: Configuration de PHP
        :class: text-left

        Modifiez les lignes suivantes :

        * dans :file:`/etc/php5/apache2/php.ini` :

        .. code-block:: ini

            ;date.timezone
            date.timezone  = Europe/Paris

        * dans :file:`/etc/php5/cli/php.ini` :

        .. code-block:: ini

            ;date.timezone
            date.timezone = Europe/Paris

        Ajoutez le ligne suivante à la fin du fichier :file:`/etc/php5/apache2/conf.d/20-xdebug.ini`

        .. code-block:: ini

            xdebug.max_nesting_level = 250

    .. revealjs:: Correction des droits sur les fichiers
        :class: text-left

        Exécutez les commandes suivantes 

        .. code-block:: console

            sudo usermod -a -G www-data $(whoami)
            sudo usermod -a -G $(whoami) www-data

        Ajoutez la ligne suivante à la fin du fichier :file:`~/.profile`

        .. code-block:: bash

            umask 002

        Ajoutez la lignes suivante à la fin du fichier :file:`/etc/apache2/envvars`

        .. code-block:: bash

            umask 002

    .. revealjs:: Correction des droits sur les fichiers
        :class: text-left

        Exécutez les commandes suivantes

        .. code-block:: console

            sudo chown www-data:www-data -R /var/www
            sudo chmod g+w -R /var/www
            sudo service apache2 restart

        Fermez votre session puis rouvrez-la

    .. revealjs:: Installation de Symfony
        :class: text-left

        Allez dans le répertoire :file:`/var/www`

        .. code-block:: console

            cd /var/www

        Téléchargez :program:`Composer`

        .. code-block:: console

            curl -sS https://getcomposer.org/installer | php

        Télécharger et installez :program:`Symfony` via :program:`Composer`

        .. code-block:: console

            php composer.phar create-project \
                symfony/framework-standard-edition ./symfony

    .. revealjs:: Installation de Symfony
        :class: text-left

        À la fin de l'installation, paramétrez votre installation de :program:`Symfony` en spécifiant les paramètres ``database_user`` et ``database_password``

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

        Déplacez le fichier :file:`composer.phar` dans le répertoire :file:`symfony`

        .. code-block:: console

            mv composer.phar symfony

    .. revealjs:: Création de la base de données
        :class: text-left

        Connectez-vous à MySQL

        .. code-block:: console

            mysql -uroot -p

        Entrez les requêtes suivantes

        .. code-block:: mysql

           CREATE DATABASE symfony;
           GRANT ALL ON symfony.* TO symfony@localhost IDENTIFIED BY 'symfony_pass';
           QUIT

    .. revealjs:: Mise en place du VHost
        :class: text-left

        Ajoutez la signe suivante à la fin du fichier :file:`/etc/hosts`

        .. code-block:: bash

            127.0.1.1  symfony.loc.epsi.fr

    .. revealjs:: Mise en place du VHost
        :class: text-left

        Créez le fichier :file:`/etc/apache2/sites-available/symfony.conf` et ajoutez-y les lignes suivantes

        .. code-block:: apache

            <VirtualHost *:80>
                ServerName symfony.loc.epsi.fr

                DocumentRoot /var/www/symfony/web
                <Directory /var/www/symfony/web>
                    AllowOverride All
                    Require all granted
                </Directory>

                ErrorLog /var/log/apache2/symfony.loc.epsi.fr_error.log
                CustomLog /var/log/apache2/symfony.loc.epsi.fr_access.log combined
            </VirtualHost>

        Activez le VHost et rechargez Apache

        .. code-block:: console

            sudo a2ensite symfony.conf
            sudo service apache2 reload

    .. revealjs:: Vérification de votre configuration de PHP

        http://symfony.loc.epsi.fr/config.php

        .. image:: _static/images/symfony_config_success.png

    .. revealjs:: Vérification de votre configuration de PHP

        .. code-block:: console

            cd /var/www/symfony
            php app/check.php

        .. image:: _static/images/symfony_config_cli.png