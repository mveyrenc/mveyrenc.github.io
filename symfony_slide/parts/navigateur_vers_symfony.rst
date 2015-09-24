
.. revealjs::

    .. revealjs:: Du navigateur vers Symfony
        :title-heading: h1

    .. revealjs:: De votre navigateur

        .. image:: /_static/images/http.png
            :align: center
            :class: box

        Requête HTTP
            * la méthode utilisée (GET, POST, PUT, DELETE, etc.)
            * la page demandée
            * le type de requête (HTTP/1.1 par exemple)
            * des entêtes (headers)
            * le contenu de la requête

    .. revealjs:: De votre navigateur

        .. image:: /_static/images/http.png
            :align: center
            :class: box

        Réponse HTTP
            * le type de requête (HTTP/1.1 par exemple)
            * le code de retour 200, 301/302, 401/403/404/410, 500

            * des entêtes (headers)
            * le contenu de la réponse

    .. revealjs:: En passant par le serveur web

        .. image:: /_static/images/web_to_sf.png
            :align: center
            :class: box

    .. revealjs:: Vers Symfony

        .. image:: /_static/images/symfony_request_flow.png
            :align: center
            :class: box