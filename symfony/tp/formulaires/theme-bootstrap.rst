###############
Thème Bootstrap
###############

Symfony fournit par défaut des templates pour mettre en forme les formulaires avec Bootstrap. Pour les utiliser, modifiez le fichier ``app/config/config.yml`` pour y ajouter le paramètre suivant :

.. code-block:: yaml

    twig:
        form:
            resources: ['bootstrap_3_layout.html.twig']
            # resources: ['bootstrap_3_horizontal_layout.html.twig']