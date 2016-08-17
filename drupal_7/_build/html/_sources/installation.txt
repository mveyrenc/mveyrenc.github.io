Installation
============

Pré-requis
**********

.. code-block:: bash

    # Pour dézipper les libraires JS téléchargées
    $ sudo apt-get install unzip

    # Génération de la documentation Sphinx en PDF
    $ sudo apt-get install texlive


Création initiale du projet
***************************

.. attention:: Cette phase n'est nécessaire que lors du démarrage d'un projet. Si le projet a déjà un repository, alors passez directement à l'étape suivante installation-projet_.

Installation du repository OWSI-Drupal 7
----------------------------------------

.. code-block:: bash

    $ cd /data/sources
    $ git clone ssh://git.projects.openwide.fr/gitroot/owsi-drupal7
    $ cd /data/sources/owsi-drupal7
    $ git submodule update --init

Initialisation du projet
------------------------

Clônez le repository du projet dans *[PROJECT_DIRECTORY]*, puis lancez le script d'initialisation **à partir du dossier owsi-drupal7** :

.. code-block:: bash

    $ cd /data/sources/owsi-drupal7/bin
    $ chmod u+x create-project.sh
    $ ./create-project.sh [PROJECT_DIRECTORY]

.. _installation-projet:

Installation du projet
**********************

Création du VHost
-----------------

Configurez votre VHost comme ceci :

.. literalinclude:: include/owsi-drupal7.vhost.conf
    :language: apacheconf

Création de la BDD
------------------

Créez la BDD via phpMyAdmin ou en ligne de commandes :

.. code-block:: bash

    $ mysql -u [username] -e "CREATE DATABASE __db__ CHARACTER SET utf8 COLLATE utf8_general_ci;"
    $ mysql -u [username];

Puis affectez les droits à un user MySQL que vousdoc créerez :

.. code-block:: mysql

    GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES ON __db__.* TO 'admin'@'localhost' IDENTIFIED BY 'admin';

.. seealso::

    Création de la BDD : https://www.drupal.org/documentation/install/create-database


Installation du site
--------------------

Introduction
############

**Que fait l'installeur ?**

* Récupération de Drush via composer
* Génération des fichiers de settings nécessaires :

  * *drush.env.php/drush.common.php* : Activation/désactivation des modules/thèmes/settings de façon générale ou par environnement (dev, recette, prod ...)
  * *conf.[env].sh* : Paramétrage de l'environnement courant avec les accès SSH / répertoires d'installation
  * *sites/[site]/common.settings.php* / *sites/[site]/[env].settings.php* : Configuration de la BDD de chaque site (cas du multisite)

* Création des répertoires / liens symboliques nécéssaires dans le répertoire de travail / instance Drupal
* Utilisation du profil *Ow Profile* comme base pour les modules/thèmes spécifiques sur le site
* Récupération du core Drupal + création de la BDD
* Récupération et copie des librairies JS distantes indiquées dans le fichier ``ow_profile.make`` du profil
* Application des droits de lecture/écriture selon les préconisations Drupal.org
* Insertion de variables custom dans la console d'administration générale Drupal

Lancement
#########

Clônez le repository du projet dans votre workspace :

.. code-block:: bash

    $ cd /data/sources/
    $ git clone ssh://git.projects.openwide.fr/gitroot/MY_PROJECT
    $ cd /data/sources/MY_PROJECT
    $ git submodule update --init
    $ ./bin/install.sh -e dev

.. note::
    Lors de la saisie des paramètres de BDD & co sur les environnements distants, copiez-les également dans le wiki OW ou dans un doc sphinx interne pour historique.

Traductions
-----------

Allez dans l'interface d'administration, et appliquez la langue par défaut pour le BO : http://myvhost.loc/admin/config/regional/language, puis lancez la commande de mise à jour des traductions du core et des modules :

.. code-block:: bash

    $ ./bin/drush l10n-update-refresh
    $ ./bin/drush l10n-update

.. note::
    Le temps de chargement peut être relativement long alors ... allez chercher un café ;-)
