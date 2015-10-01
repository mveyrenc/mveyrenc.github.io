.. revealjs::

    .. revealjs:: Les bundles
        :title-heading: h1

    .. revealjs:: Nommage du namespace des bundles
        :class: text-left

        ``Vendor\Bundle\Categories\BundleNameBundle``

        Vendor
            Auteur du bundle
        Bundle
            Le namespace Bundle (optionnel mais conseillé)
        Categories
            Un ou plusieurs namespaces de catégorisation (optionnel)
        BundleNameBundle
            Le nom du bundle en lui même qui doit décrire la fonction implémentée par le bundle en un ou deux mots suivit de Bundle

    .. revealjs:: Nommage du namespace des bundles
        :class: text-left

        Exemple
        
        * ``Epsi\Bundle\BlogBundle``
        * ``Epsi\Bundle\Social\BlogBundle``

    .. revealjs:: Création d'un bundle
        :class: text-left

        Exécutez la commande suivante 

        .. code-block:: console

            php app/console generate:bundle

        Bundle namespace
            Epsi/Bundle/BlogBundle
        Bundle name
            Gardez la valeur par défaut EpsiBlogBundle
        Target directory 
            Gardez la valeur par défaut /var/www/symfony/src
        Configuration format (yml, xml, php, or annotation)
            Choisissez annotation

    .. revealjs:: Création d'un bundle
        :class: text-left

        Do you want to generate the whole directory structure [no]
            Répondez yes
        Do you confirm generation [yes]
            Répondez yes
        Confirm automatic update of your Kernel [yes]
            Répondez yes
        Confirm automatic update of the Routing [yes]
            Répondez yes

    .. revealjs:: Structure d'un bundle
        :class: text-left

        .. code-block:: console

            src/Epsi/Bundle/BlogBundle/
            ├── Controller
            │   └── DefaultController.php
            ├── DependencyInjection
            │   ├── Configuration.php
            │   └── EpsiBlogExtension.php
            ├── Entity
            │   ├── User.php
            │   └── UserRepository.php
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