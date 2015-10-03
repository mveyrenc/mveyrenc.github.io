##
TP
##

Le blog que nous allons créer est très simple. En voici les grandes lignes :

* Nous aurons des posts auxquels nous attacherons des tags.
* Nous pourrons lire, écrire, éditer et rechercher des posts.
* Nous pourrons créer, modifier et supprimer des tags.
* Nous pourrons également commenter les posts.
* Nous n'aurons pas de système de gestion des utilisateurs : nous devrons choisir l'utilisateur lorsque nous rédigerons un post ou un commentaire.

#. Installez Symfony en suivant la procédure suivante : :ref:`installation`

#. Créez le bundle EpsiBlogBundle (chapitre *Création d’un bundle*) avec la commande ``php app/console generate:bundle`` et en vous aidant du chapitre :ref:`creation-bundle`

#. Créez les entités suivantes avec la commande ``php app/console doctrine:generate:entity`` et en vous aidant du chapitre :ref:`doctrine-creation-entite`

    * Entité ``User``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Type de champ | Taille du champ   | Validation            |
        +===========+===============+===================+=======================+
        | username  | string        | 30                | requis, unique        |
        +-----------+---------------+-------------------+-----------------------+
        | email     | string        | 100               | requis, unique        |
        +-----------+---------------+-------------------+-----------------------+
        | password  | string        | 100               | requis                |
        +-----------+---------------+-------------------+-----------------------+


    * Entité ``Post``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Type de champ | Taille du champ   | Validation            |
        +===========+===============+===================+=======================+
        | title     | string        | 255               | requis                |
        +-----------+---------------+-------------------+-----------------------+
        | date      | datetime      |                   | requis                |
        +-----------+---------------+-------------------+-----------------------+
        | body      | text          |                   | requis                |
        +-----------+---------------+-------------------+-----------------------+

        La suppression d'un post entraîne la suppression des commentaire qui lui sont associés.

    * Entité ``Tag``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Type de champ | Taille du champ   | Validation            |
        +===========+===============+===================+=======================+
        | name      | string        | 30                | requis                |
        +-----------+---------------+-------------------+-----------------------+

    * Entité ``Comment``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Type de champ | Taille du champ   | Validation            |
        +===========+===============+===================+=======================+
        | date      | datetime      |                   | requis                |
        +-----------+---------------+-------------------+-----------------------+
        | comment   | text          |                   | requis                |
        +-----------+---------------+-------------------+-----------------------+

#. Ajoutez les relations entre les entités en modifiant les classes Entity générées précédemment en vous aidant du chapitre :ref:`doctrine-relations-entite`

    * Entité ``User``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Entité cible  | Cardinalité       | Validation            |
        +===========+===============+===================+=======================+
        | posts     | ``Post``      |  0..n             |                       |
        +-----------+---------------+-------------------+-----------------------+
        | comments  | ``Comment``   |  0..n             |                       |
        +-----------+---------------+-------------------+-----------------------+

    * Entité ``Post``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Type de champ | Taille du champ   | Validation            |
        +===========+===============+===================+=======================+
        | author    | ``User``      |  1                | requis                |
        +-----------+---------------+-------------------+-----------------------+
        | comments  | ``Comment``   |  0..n             |                       |
        +-----------+---------------+-------------------+-----------------------+
        | tags      | ``Tag``       |  0..n             |                       |
        +-----------+---------------+-------------------+-----------------------+

        La suppression d'un post entraîne la suppression des commentaires qui lui sont associés.

    * Entité ``Tag``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Type de champ | Taille du champ   | Validation            |
        +===========+===============+===================+=======================+
        | posts     | ``Post``      |  0..n             |                       |
        +-----------+---------------+-------------------+-----------------------+

    * Entité ``Comment``

        +-----------+---------------+-------------------+-----------------------+
        | Nom       | Type de champ | Taille du champ   | Validation            |
        +===========+===============+===================+=======================+
        | author    | ``User``      | 1                 | requis                |
        +-----------+---------------+-------------------+-----------------------+
        | post      | ``Post``      | 1                 | requis                |
        +-----------+---------------+-------------------+-----------------------+

#. Générez les méthodes ``get`` et ``set`` manquantes dans vos entités en exécutant la commande ``php app/console doctrine:generate:entities EpsiBlogBundle``

#. Créez le schéma dans votre base de données en exécutant la commande ``php app/console doctrine:schema:update --dump-sql --force``

#. Créez les interfaces pour gérer chacune des entités avec la commande ``php app/console generate:doctrine:crud``
    
    Pour avoir le l'aide sur comment utiliser cette commande :

    .. code-block:: console

        php app/console help generate:doctrine:crud

    Lorsque l'exécuter,  elle va vous demander si vous souhaitez créer les actions d'écriture (``new``, ``update`` et ``delete``). Répondez ``yes``.

    Elle vous demandera également le format de la configuration de vos routes (``yml``, ``xml``, ``php``, ou ``annotation``). Répondez ``annotation``.

#. Mettez en place le triple héritage de template en vous aidant du chapitre :ref:`twig`

    .. image:: _static/images/tp/TemplateHeritage.png
        :align: center

    * en rouge : le template de l'application ``app/Resources/views/base.html.twig``
    * en bleu : le template du bundle ``src/Epsi/Bundle/BlogBundle/Resources/views/base.html.twig``
    * en vert : le template de la page

#. Ajouter jQuery et Bootstrap en vous aidant du chapitre :ref:`assets`

#. Ajoutez un menu en haut de la page vers les listes les entités post, user et tag  en vous aidant du chapitre :ref:`twig`

#. Mettez en place les interfaces telles que ci-dessous en vous aidant des chapitres :ref:`twig` et :ref:`formulaire`

    * Les tags

        * Supprimez les champs non nécessaire dans le formulaire
        * Ajouter la validation sur le champ du formulaire
        * Mettez en forme le formulaire

            .. image:: _static/images/tp/TagForm.png
                :align: center

        * Mettez en forme la liste des tags

            .. image:: _static/images/tp/TagIndex.png
                :align: center

            Cette page affiche la liste des tags ordonnés par nom avec le nombre de posts associés.

        * Mettez en forme la page d'affichage d'un tag

            .. image:: _static/images/tp/TagShow.png
                :align: center

            La page affiche la liste des posts associés au tag.

    * Les utilisateurs

        * Supprimez les champs non nécessaire dans le formulaire
        * Ajouter la validation sur le champ du formulaire
        * Mettez en forme le formulaire

            .. image:: _static/images/tp/UserForm.png
                :align: center

        * Mettez en forme la liste des utilisateurs

            .. image:: _static/images/tp/UserIndex.png
                :align: center

            Cette page affiche la liste des utilisateurs ordonnés par nom avec le nombre de posts qu'ils ont écrit.

        * Mettez en forme la page d'affichage d'un utilisateur

            .. image:: _static/images/tp/UserShow.png
                :align: center

            La page affiche la liste des posts écrit par l'utilisateur.

    * Les posts

        * Supprimez les champs non nécessaire dans le formulaire
        * Ajouter la validation sur le champ du formulaire
        * Mettez en forme le formulaire

            .. image:: _static/images/tp/PostForm.png
                :align: center

        * Mettez en forme la liste des posts

            .. image:: _static/images/tp/PostIndex.png
                :align: center

            Cette page affiche la liste des posts ordonnés par date, du plus ancien au plus récent.

        * Mettez en forme la page d'affichage d'un post

            .. image:: _static/images/tp/PostShow.png
                :align: center

#. Ajouter le formulaire ajout de commentaires grâce à une inclusion de contrôleur

    .. image:: _static/images/tp/PostShowWithComment.png
        :align: center

********
A rendre
********

    * une archive avec vos développements :program:`Symfony` et un dump de votre base de données

        .. code-block:: bash

            cd /var/www/symfony/
            mysqldump -usymfony -p symfony > symfony.sql
            tar -cf symfony.tar app/config/ app/Resources/ src/Epsi/ composer.* symfony.sql

    * par mail à l'adresse madeline@veyrenc.fr
    * le 01/11/2015 dernier délais