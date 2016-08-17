########################
Installation d'un projet
########################

Ajoutez le repository ``owsi-docker`` comme submodule de votre projet :

.. code-block:: console

    mkdir docker
    git submodule add git@git.projects.openwide.fr:open-wide/owsi-docker.git docker/core

Copiez le fichier :file:`docker/core/make/Makefile.sample` à la racine du projet et renommez le en :file:`Makefile`.

Créez un :file:`docker-compose.yml` pour créer les services nécessaires à votre projet. Vous trouverez un exemple dans  :file:`docker/core/docker`.

Dans le :file:`Makefile` de votre projet, modifiez les recipes suivantes pour adapter :

    install
        Cette recipe est lancée pour installer le projet c'est à dire :

            * mettre à jour l'intégralité des sources
            * importer les images nécessaires au projet
            * créer les images spécifiques au projet
            * démarrer les conteneurs
            * lancer les scripts l'initialisation des conteneurs

        Si vous devez construire des images spécifiques pour votre projet, écrivez une recipe par image à construire et une recipe pour construire chaque image.

        Exemple :

        .. code-block:: make

            install:
                # Mise à jour des submodules
                git submodule update --init --recursive --remote --merge
                # Import des images docker nécessaires
                $(MAKE) -C docker/core/make owdocker-import-debian8-php56
                $(MAKE) -C docker/core/make owdocker-import-debian8-pgsql94
                # Construction des images spécifiques au projet
                $(MAKE) docker-build-all-image
                # Lancement des containers
                $(MAKE) docker-up

            docker-build-all-image:
                $(MAKE) docker-build-symfony-image
                $(MAKE) docker-build-pgsql-image
                $(MAKE) docker-build-mailcatcher-image

            docker-build-symfony-image:
                $(MAKE) -C docker/images/symfony build
                $(MAKE) -C docker/images/symfony tag_latest

            docker-build-pgsql-image:
                $(MAKE) -C docker/images/pgsql build
                $(MAKE) -C docker/images/pgsql tag_latest

            docker-build-load-balancer-image:
                $(MAKE) -C docker/images/load_balancer build
                $(MAKE) -C docker/images/load_balancer tag_latest

    docker-init-all
        Cette recipe doit lancer les scripts d'initialisation des containers.

        Il est préférable de faire une recipe par container et ce faire en sorte que ``docker-init-all`` appelle la recipe de chaque container.

        Exemple :

        .. code-block:: make

            docker-init-all:
                $(MAKE) docker-init-pgsql
                $(MAKE) docker-init-site
                $(MAKE) docker-init-docs

            docker-init-pgsql:
                docker exec -i -t myproject_pgsql_1 bash /data/services/docker/script.d/pgsql/init.sh

            docker-init-site:
                docker exec -i -t myproject_site_1 bash /data/services/docker/script.d/site/init.sh

            docker-init-docs:
                docker exec -i -t myproject_docs_1 bash /data/services/docker/script.d/docs/init.sh


     