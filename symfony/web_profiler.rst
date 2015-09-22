###############
Le web-profiler
###############

Le web-profiler est actif uniquement lorsqu'on utilise le contrôleur frontal :file:`app_dev.php`. 

Mais dans un premier temps, modifier le fichier :file:`src/Epsi/Bundle/BlogBundle/Resources/views/Default/index.html.twig` et insérer le code suivant :

.. code-block:: html+jinja

    {% extends "::base.html.twig" %}
    {% block body %}
        Hello {{ name }}!
    {% endblock %}

Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/hello/World.
En bas de la page, vous trouverez une barre avec des informations sur la page que vous affichez :

.. image:: /_static/images/web_toolbar_description.png
    :align: center
    :class: box

#. Version de Symfony avec un lien vers la documentation officielle
#. Version de PHP avec les extensions activées. En cliquant sur cet item, on peut visualiser le phpinfo
#. Configuration utilisée et le numéro de token du profiler
#. Code de retour et code exécuté pour afficher la page (contrôleur + route)
#. Requêtes Ajax exécutées par la page
#. Temps nécessaire à la construction de la page
#. Mémoire utilisée pour construire la page
#. Formulaires soumis
#. Temps de calcul des templates et templates composants la page
#. Session de l'utilisateur courant
#. Requêtes en base de données

En cliquant sur la barre du profiler, on peut ouvrir le profiler pour afficher plus d'informations :

.. image:: /_static/images/web_profiler_full.png
    :align: center
    :class: box
