###################################
Configuration de la base de données
###################################

Avant de pouvoir s'attaquer aux entités, il faut créer une base de données qui permettra de stocker les données saisies dans les formulaires de notre blog.

Dans PhpMyAdmin, créez une base de données MySQL pour votre blog.

Entrez les paramètres de connexion à votre base dans le fichier :file:`app/config/parameters.yml`. Voici un exemple :

.. code-block:: yaml

    parameters:
        database_host: 127.0.0.1
        database_port: null
        database_name: epsi_blog
        database_user: epsi_blog
        database_password: epsi_blog
        mailer_transport: smtp
        mailer_host: 127.0.0.1
        mailer_user: null
        mailer_password: null
        secret: ThisIsSecret

Si vous n'avez pas de mot de passe pour vous connectez à votre base de données, mettez la valeur ``null`` à ``database_password``.

..
    CREATE DATABASE epsi_blog;
    GRANT ALL ON epsi_blog.* TO epsi_blog@localhost IDENTIFIED BY 'epsi_blog';
    FLUSH PRIVILEGES;









