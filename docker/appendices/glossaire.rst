#########
Glossaire
#########

.. glossary::
    :sorted:

    image
        Les images Docker sont la base des containers. Elle n'a pas d'état et ne change jamais.

    image de base
        Une image qui n'a pas de parent est une image de base.

    build
        build est le processus de construction des images Docker utilisant un Dockerfile. Le build utilise un Dockerfile et un «contexte». Le contexte est l'ensemble des fichiers dans le répertoire dans lequel l'image est construite.

    Compose
    docker-composer
    fig
        Composer est un outil pour la définition et l'exécution d'applications complexes avec Docker. Avec Compose, vous définissez une application multi-conteneur dans un seul fichier, puis faites tourner votre application en une seule commande qui fait tout ce qui doit être fait pour le faire fonctionner.

    container
        Un container est une instance d'exécution d'une image de docker.

        Un container Docker se compose :

            * d'une image Docker
            * d'un environnement d'exécution
            * d'un jeu d'instructions

        Le concept est emprunté aux conteneurs maritimes, qui définissent une norme pour expédier des marchandises à l'échelle mondiale. Docker définit une norme pour fournir des logiciels.

    volume
    volume de données
        Un volume de données est un répertoire spécialement désigné dans lequel un ou plusieurs containers qui contourne le système de fichiers de l'Union. Les volumes de données sont conçus pour maintenir les données, indépendantes du cycle de vie du conteneur. Docker ne supprime pas les volumes lors vous supprimez un container. Il ne supprime pas non plus les volume qui ne sont plus référencés par des container.

    Dockerfile
        Fichier texte permettant de construire une image personnalisée à partir d'une image de base.

    Registry
        Endroit où les images sont stockées, partagées.
