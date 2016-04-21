#######################################
Mise en place d'un héritage de template
#######################################

Quand on regarde tous les templates que nous avons créé pour afficher, créer et modifier nos tags, on se rend compte qu'il y a beaucoup de code dupliqué et qu'au final, on ne modifie que le corps de la page.

Le but de l'héritage de template est de réduire la quantité de code en en réutilisant une partie entre les différentes page.

Une des bonne pratique pour organiser ses templates est de mettre trois niveaux d'héritage :

* le **layout général** : il s'agit du design du site. Il est indépendant de celui des bundles. Il contient la structure des page de votre site : header, footer, menu principal, etc. Son chemin exact est ``app/Resources/views/base.html.twig`` et voici la syntaxe pour l'appeler dans vos bundles : ``::base.html.twig``
* le **layout du bundle** : il hérite du layout général et contient tous les éléments communs aux pages d'un même bundle comme un menu secondaire par exemple
* le **template de la page** : il hérite du layout du bundle et contient la partie centrale de la page

Reprenons le template ``src/Epsi/Bundle/BlogBundle/Resources/views/Tag/index.html.twig`` et répartissons le code dans les templates ``app/Resources/views/base.html.twig`` et ``src/Epsi/Bundle/BlogBundle/Resources/views/base.html.twig`` en remplaçant les parties spécifiques par des blocs et en l'enrichissant un peu :

*****************
Le layout général
*****************

Ici, je définis la structure générale de ma page. On doit trouver les balises ``<html>``, ``<head>``, ``<body>``, les CSS et javascript à charger sur toute les pages, et la zone entre ``<body>`` et ``</body>`` doit être découpé en bloc représentant les différentes zones de la page à afficher.

.. code-block:: html+jinja

    {# app/Resources/views/base.html.twig #}
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equic="Content-type" content="text/html; charset=utf-8"/>
        <title>{% block title %}{% endblock %} - Blog</title>
        {% block stylesheets %}
            <link href="{{ asset('bundles/epsiblog/css/bootstrap.min.css') }}" rel="stylesheet"/>
            <link href="{{ asset('bundles/epsiblog/css/bootstrap-theme.css') }}" rel="stylesheet"/>
        {% endblock %}
    </head>
    <body>
    {% block body %}
        <div class="container">
            <header class="well">
                {% block header %}
                {% endblock %}
            </header>
            <div id="content">
                {% block content %}
                {% endblock %}
            </div>
            <footer>
                {% block footer %}
                    &copy; Copyright 2015
                {% endblock %}
            </footer>
        </div>
    {% block javascripts %}
        <script src="{{ asset('bundles/epsiblog/js/jquery-1.12.2.min.js') }}"></script>
        <script src="{{ asset('bundles/epsiblog/js/bootstrap.min.js') }}"></script>
    {% endblock %}
    {% endblock %}
    </body>
    </html>

*******************
Le layout du bundle
*******************

Dans un template qui hérite d'un autre, on ne peut que remplir les blocs définis dans le template parent. Dans le layout du bundle, vous devez remplir toute les zones qui sont identique sur toutes les pages de votre bundle.

Par exemple, comme le menu est identique sur toutes les pages du blog, je le place dans le bloc ``header`` afin de ne pas avoir à le répéter dans chaque template.

Lorsqu'on redéfinit un bloc, on peut soit ignorer le contenu qu'il avait précédent, c'est le cas pour ``title`` et ``header``. Soit ajouter quelque chose en utilisant la fonction ``parent()`` comme dans le bloc ``footer``.

.. code-block:: html+jinja

    {# src/Epsi/Bundle/BlogBundle/Resources/views/base.html.twig #}
    {% extends "::base.html.twig" %}

    {% block title 'Blog' %}

    {% block header %}
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Mon blog</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ path('epsi_blog_tag_index') }}">Tags</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    {% endblock %}

    {% block footer %}
        {{ parent() }}
        - Mon blog
    {% endblock %}

**********************
Le template de la page
**********************

Ici, on ne définit que la partie spécifique de la page.

.. code-block:: html+jinja

    {# src/Epsi/Bundle/BlogBundle/Resources/views/Tag/index.html.twig #}
    {% extends "EpsiBlogBundle::base.html.twig" %}

    {% block content %}
        <h1>Tags</h1>
        {% for type, messages in app.session.flashbag.all %}
            {% for message in messages %}
                {{ type }} : {{ message }}
            {% endfor %}
        {% endfor %}
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            {% for entity in entities %}
                <tr>
                    <td><a href="{{ path('epsi_blog_tag_show', { 'id': entity.id }) }}">{{ entity.id }}</a></td>
                    <td>{{ entity.name }}</td>
                    <td>
                        <ul>
                            <li>
                                <a href="{{ path('epsi_blog_tag_show', { 'id': entity.id }) }}">show</a>
                            </li>
                            <li>
                                <a href="{{ path('epsi_blog_tag_edit', { 'id': entity.id }) }}">edit</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            {% endfor %}
        </table>

        <ul>
            <li>
                <a href="{{ path('epsi_blog_tag_new') }}">
                    Create a new entry
                </a>
            </li>
        </ul>
    {% endblock %}
