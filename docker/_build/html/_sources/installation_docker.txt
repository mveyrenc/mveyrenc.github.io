##################################
Installation de Docker Engine [#]_
##################################

*********************************
Installation de Docker sur Ubuntu 
*********************************

Pré-requis
    :Ubuntu: de 12.04 à 15.04 en 64-bit
    :Kernel: 3.10+
    :Dépendance: :program:`curl`

.. warning::
    Si vous êtes en 12.04, consultez la documentation officielle avant de vous lancez.

***************************
Mise à jour des sources APT
***************************

Dans un terminal, exécutez les commandes suivantes :

.. code-block:: console

    $ sudo apt-get update
    $ sudo apt-get install aptitude
    $ sudo aptitude install apt-transport-https ca-certificates
    $ sudo apt-key adv --keyserver hkp://p80.pool.sks-keyservers.net:80 --recv-keys 58118E89F3A912897C070ADBF76221572C52609D

Ouvrez le fichier ``/etc/apt/sources.list.d/docker.list``. S'il n'exite pas, créez le. S'il existe déjà, videz le. Puis ajouter la ligne suivante :

* sur Ubuntu Precise 12.04 (LTS)

    .. code-block:: bash

        deb https://apt.dockerproject.org/repo ubuntu-precise main

* sur Ubuntu Trusty 14.04 (LTS)

    .. code-block:: bash

        deb https://apt.dockerproject.org/repo ubuntu-trusty main

* sur Ubuntu Wily 15.10

    .. code-block:: bash

        deb https://apt.dockerproject.org/repo ubuntu-wily main

Rechargez la liste des paquets :

.. code-block:: console

    $ sudo aptitude update

Si vous avez déjà installé docker, purgez votre installation :

.. code-block:: console

    $ sudo aptitude purge lxc-docker

Vérifier que vous récupérerez le paquet à partir du bon repo :

.. code-block:: console

    $ apt-cache policy docker-engine

    docker-engine:
      Installé : (aucun)
      Candidat : 1.10.1-0~trusty
     Table de version :
         1.10.1-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.10.0-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.9.1-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.9.0-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.8.3-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.8.2-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.8.1-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.8.0-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.7.1-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.7.0-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.6.2-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.6.1-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.6.0-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages
         1.5.0-0~trusty 0
            500 https://apt.dockerproject.org/repo/ ubuntu-trusty/main amd64 Packages

*************************
Intallation des prérequis
*************************

Dans un terminal, exécutez la commande suivante pour installer le paquet ``linux-image-extra`` :

.. code-block:: console

    $ sudo aptitude install linux-image-extra-$(uname -r)

*****************************
Installation de Docker Engine
*****************************

.. important::

    Après plusieurs tests, la version 1.10 n'est pas compatible avec les images dont nous disponons. La procédure ci-dessous diffère de la procédure officiel afin de forcer l'installation de la version 1.9 et de bloquer les mise à jour automatique de Docker.

 Dans un terminal, listez les versions de Docker disponibles sur le dépôt :

.. code-block:: console

    $ sudo aptitude versions docker-engine

    Paquet docker-engine :
    p   1.5.0-0~trusty                                                    ubuntu-trusty                                  500
    p   1.6.0-0~trusty                                                    ubuntu-trusty                                  500
    p   1.6.1-0~trusty                                                    ubuntu-trusty                                  500
    p   1.6.2-0~trusty                                                    ubuntu-trusty                                  500
    p   1.7.0-0~trusty                                                    ubuntu-trusty                                  500
    p   1.7.1-0~trusty                                                    ubuntu-trusty                                  500
    p   1.8.0-0~trusty                                                    ubuntu-trusty                                  500
    p   1.8.1-0~trusty                                                    ubuntu-trusty                                  500
    p   1.8.2-0~trusty                                                    ubuntu-trusty                                  500
    p   1.8.3-0~trusty                                                    ubuntu-trusty                                  500
    p   1.9.0-0~trusty                                                    ubuntu-trusty                                  500
    p   1.9.1-0~trusty                                                    ubuntu-trusty                                  500
    p   1.10.0-0~trusty                                                   ubuntu-trusty                                  500
    p   1.10.1-0~trusty                                                   ubuntu-trusty                                  500

Intallez la version 1.9 la plus récente :

.. code-block:: console

    $ sudo aptitude install docker-engine=1.9.1-0~trusty

Enfin, vérouillez la version du paquet à la version installée :

.. code-block:: console

    $ sudo aptitude hold docker-engine

****************************************
Changer le dossier :file:`lib` de Docker
****************************************

Arrêtez Docker :

    .. code-block:: console

        sudo stop docker

Éditez le fichier :file:`/etc/default/docker` et ajoutez :

    .. code-block:: bash
        
        DOCKER_OPTS="-g /data/services/docker/"

Déplacez le répertoire :file:`lib` :

    .. code-block:: console

        mkdir -p /data/services
        sudo mv /var/lib/docker /data/services

Redémarrez Docker :

    .. code-block:: console

        sudo start docker

***************************************
Configuration Docker en non root-access
***************************************

.. code-block:: console

    sudo usermod -aG docker $(whoami)
    sudo restart docker

***********************************
Installation de docker-compose [#]_
***********************************

.. code-block:: console

    sudo -s
    aptitude install curl
    curl -L https://github.com/docker/compose/releases/download/1.5.2/docker-compose-`uname -s`-`uname -m` \
        > /usr/local/bin/docker-compose
    chmod +x /usr/local/bin/docker-compose
    curl -L https://raw.githubusercontent.com/docker/compose/$(docker-compose --version | awk 'NR==1{print $NF}')/contrib/completion/bash/docker-compose \
        > /etc/bash_completion.d/docker-compose
    exit

.. [#] :docker_doc:`installation/ubuntulinux`
.. [#] :docker_doc:`compose`

********************
Installation de make 
********************

make est utilisé au niveau des projets pour automatiser certaines tâches complètes ou répétitives.

.. code-block:: console

    sudo aptitude install make

*****************************
Installation de docker-listen 
*****************************

Ce script python permet d'ajouter et de supprimer vos dockers dans dnsmaq pour vous permettre d'accéder à vos dockers avec des nom de domaine.

* Installez dnsmasq

.. code-block:: console

    sudo aptitude install dnsmasq

* Installez docker-listen dans /data/services

.. code-block:: console

    cd /data/services/
    git clone https://github.com/openwide-java/docker-listen.git
    cd docker-listen

* Créez un environnement virtuel python

.. code-block:: console

    sudo apt-get install python-pip python-dev build-essential 
    sudo pip install --upgrade pip
    sudo pip install --upgrade virtualenv 
    virtualenv docker-listen-pyenv
    ./docker-listen-pyenv/bin/pip install dpath
    ./docker-listen-pyenv/bin/pip install docker-py

* Créez le script de démarrage du service. Pensez à ouvrir le fichier /etc/init/docker-listen.conf pour vérifier la configuration

.. code-block:: console

    sudo cp upstart/docker-listen.conf /etc/init

* Lancer le service

.. code-block:: console

    sudo start docker-listen
