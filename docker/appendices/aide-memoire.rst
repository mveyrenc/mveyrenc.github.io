############
Aide mémoire
############

Lister les images 

    .. code-block:: console
    
        docker images

Videz les images obsolètes

    .. code-block:: console

        docker rmi `docker images | awk '/<none>/ {print $3}'`