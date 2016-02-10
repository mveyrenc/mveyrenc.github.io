.. _creation-bundle:

##################
Création du bundle
##################

Bien que tous les répertoires et les fichiers d'un bundle peuvent être créés manuellement, nous allons utilisé la console Symfony pour générer le bundle et l'activer.

*************************
Utilisation de la console
*************************

La console permet de lancer des actions en ligne de commande pour aider au développement, lancer des tâches planifiées (cron), etc.

Pour lancer la console, il faut exécuter le script ``app/console`` suivit d'arguments pour lancer les différentes commandes. Pour avoir la liste des commandes disponible, il suffit de lancer le script ``app/console`` sans arguments :

.. code-block:: console
    
    $ php app/console

*********************************
Création du bundle EpsiBlogBundle
*********************************

#. Exécutez la commande suivante :

    .. code-block:: console

        $ php app/console generate:bundle

#. La namespace du bundle

    .. code-block:: console

          Welcome to the Symfony2 bundle generator

        Your application code must be written in bundles. This command helps
        you generate them easily.

        Each bundle is hosted under a namespace (like Acme/Bundle/BlogBundle).
        The namespace should begin with a "vendor" name like your company name, your
        project name, or your client name, followed by one or more optional category
        sub-namespaces, and it should end with the bundle name itself
        (which must have Bundle as a suffix).

        See http://symfony.com/doc/current/cookbook/bundles/best_practices.html#index-1 for more
        details on bundle naming conventions.

        Use / instead of \  for the namespace delimiter to avoid any problem.

        Bundle namespace:

    Vous pouvez nommer votre namespace comme bon vous semble, du moment qu'il se termine par ``Bundle``. Mais convention, le namespace d'un bundle pour être former ainsi :

    * Un namespace racine, il s'agit du vendor : l'auteur, une société, un projet, un client, etc.
    * Le namespace optionnel ``Bundle``
    * Un ou plusieurs namespaces de catégorisation (optionnel)
    * Le nom du bundle en lui même qui doit décrire la fonction implémentée par le bundle en un ou deux mots suivit de ``Bundle``

    Ce qui nous donne par exemple : ``Epsi\Bundle\BlogBundle``, ``Epsi\Bundle\Social\BlogBundle`` ou ``Epsi\BlogBundle``.

    **Nous allons appelé notre bundle** ``Epsi\Bundle\BlogBundle``.

#. Le nom du bundle

    .. code-block:: console

        In your code, a bundle is often referenced by its name. It can be the
        concatenation of all namespace parts but it's really up to you to come
        up with a unique name (a good practice is to start with the vendor name).
        Based on the namespace, we suggest EpsiBlogBundle.

        Bundle name [EpsiBlogBundle]:

    Symfony génère automatiquement un nom à partir du namespace du bundle en respectant les conventions de nommage. Il faut juste vérifier qu'il soit unique.

#. L'emplacement du bundle

    .. code-block:: console

        The bundle can be generated anywhere. The suggested default directory uses
        the standard conventions.

        Target directory [~/symfony/src]:

    Par défaut Symfony le place dans le répertoire ``/src``. On laisse la valeur par défaut.

#. Le format de la configuration

    .. code-block:: console

        Determine the format to use for the generated configuration.

        Configuration format (yml, xml, php, or annotation):

    Symfony propose plusieurs format pour la configuration : YAML, XML, PHP ou Annotations. Ce choix n'a pas d'impact sur les performances, et chaque format a ses avantages et ses inconvénients. Il s'agit juste de choisir le format avec lequel vous êtes le plus alèse.

    Dans notre cas, nous allons choisir le ``annotation``.

#. La structure générer

    .. code-block:: console

        To help you get started faster, the command can generate some
        code snippets for you.

        Do you want to generate the whole directory structure [no]?

    Ici, Symfony vous demande si vous voulez juste le minimum vital ou une structure plus complète, quitte à supprimer des répertoires à posteriori s'ils ne sont pas utilisés.

    Répondez ``yes``.

#. Répondez ``yes`` à toutes les autres questions et votre bundle sera généré et installé

    .. code-block:: console

          Summary before generation

        You are going to generate a "Epsi\Bundle\BlogBundle\EpsiBlogBundle" bundle
        in "~/symfony/src/" using the "annotation" format.

        Do you confirm generation [yes]?

          Bundle generation

        Generating the bundle code: OK
        Checking that the bundle is autoloaded: OK
        Confirm automatic update of your Kernel [yes]?
        Enabling the bundle inside the Kernel: OK
        Confirm automatic update of the Routing [yes]?
        Importing the bundle routing resource: OK

          You can now start using the generated code!

********************
Que s'est-il passé ?
********************

#. Symfony a généré la structure du bundle

    .. code-block:: console

        src/Epsi
        └── Bundle
            └── BlogBundle
                ├── Controller
                │   └── DefaultController.php
                ├── DependencyInjection
                │   ├── Configuration.php
                │   └── EpsiBlogExtension.php
                ├── EpsiBlogBundle.php
                ├── Resources
                │   ├── config
                │   │   └── services.xml
                │   ├── doc
                │   │   └── index.rst
                │   ├── public
                │   │   ├── css
                │   │   ├── images
                │   │   └── js
                │   ├── translations
                │   │   └── messages.fr.xlf
                │   └── views
                │       └── Default
                │           └── index.html.twig
                └── Tests
                    └── Controller
                        └── DefaultControllerTest.php

#. Symfony enregistre notre bundle dans le Kernel (``app/AppKernel.php``)

    .. code-block:: php

        class AppKernel extends Kernel
        {
            public function registerBundles()
            {
                $bundles = array(
                    ...
                    new Epsi\Bundle\BlogBundle\EpsiBlogBundle(),
                    ...
                return $bundles;
            }
            ...
        }

#. Symfony ajoute les routes de notre bundle dans le Routeur (``app/config/routing.yml``)

    .. code-block:: yaml

        epsi_blog:
            resource: "@EpsiBlogBundle/Controller/"
            type:     annotation
            prefix:   /

Pour tester que votre bundle fonctionne correctement, allez sur la page http://symfony.loc.epsi.fr/hello/World.



