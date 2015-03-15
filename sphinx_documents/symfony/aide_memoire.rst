############
Aide mémoire
############

********************
Création d'un bundle
********************

.. code-block:: bash

    php app/console generate:bundle
    # puis répondre aux questions

*********************
Création d'une entité
*********************

.. code-block:: bash

    php app/console doctrine:generate:entity
    # puis répondre aux questions

*****************************************************
Déployer les fichiers statiques des bundles dans web/
*****************************************************

.. code-block:: bash

    php app/console assets:install web --symlink

****************************
Manipuler la base de données
****************************

.. code-block:: bash

    # créer la base de données
    php app/console doctrine:database:create

    # supprimer la base de données
    php app/console doctrine:database:drop

    # exécuter ou afficher les requêtes SQL nécessaire pour créer le schéma de la base
    php app/console doctrine:schema:create --dump-sql --force

    # exécuter ou afficher les requêtes SQL nécessaire pour supprimer le schéma de la base
    php app/console doctrine:schema:drop --dump-sql --force

    # exécuter ou afficher les requêtes SQL nécessaire pour mettre à jour le schéma de la base
    php app/console doctrine:schema:update --dump-sql --force

    # vérifier les entités Doctrine et si le schéma de la base de données est à jour
    php app/console doctrine:schema:validate

******************
Génération de code
******************

.. code-block:: bash

    # générer la classe de formulaire associée à une entité
    php app/console doctrine:generate:form EpsiBlogBundle:User

    # générer le contrôleur, les templates et le formulaire pour gérer une entité
    php app/console doctrine:generate:crud
    # puis répondre aux questions

    # compléter les entités en fonction des annotations présentes dans les entités
    php app/console doctrine:generate:entities EpsiBlogBundle[:User]

*****
Debug
*****

.. code-block:: bash

    # voir toutes les routes
    php app/console router:debug

    # effacer le cache
    php app/console cache:clear

    # voir la liste des services
    php app/console container:debug

********************
Depuis un contrôleur
********************

.. code-block:: php

    // récupérer l'objet request
    $request = $this->getRequest();

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
    $em = $this->getDoctrine()->getEntityManager();

    // récupérer un paramètre de l'application défini par exemple dans config.yml
    $param = $this->container->getParameter('my_parameter');

    // récupérer la locale courante :
    $this->get('session')->getLocale();

    // récupérer un service
    $service = $this->get("myService");

    // récupérer le "baseUrl (+ ou - complet)" de l'appli
    $this->getRequest()->getBasePath();
    $this->getRequest()->getBaseUrl();

    // voir tous les paramètres enregistrés :
    var_dump($this->container->parameters);

