.. _services:

############
Les services
############

Comme dit précédemment, un contrôleur ne fait qu'utiliser d'autres composants pour construire la réponse. Certains de ces composants sont des services, des scripts qui remplissent un rôle précis comme envoyer un mail, gérer les sessions de l'utilisateur, etc. Dans ce chapitre, vous n'allons pas voir comment créer un service, nous n'en sommes pas là, mais comment s'en servir et quels services :program:`Symfony` nous propose.

*******************
Déclarer un service
*******************

.. code-block:: yaml

    # Resources/config/services.yml

    parameters:
        epsi_blog.example.class: Epsi\Bundle\BlogBundle\Services\Example
        epsi_blog.example_bis.class: Epsi\Bundle\BlogBundle\Services\ExampleBis

    services:
        epsi_blog.example:
            class:        %epsi_blog.example.class%
        epsi_blog.example_bis:
            class:        %epsi_blog.example_bis.class%
            arguments:    ["@epsi_blog.example"]

******************
Accéder un service
******************

Il faut juste appeler la méthode du contrôleur ``get()`` en passant en argument l'identifiant su service que vous voulez comme par exemple : ``$this->get('mailer');``.
Ensuite il faut utiliser l'API que met à disposition le service.

*******************
Exemple de services
*******************

Templating
==========

La méthode ``render`` du contrôleur est un raccourcie pour appeler le service de templating. Ce code :

.. literalinclude:: code-block/services/controleur.php
    :language: php
    :lines: 1-3

Est équivalent à :

.. literalinclude:: code-block/services/controleur.php
    :language: php
    :lines: 5-9

Ce service comporte une autre méthode intéressante qui permet tester si un template existe ou pas : ``exists``.

Request
=======

Là aussi, dans le contrôleur, quand on appelle la méthode ``getRequest``, c'est un raccourcie qui appelle le service ``request``.

Session
=======

Le service ``session`` contient toute les méthodes nécessaire pour manipuler les sessions utilisateur : ``has``, ``get``, ``set``, ``remove``, etc.

*****************************************
Obtenir des informations sur les services
*****************************************

Une commande permet d'obtenir la liste des services disponibles avec la classe qui les implémente :

.. literalinclude:: code-block/services/commande.txt
    :lines: 1-9