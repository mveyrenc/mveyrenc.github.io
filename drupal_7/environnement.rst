Environnements
==============

Modules
*******

Installer les modules pour l'environnement courant :

.. code-block:: bash

    $ cd /data/sources/owsi-drupal7/bin
    $ ./bin/drush environment -y

Ce script va mettre à jour la BDD locale selon les informations saisies dans les fichiers ``src/www/sites/all/drush/drush_settings/drush.common.php`` et ``src/www/sites/all/drush/drush_settings/drush.[CURRENT_ENV].php``

Nouvel environnement
********************

Cas : Je souhaite créer les settings pour l'environnement de **prod**.

.. code-block:: bash

    $ cd /data/sources/owsi-drupal7/bin
    $ ./create-env.sh prod

Des fichiers seront initialisés à partir des fichiers exemples, la liste apparaîtra à l'écran au lancement de la commande.