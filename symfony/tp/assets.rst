.. _assets:

##########
Les assets
##########

Les assets sont les éléments de la page HTML chargés côté client comme les javacripts, les images, les CSS, etc. Chaque bundle peut accueillir des assets qui sont placés dans le répertoire ``Resources/public`` des bundles.

Télécharger `jQuery <http://jquery.com/download>`_ et placer le fichier ``jquery-1.12.2.min.js`` dans le répertoire ``public/js`` de notre bundle.

Télécharger `Bootstrap <http://getbootstrap.com/getting-started/#download>`_ et placer les fichiers ainsi dans le répertoire ``public`` :

* dans ``css`` : ``bootstrap.min.css`` et ``bootstrap-theme.css``
* dans ``js`` : ``bootstrap.min.js``
* dans ``fonts`` : tous les fichiers du répertoire ``fonts`` de Bootstrap

Actuellement, les fichiers ne sont pas accessibles par le visiteur car il n'a accès qu'au répertoire ``web`` de Symfony. Pour les publier, lançons la commande suivante :

.. code-block:: bash

    $ php app/console assets:install web --symlink

L'option ``symlink`` permet de créer des liens symboliques au lieu de copies physique des fichiers. Cela nous permet de ne pas retaper cette commande à chaque modification.

Chargeons la CSS et les javascripts dans nos templates :

.. literalinclude:: /code-block/assets/base.html.twig
    :language: html+jinja