.. revealjs::

    .. revealjs:: Installation
        :title-heading: h1

    .. revealjs:: Installation des paquets

        .. code-block:: console

            sudo apt-get install mysql-server mysql-client
            sudo apt-get install apache2
            sudo apt-get install curl git
            sudo apt-get install php5 php5-cli php5-intl php5-xsl php5-curl php5-mysql
            sudo apt-get install php5-xdebug

    .. revealjs:: Configuration de PHP

        .. code-block:: ini

            # sudo vim /etc/php5/apache2/php.ini
            date.timezone = Europe/Paris

        .. code-block:: ini

            # sudo vim /etc/php5/cli/php.ini
            date.timezone = Europe/Paris

        .. code-block:: ini

            # sudo vim /etc/php5/apache2/conf.d/20-xdebug.ini
            xdebug.max_nesting_level = 250

    .. revealjs:: Correction des droits sur les fichiers

        .. code-block:: console

            sudo usermod -a -G www-data $(whoami)

        .. code-block:: console

            sudo usermod -a -G $(whoami) www-data

        .. code-block:: bash

            # ~/.profile
            ...
            # umask  002 pour passer les permission de fichiers à 0664 et de dossiers à 0775
            umask 002

        .. code-block:: console

            source ~/.profile

        .. code-block:: bash

            # /etc/apache2/envvars
            ...

            # umask  002 pour passer les permission de fichiers à 0664 et de dossiers à 0775
            umask 002

        .. code-block:: console

            sudo chown www-data:www-data -R /var/www
            sudo chmod g+w -R /var/www
            sudo service apache2 restart

    .. revealjs:: Installation de Symfony

        .. code-block:: console

            cd /var/www
            curl -sS https://getcomposer.org/installer | php

        .. code-block:: console

            cd /var/www
            php composer.phar create-project symfony/framework-standard-edition ./symfony

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

        .. code-block:: console

            mv composer.phar symfony

    .. revealjs:: Mise en place du VHost

        .. code-block:: bash

            # /etc/hosts

            127.0.1.1  symfony.loc.epsi.fr

        .. code-block:: apache

            # /etc/apache2/sites-available/symfony.conf

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