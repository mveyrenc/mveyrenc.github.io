###############
Les contrôleurs
###############

***************************
``Request`` et ``Response``
***************************

Comme vue précédemment, le contrôleur est le chef d'orchestre de votre application, il va utiliser les autres composants (services, modèles, vue) afin de construire la page demandé par l'internaute.

Peut importe ce que vous souhaitez faire, un contrôleur reçoit toujours un objet ``Request`` et doit toujours retourner un objet ``Response``.
La demande de l'internaute se trouve dans un objet ``Request`` dans lequel le contrôleur toute les informations contenues dans la requête HTTP. La ``Response`` quant à elle correspond à la réponse HTTP.

*******************
L'objet ``Request``
*******************

La requête peut contenir des paramètres : l'Id d'un objet à afficher, un nom à chercher dans la base de données, etc. Ces paramètres peuvent être passés au contrôleurs via la route, des paramètres POST ou GET, etc.

Les paramètres contenus dans les routes
=======================================

Les paramètres passée par la route deviendront des arguments de la méthode appelée dans le contrôleur. Prenons cette route par exemple :

.. code-block:: yaml

    epsi_blog_show:
        path:      /post/{id}.{_format}
        defaults:  { _controller: EpsiBlogBundle:Blog:show, _format: html }
        requirements:
            id:  \d+
            _format: html|xml|json

La fonction appelée dans le contrôleur aura la définition suivante : ``public function showAction($id)``.

Les paramètres hors routes
==========================

Pour les autres paramètres ils peuvent tous être récupérés via l'objet ``Request``. Il faut tout d'abord récupérer l'objet ``Request`` dans le contrôleur : ``$request = $this->getRequest();``. Ensuite on peut récupérer les paramètres avec les méthodes suivantes :

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

Une requête ne se compose pas que e paramètres et l'objet ``Request`` permet de les récupérer :

* récupérer la méthode de la requête HTTP :
    * ``$request->getMethod()``
* savoir si la requête est une requête AJAX :
    * ``$request->isXmlHttpRequest()``
* pour tout le reste :
    * http://api.symfony.com/2.6/Symfony/Component/HttpFoundation/Request.html

********************
L'objet ``Response``
********************

Voici en version longue de qu'il faut faire pour construire et retourner une réponse :

.. code-block:: php

    public function showAction($id) {
        // on instancie une réponse
        $response = new Response();
        // on définit le contenu
        $response->setContent('Ceci est le contenu de la page');
        // on définit le code HTTP
        $response->setStatusCode(Reponse::HTTP_OK);
        // on retourne la réponse
        return $response;
    }

Mais généralement, on préfère utiliser les vues pour générer le contenu de la réponse :

.. code-block:: php

    public function showAction($id) {
        return $this->render('EpsiBlogBundle:Blog:show.html.twig', array(
                    'id' => $id,
        ));
    }

Cette méthode est un raccourcie qui permet de générer une réponse en une seul ligne. Si vous souhaitez tout de même modifier certains éléments de la réponse (Content-Type, code de retour, durée du cache, etc.), on peut passer un objet ``Response`` en paramètre.

On peut également faire des redirections dans le contrôleur avec la méthode ``redirect()``. La méthode ``generateUrl`` permet quant à elle de générer l'URL de la page de destination :

.. code-block:: php

    public function showAction($id) {
        return $this->redirect($this->generateUrl('epsi_blog_index', array('page' => 5)));
    }


http://api.symfony.com/2.6/Symfony/Component/HttpFoundation/Response.html