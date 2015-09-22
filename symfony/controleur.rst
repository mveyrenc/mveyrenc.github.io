###############
Les contrôleurs
###############

***************************
``Request`` et ``Response``
***************************

Comme vue précédemment, le contrôleur est le chef d'orchestre de votre application, il va utiliser les autres composants (services, modèles, vues) afin de construire la page demandée par l'internaute.

Peu importe ce que vous souhaitez faire, un contrôleur reçoit toujours un objet ``Request`` et doit toujours retourner un objet ``Response``.
La demande de l'internaute se trouve dans un objet ``Request`` dans lequel le contrôleur toute les informations contenues dans la requête HTTP. La ``Response`` quant à elle correspond à la réponse HTTP.

*******************
L'objet ``Request``
*******************

Paramètres de la route
======================

Les paramètres passés par dans l'URL (hors paramètres GET) doivent êtres récupérés comme paramètre dans dans la route. Il seront ensuite transmis au contrôleur comme arguments de celui-ci :

    .. code-block:: php

        /**
         * @Route("/hello/{name}")
         * @Template()
         */
        public function indexAction($name)
        {
            return array('name' => $name);
        }

Autres paramètres
=================

Les autres paramètres peuvent tous être récupérés via l'objet ``Request`` dans le contrôleur que l'on peut obtenir en faisant ``$request = $this->getRequest();``. Ensuite on peut récupérer les paramètres avec les méthodes suivantes :

+---------------------------+-----------------------------+---------------------------+------------------------------------------------------------------+
| Type de paramètres        | Méthode Symfony2            | Méthode traditionnelle    | Exemple                                                          |
+===========================+=============================+===========================+==================================================================+
| Variables d'URL           | ``$request->query``         | ``$_GET``                 | ``$request->query->get('tag')``                                  |
+---------------------------+-----------------------------+---------------------------+------------------------------------------------------------------+
| Variables de formulaire   | ``$request->request``       | ``$_POST``                | ``$request->request->get('tag')``                                |
+---------------------------+-----------------------------+---------------------------+------------------------------------------------------------------+
| Variables de cookie       | ``$request->cookies``       | ``$_COOKIE``              | ``$request->cookies->get('tag')``                                |
+---------------------------+-----------------------------+---------------------------+------------------------------------------------------------------+
| Variables de serveur      | ``$request->server``        | ``$_SERVER``              | ``$request->server->get('REQUEST_URI')``                         |
+---------------------------+-----------------------------+---------------------------+------------------------------------------------------------------+
| Variables d'entête        | ``$request->headers``       | ``$_SERVER['HTTP*']``     | ``$request->headers->get('USER_AGENT')``                         |
+---------------------------+-----------------------------+---------------------------+------------------------------------------------------------------+
| Paramètres de route       | ``$request->attributes``    | n/a                       | ``$request->attributes->get('id')``, est équivalent à ``$id``    |
+---------------------------+-----------------------------+---------------------------+------------------------------------------------------------------+

Les autres méthodes de l'objet ``Request``
==========================================

Une requête ne se compose pas que le paramètres et l'objet ``Request`` permet de les récupérer d'autres informations comme :

* la méthode de la requête HTTP : ``$request->getMethod()``

* savoir si la requête est une requête AJAX : ``$request->isXmlHttpRequest()``

* pour tout le reste : http://api.symfony.com/2.7/Symfony/Component/HttpFoundation/Request.html

********************
L'objet ``Response``
********************

Voici en version longue de qu'il faut faire pour construire et retourner une réponse :

.. code-block:: php

    public function indexAction($name)
        // on instancie une réponse
        $response = new Response();
        // on définit le contenu
        $response->setContent('Hello ' . $name . '!');
        // on définit le code HTTP
        $response->setStatusCode(Reponse::HTTP_OK);
        // on retourne la réponse
        return $response;
    }

Mais généralement, on préfère utiliser les vues pour générer le contenu de la réponse :

    .. code-block:: php

        public function showAction($id) {
            return $this->render('EpsiBlogBundle:Default:index.html.twig', array(
                'name' => $name,
            ));
        }

Cette méthode est un raccourcie qui permet de générer une réponse en une seul ligne. Le contenu de la réponse est généré par le template ``src/Epsi/Bundle/BlogBundle/Resources/views/Default/index.html.twig`` :

    .. code-block:: html+jinja

        {% extends "::base.html.twig" %}
        {% block body %}
            Hello {{ name }}!
        {% endblock %}

Allez voir la page http://symfony.loc.epsi.fr/app_dev.php/hello/World.

Si vous souhaitez tout de même modifier certains éléments de la réponse (Content-Type, code de retour, durée du cache, etc.), on peut passer un objet ``Response`` en paramètre à la méthode ``render()``.

On peut également faire des redirections dans le contrôleur avec la méthode ``redirect()``. La méthode ``generateUrl`` permet quant à elle de générer l'URL de la page de destination :

    .. code-block:: php

        public function showAction($id) {
            return $this->redirect($this->generateUrl('epsi_blog_default_index', array('name' => 'the world')));
        }