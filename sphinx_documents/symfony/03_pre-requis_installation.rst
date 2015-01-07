#######################################
Pré-requis et installation du framework
#######################################

**********
Pré-requis
**********

* PHP doit être au minimum à la version PHP 5.3.3
* JSON doit être activé
* ctype doit être activé
* Votre PHP.ini doit avoir le paramètre date.timezone défini

Installation de PHP
===================

.. code-block:: bash

    $ sudo apt-get install apache2 php5 php5-cli
    
Installation de MySQL
=====================

.. code-block:: bash

    $ sudo apt-get install mysql-server php5-mysql

Installation d'Apache
=====================

.. code-block:: bash

    $ sudo apt-get install apache2

Installation de librairies et outils supplémentaires
====================================================

.. code-block:: bash

    $ sudo apt-get install curl git tree

.. Ajouter l'installation et la configuration de sendmail


***********************
Installation de Symfony
***********************

Téléchargement de Symfony
=========================

Deux méthodes existent :

* Via le site Symfony http://symfony.com/download
* Via ``Composer``

Nous allons préféré la seconde.

.. code-block:: bash

    $ curl -s https://getcomposer.org/installer | php
    $ php composer.phar create-project symfony/framework-standard-edition /path/to/webroot/Symfony [version]
    
``Composer`` va télécharger et installer toutes les librairies nécessaires au fonctionnent de Symfony :

.. code-block:: yaml   

    Installing symfony/framework-standard-edition (v2.6.1)
    - Installing symfony/framework-standard-edition (v2.6.1)
        Downloading: 100%         

    Created project in symfony/
    Loading composer repositories with package information
    Installing dependencies (including require-dev)
    - Installing psr/log (1.0.0)
        Downloading: 100%         

    - Installing twig/twig (v1.16.3)
        Downloading: 100%         

    - Installing doctrine/lexer (v1.0.1)
        Downloading: 100%         

    - Installing doctrine/annotations (v1.2.3)
        Downloading: 100%         

    - Installing doctrine/collections (v1.2)
        Downloading: 100%         

    - Installing doctrine/cache (v1.3.1)
        Downloading: 100%         

    - Installing doctrine/inflector (v1.0.1)
        Downloading: 100%         

    - Installing doctrine/common (v2.4.2)
        Downloading: 100%         

    - Installing symfony/symfony (v2.6.1)
        Downloading: 100%         

    - Installing doctrine/dbal (v2.5.0)
        Downloading: 100%         

    - Installing doctrine/orm (v2.4.7)
        Downloading: 100%         

    - Installing doctrine/doctrine-cache-bundle (v1.0.1)
        Downloading: 100%         

    - Installing jdorn/sql-formatter (v1.2.17)
        Downloading: 100%         

    - Installing doctrine/doctrine-bundle (v1.3.0)
        Downloading: 100%         

    - Installing twig/extensions (v1.2.0)
        Downloading: 100%         

    - Installing kriswallsmith/assetic (v1.2.1)
        Downloading: 100%         

    - Installing symfony/assetic-bundle (v2.5.0)
        Downloading: 100%         

    - Installing swiftmailer/swiftmailer (v5.3.1)
        Downloading: 100%         

    - Installing symfony/swiftmailer-bundle (v2.3.8)
        Downloading: 100%         

    - Installing monolog/monolog (1.12.0)
        Downloading: 100%         

    - Installing symfony/monolog-bundle (v2.7.1)
        Downloading: 100%         

    - Installing sensio/distribution-bundle (v3.0.2)
        Downloading: 100%         

    - Installing sensio/framework-extra-bundle (v3.0.4)
        Downloading: 100%         

    - Installing incenteev/composer-parameter-handler (v2.1.0)
        Downloading: 100%         

    - Installing sensio/generator-bundle (v2.5.0)
        Downloading: 100%         

    kriswallsmith/assetic suggests installing leafo/lessphp (Assetic provides the integration with the lessphp LESS compiler)
    kriswallsmith/assetic suggests installing leafo/scssphp (Assetic provides the integration with the scssphp SCSS compiler)
    kriswallsmith/assetic suggests installing ptachoire/cssembed (Assetic provides the integration with phpcssembed to embed data uris)
    kriswallsmith/assetic suggests installing leafo/scssphp-compass (Assetic provides the integration with the SCSS compass plugin)
    kriswallsmith/assetic suggests installing patchwork/jsqueeze (Assetic provides the integration with the JSqueeze JavaScript compressor)
    symfony/assetic-bundle suggests installing kriswallsmith/spork (to be able to dump assets in parallel)
    monolog/monolog suggests installing graylog2/gelf-php (Allow sending log messages to a GrayLog2 server)
    monolog/monolog suggests installing raven/raven (Allow sending log messages to a Sentry server)
    monolog/monolog suggests installing doctrine/couchdb (Allow sending log messages to a CouchDB server)
    monolog/monolog suggests installing ruflin/elastica (Allow sending log messages to an Elastic Search server)
    monolog/monolog suggests installing videlalvaro/php-amqplib (Allow sending log messages to an AMQP server using php-amqplib)
    monolog/monolog suggests installing ext-amqp (Allow sending log messages to an AMQP server (1.0+ required))
    monolog/monolog suggests installing ext-mongo (Allow sending log messages to a MongoDB server)
    monolog/monolog suggests installing aws/aws-sdk-php (Allow sending log messages to AWS services like DynamoDB)
    monolog/monolog suggests installing rollbar/rollbar (Allow sending log messages to Rollbar)
    
Il va ensuite paramétrer Symfony :

 .. code-block:: yaml
 
    Writing lock file
    Generating autoload files
    Would you like to install Acme demo bundle? [y/N] y
    Installing the Acme demo bundle.
    Creating the "app/config/parameters.yml" file
    Some parameters are missing. Please provide them.
    database_driver (pdo_mysql):
    database_host (127.0.0.1):
    database_port (null):
    database_name (symfony):
    database_user (root):
    database_password (null): [mot de passe de la base de données]
    mailer_transport (smtp): sendmail
    mailer_host (127.0.0.1):
    mailer_user (null):
    mailer_password (null):
    locale (en): fr
    secret (ThisTokenIsNotSoSecretChangeIt): [token généré sur http://nux.net/secret]
    Clearing the cache for the dev environment with debug true
    Trying to install assets as symbolic links.
    Installing assets for Symfony\Bundle\FrameworkBundle into web/bundles/framework
    The assets were installed using symbolic links.
    Installing assets for Acme\DemoBundle into web/bundles/acmedemo
    The assets were installed using symbolic links.
    Installing assets for Sensio\Bundle\DistributionBundle into web/bundles/sensiodistribution
    The assets were installed using symbolic links.