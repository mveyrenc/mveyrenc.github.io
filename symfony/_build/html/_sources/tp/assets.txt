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

 :

Modifiez le template ``EpsiBlogBundle:Blog:index5.html.twig`` pour charger la CSS et les javascripts dans nos templates :

.. code-block:: html+jinja

    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equic="Content-type" content="text/html; charset=utf-8" />
            {% block stylesheets %}
                <link href="{{ asset('bundles/epsiblog/css/bootstrap.min.css') }}" rel="stylesheet" />
                <link href="{{ asset('bundles/epsiblog/css/bootstrap-theme.css') }}" rel="stylesheet" />
            {% endblock %}
        </head>
        <body>
            {% block body %}
                <div class="container">
                        <h1>Hello {{ name }}!</h1>
                </div>
            {% endblock %}
            {% block javascripts %}
                <script src="{{ asset('bundles/epsiblog/js/jquery-1.12.2.min.js') }}"></script>
                <script src="{{ asset('bundles/epsiblog/js/bootstrap.min.js') }}"></script>
            {% endblock %}
        </body>
    </html>

Dans les templates, la fonction ``asset`` permet de gérérer correctement le chemin vers les assets (CSS, JS, images, etc.). Le chemin des fichiers ne correspond pas à celui présent dans le bundle, mais à celui qui se trouve dans le répertoire ``web`` :

.. code-block:: none

    web/
    ├── app_dev.php
    ├── apple-touch-icon.png
    ├── app.php
    ├── bundles
    │   ├── epsiblog
    │   │   ├── css
    │   │   │   ├── bootstrap.min.css
    │   │   │   └── bootstrap-theme.css
    │   │   ├── fonts
    │   │   │   ├── glyphicons-halflings-regular.eot
    │   │   │   ├── glyphicons-halflings-regular.svg
    │   │   │   ├── glyphicons-halflings-regular.ttf
    │   │   │   ├── glyphicons-halflings-regular.woff
    │   │   │   └── glyphicons-halflings-regular.woff2
    │   │   ├── images
    │   │   └── js
    │   │       ├── bootstrap.min.js
    │   │       └── jquery-1.12.2.min.js
    │   ├── framework
    │   └── sensiodistribution
    ├── config.php
    ├── favicon.ico
    └── robots.txt