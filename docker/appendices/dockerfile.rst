###############################
Instructions du Dockerfile [#]_
###############################

#
    Indique un commentaire.

FROM
    Définit l'image sur laquelle les instructions qui suivent doivent se baser. Elle doit être la première instruction du Dockerfile.

MAINTAINER
    Indique la personne maintenant ce Dockerfile.

RUN
    Exécute une commande sur l'image courante et commit le résultat.

CMD
    Définit la commande exécutée au lancement d'un container. Il ne peut y avoir qu'un :command:`CMD` dans un Dockerfile. Si il y en a plusieurs, seul le dernier sera pris en compte. Toujours préférer la syntaxe en tableau. :command:`CMD` simule un :command:`docker run` et peut être surchargé par cette commande.

EXPOSE 
    Définit le(s) port(s) qui devra être exposé(s) vers l'extérieur.

ENV 
    Affecte une valeur à une variable d'environnement.

ADD 
    Copie de nouveaux fichiers, dossiers locaux ou des fichiers distant (via URL) et les ajoute dans le système de fichier du conteneur selon le chemin indiqué. Cette instruction permet de travailler avec des archives.

COPY
    Copie de nouveaux fichiers, dossiers locaux et les ajoute dans le système de fichier du conteneur selon le chemin indiqué. Cette instruction est purement dédiée pour copier des fichiers locaux lors de la construction d'une image et ne possède aucune capacité de compression/décompression.

ENTRYPOINT 
    Indique la commande par défaut qui sera exécuté au démarrage du conteneur. Il ne peut y avoir qu'un :command:`ENTRYPOINT` dans un Dockerfile. Si il y en a plusieurs, seul le dernier sera pris en compte. Toujours préférer la syntaxe en tableau. :command:`ENTRYPOINT` simule un :command:`docker run` et NE PEUT PAS être surchargé par une commande :command:`docker run` dans le terminal. En revanche tous les arguments passés sur un :command:`docker run` seront passés en arguments à la commande spécifiée dans l'instruction :command:`ENTRYPOINT` du dockerfile.

VOLUME 
    Ajoute un/des volume(s) aux conteneurs crées à partir d'une image. On les utilise par exemple pour que les conteneurs puissent accéder à notre code source et/ou une base de données. 

    * Ces volumes peuvent être partagés et réutilisés dans différents conteneurs. 
    * Un conteneur n'a pas besoin d'être démarré pour partager son volume.
    * Un changement dans le volume ne sera pas conservé lorsque l'image sera mise à jour. 
    * Les volumes sont persistant jusqu'à ce que aucun conteneur ne les utilise.

USER 
    Désigne l'utilisateur qui exécutera (:command:`RUN`) une instruction ou executera un :command:`ENTRYPOINT`.

WORKDIR 
    Assigne le répertoire de travail pour l'exécution des commandes sur l':command:`ENTRYPOINT` et/ou l'instruction :command:`CMD` lorsque le conteneur est lancé à partir de l'image.

ONBUILD 
    ajoute des déclencheurs aux images. Un déclencheur est exécuté lorsque l'image est utilisée comme base d'une autre image. Le déclencheur insert une nouvelle instruction lors de la construction de l'image comme si elle avait été spécifié juste après le :command:`FROM`. Le déclencheur peut exécuter n'importe quelle instruction (:command:`ADD`, :command:`RUN` …)

.. [#] :docker_doc:`reference/builder`