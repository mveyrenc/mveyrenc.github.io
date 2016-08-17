########################
Construction du document
########################

Placez vous à la racine de votre document.

.. code-block:: bash

    make html # construction de la version HTMl
    make latexpdf # construction du PDF
    make clean # nettoyage du répertoire de build

Vous pouvez installez ``watchdog`` pour surveiller les modifications de fichier et rebuilder votre document quand c'est nécessaire :

.. code-block:: bash

    sudo pip install watchdog
    watchmedo shell-command --recursive --patterns="*.rst" \
        --wait --command='make html'