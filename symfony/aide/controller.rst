.. _aide-memoire-controlleur:

###########
Contrôlleur
###########

.. code-block:: php

    // Ajax request?
    $request->isXmlHttpRequest();

    // quel est le langage préféré ?
    $request->getPreferredLanguage(array('en', 'fr'));

    // get a $_GET parameter
    $request->query->get('page'); 

    // get a $_POST parameter
    $request->request->get('page');

    // get a cookie parameter
    $request->cookies->get('page');

    // get REQUEST_URI
    $request->getPathInfo()

    // récupérer l'entity manager de Doctrine
    $em = $this->getDoctrine()->getManager();

    // récupérer un paramètre de l'application défini par exemple dans config.yml
    $param = $this->container->getParameter('my_parameter');

    // récupérer la locale courante :
    $this->get('session')->getLocale();

    // récupérer un service
    $service = $this->get("my.service");

    // récupérer le "baseUrl (+ ou - complet)" de l'appli
    $this->getRequest()->getBasePath();
    $this->getRequest()->getBaseUrl();

    // voir tous les paramètres enregistrés :
    var_dump($this->container->parameters);

