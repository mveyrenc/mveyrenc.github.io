###############
Commandes Drush
###############

Autocomplétion
**************

Pour faciliter l'écriture de commandes Drush, il existe un outil d'autocomplétion.

.. seealso::

  http://developpeur-drupal.com/article/drush-avance-installation-composer-alias-autocompletions

Activer un module
*****************

Si le module n'est pas dans les sources, alors il est téléchargé dans sa dernière version compatible avec le core choisi par le profil (ex : 7.x).

Cependant, avant de télécharger la dernière version d'un module, il est conseillé de le tester en local pour vérifier qu'il n'y a pas de régression.

On utilisera le module **update_manager** pour être averti en BO des nouvelles versions des modules installés.

.. code-block:: bash

    $ ./bin/drush en mymodule

Désactiver un module
********************

.. code-block:: bash

    $ ./bin/drush dis mymodule

Lister les modules du site
**************************

.. code-block:: bash

    $ ./bin/drush pml

Dumper une BDD
**************

.. code-block:: bash

        $ ./bin/drush sql-dump > dump.sql

Vider le cache
**************

.. code-block:: bash

    $ ./bin/drush cc all
    $ ./bin/drush cc css-js

Mettre à jour une BDD
*********************

Met à jour la BDD selon les hooks créés

.. code-block:: bash

        $ ./bin/drush updb


Mode maintenance
****************

.. code-block:: bash

    $ ./bin/drush vset maintenance_mode 1
    $ ./bin/drush vset maintenance_mode 0


Gestion du cache des alias d'image
**********************************

Regénère le itok des images

.. code-block:: bash

    $ ./bin/drush vset drupal_private_key 0
    $ rm -rf sites/default/files/styles/[STYLE_NAME]/*

Debug
*****

.. code-block:: bash

    $ ./bin/drush ws --tail


Features
********

.. seealso::

    http://drupalfr.org/documentation/prise-main-detaillee-modules-context-features

features-update
---------------

Appliquer les modifications de la BDD dans le fichier.

Cas : On a mis à jour les droits utilisateurs ou un type de contenu en local, on lance cette commande pour injecter les modifications dans la feature pour déploiement sur les environnements

.. code-block:: bash

    $ ./bin/drush fu -y ow_main

features-revert
---------------

Appliquer les modifications fichiers dans la BDD.

Cas : On déploie des modifications sur les environnements (Attention : écrase les valeurs précédemments affectées)

.. code-block:: bash

    $ ./bin/drush fr -y ow_main
    $ ./bin/drush fra (features-revert-all)

features-export
---------------

Pour exporter une variable dans le fichier ``module.info`` du module

.. code-block:: bash

    # ./bin/drush fe mymodule var:googleanalytics_account
    $ ./bin/drush fe mymodule my_variable


.. seealso::

    https://www.drupal.org/node/960926

    http://docs.drush.org/en/master/examples/

    http://drewpull.drupalgardens.com/blog/drush-make-site-deployment
