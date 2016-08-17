####################
Intégration continue
####################

Jenkins
=======

Voici le paramétrage utilisé sur Jenkins pour la livraison en 3 étapes :

Archivage
*********

.. code-block:: bash

    $ ./archive.sh -e ${DELIVERY_ENV} -w ${WORKSPACE} -v ${GIT_TAG}

Les sources possédant des liens symboliques, le script va remplacer le lien symbolique type ``conf.local.sh`` par une copie du fichier de l'environnment à livrer (ex : ``conf.prod.sh``).

Le script va ensuite remplacer les valeurs spécifiques de l'environnements (ex : chemins) dans le fichier ``delivery.sh``.

Les valeurs de ``DELIVERY_ENV`` et ``GIT_TAG`` sont affichées dans le tableau de bord Drupal afin de voir quel environnement a été livré, et sur quelle branche (En plus de la date de dernière livraison).

Application d'un tag auto
*************************

.. code-block:: bash

    $ cd ${WORKSPACE}/sources
    $ git tag -f -a ${DELIVERY_ENV} -m "Dernière livraison sur ${DELIVERY_ENV} (${BUILD_TAG})"
    $ git push -f origin ${DELIVERY_ENV}

Après livraison de l'archive, on va appliquer automatiquement le tag de l'environnement.

Déploiement des sources
***********************

.. code-block:: bash

    $ cd /data/sources/cfdt-f3c;
    $ tar xvf delivery_${DELIVERY_ENV}.tar.gz;
    $ cd new_drupal/;
    $ ./delivery.sh -t "${BUILD_ID}" -v "${GIT_TAG}";

Côté serveur applicatif, on désarchive les sources et on lance le déploiement.

Le répertoire des anciennes sources est renommé pour historique, et pour permettre un revert, au cas où.

Le déploiement consiste en plusieurs étapes :

- Récupération via composer des dernières versions d'utilitaires : drush (+ mode dev : code sniffer, utilitaires pour behat ...)
- Mise en mode maintenance
- Lancement du ``make.sh`` : téléchargement version Drupal 7.x paramétrée + librairies additionnelles
- Lancement de ``drush environment`` : téléchargement/activation des modules et thèmes de l'environnement
- Application de toutes les features versionnées
- Création des variables du tag livré + date pour affichage dans le tableau de bord admin
- Lancement des mises à jour BDD éventuelles
- Suppression du  cache
- Suppression du mode maintenance
