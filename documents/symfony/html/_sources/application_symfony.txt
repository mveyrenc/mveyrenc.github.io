####################
Création d'un bundle
####################

Bien que tous les répertoires et les fichiers d'un bundle peuvent être créés manuellement, nous allons utilisé la console Symfony pour générer le bundle et l'activer.

*************************
Utilisation de la console
*************************

La console permet de lancer des actions en ligne de commande pour aider au développement, lancer des tâches planifiées (cron), etc.

Pour lancer la console, il faut exécuter le script ``app/console`` suivit d'arguments pour lancer les différentes commandes. Pour avoir la liste des commandes disponible, il suffit de lanncer le script ``app/console`` sans arguments :

.. literalinclude:: code-block/application_symfony/creation-bundle.txt
    :language: bash
    :lines: 1

******************
Création du bundle
******************

#. Exécutez la commande suivante :

    .. literalinclude:: code-block/application_symfony/creation-bundle.txt
        :language: bash
        :lines: 2

#. La namespace du bundle

    Vous pouvez nommer votre namespace comme bon vous semble, du moment qu'il se termine par ``Bundle``. Mais convention, le namespace d'un bundle pour être former ainsi :
    * Un namespace racine, il s'agit du vendor : l'auteur, une société, un projet, un client, etc.
    * Le namespace optionnel ``Bundle``
    * Un ou plusieurs namespaces de catégorisation (optionnel)
    * Le nom du bundle en lui même qui doit décrire la fonction implémentée par le bundle en un ou deux mots suit de ``Bundle``

    Ce qui nous donne par exemple : ``Epsi\Bundle\BlogBundle``, ``Epsi\Bundle\Social\BlogBundle`` ou ``Epsi\BlogBundle``.

    Nous allons appelé notre bundle ``Epsi\Bundle\BlogBundle``.

#. Le nom du bundle

    Symfony génère automatiquement un nom à partir du namespace du bundle en respectant les conventions de nommage. Il faut juste vérifier qu'il soit unique.

#. L'emplacement du bundle

    Par défaut Symfony le place dans le répertoire ``/src``. On laisse la valeur par défaut.

#. Le format de la configuration

    Symfony propose plusieurs format pour la configuration : YAML, XML, PHP ou Annotations. Ce choix n'a pas d'impact sur les performances, et chaque format a ses avantages et ses inconvénients. Il s'agit juste de choisir le format avec lequel vous êtes le plus alèse.

    Dans notre cas, nous allons choisir le ``yml``.

#. La structure générer

    Ici, Symfony vous demande si vous voulez juste le minimum vital ou une structure plus complète, quitte à supprimer des répertoires à posteriori s'ils ne sont pas utilisés.

    Répondez ``yes``.

#. Confirmer et c'est parti

    Répondez ``yes`` à toutes les autres questions et votre bundle sera généré et installé : http://localhost/Symfony/web/app_dev.php/hello/World

********************
Que s'est-il passé ?
********************

#. Symfony a généré la structure du bundle

    Dans le répertoire généré par Symfony on trouve :
    
    * un contrôleur dans le répertoire ``Controller``
    * les classes permettant de la configuration du bundle dans le répertoire ``DependencyInjection``
    * les ressources dans le répertoire ``Resources``
        * les fichiers de configuration dans ``config``
        * la documentation dans ``doc``
        * les fichiers à destination du visiteur (CSS, Javascript, images) dans ``public``
        * les fichiers de traduction dans ``translations``
        * les templates Twig dans ``views``
    * les tests dans ``Tests``
    * enfin, le seul fichier obligatoire dans un bundle : la classe ``EpsiBlogBundle.php``

#. Symfony enregistre notre bundle dans le Kernel (``app/AppKernel.php``)

#. Symfony ajoute les routes de notre bundle dans le Routeur (``app/config/routing.yml``)

##################################
Objectif de notre bundle : un blog
##################################

Le blog que nous allons créer est très simple. En voici les grandes lignes :

* Nous aurons des articles auxquels nous attacherons des tags.
* Nous pourrons lire, écrire, éditer et rechercher des articles.
* Nous pourrons créer, modifier et supprimer des tags.
* Au début, nous n'aurons pas de système de gestion des utilisateurs : nous devrons saisir notre nom lorsque nous rédigerons un article. Puis nous rajouterons la couche utilisateur.
* Au début, il n'y aura pas de système de commentaires. Puis nous ajouterons cette couche commentaire.


