.. revealjs::

    .. revealjs:: Le web-profiler
        :title-heading: h1

    .. revealjs:: Activation
        :class: text-left

        Dans votre bundle, modifiez le fichier ``Resources/views/Default/index.html.twig`` comme suit

        .. code-block:: html+jinja

            {% extends "::base.html.twig" %}
            {% block body %}
                Hello {{ name }}!
            {% endblock %}

        Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/hello/World

    .. revealjs:: 

        .. image:: /_static/images/web_toolbar_description.png
            :align: center
            :class: box

    .. revealjs::


        .. image:: /_static/images/web_profiler_full.png
            :align: center
            :class: box