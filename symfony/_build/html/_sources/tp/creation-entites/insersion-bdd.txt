##########################################################
Création de la table correspondant dans la base de données
##########################################################

Lancez la commande suivante :

.. code-block:: console

    $ php app/console doctrine:schema:update --dump-sql --force

    CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL,
                 date DATETIME NOT NULL,
                 body LONGTEXT NOT NULL,
                 PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

    Updating database schema...
    Database schema updated successfully! "1" queries were executed

La commande ``doctrine:schema:update`` analyse les différences entre la structure de vos entités et cette de votre base de données, puis elle génère les requètes SQL qui permettent de mettre à jour la base de données. L'option ``--dump-sql`` permet d'afficher les requêtes SQL et ``--force`` permet de les exécuter.

Si vous ouvrez un PhpMyAdmin et que vous ouvrez votre base de données vous verrez apparaitre la table ``post``.
