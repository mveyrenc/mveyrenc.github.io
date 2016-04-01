##
TP
##

****************************
Description de l'application
****************************

Le blog que nous allons créer est très simple. En voici les grandes lignes :

* Nous aurons des posts auxquels nous attacherons des tags.
* Nous pourrons lire, écrire, éditer et rechercher des posts.
* Nous pourrons créer, modifier et supprimer des tags.
* Nous pourrons également commenter les posts.
* Nous n'aurons pas de système de gestion des utilisateurs : nous devrons choisir l'utilisateur lorsque nous rédigerons un post ou un commentaire.

Description des entités
=======================

L'entité ``User``
-----------------

+-----------+---------------+-------------------+-----------------------+
| Nom       | Type de champ | Taille du champ   | Validation            |
+===========+===============+===================+=======================+
| username  | string        | 30                | requis, unique        |
+-----------+---------------+-------------------+-----------------------+
| email     | string        | 100               | requis, unique        |
+-----------+---------------+-------------------+-----------------------+
| password  | string        | 100               | requis                |
+-----------+---------------+-------------------+-----------------------+
| posts     | Relation vers des ``Post``        |                       |
+-----------+-----------------------------------+-----------------------+
| comments  | Relation vers des ``Comment``     |                       |
+-----------+-----------------------------------+-----------------------+

La suppression d'un utilisateur entraîne la suppression de ses posts et de ses commentaires.

L'entité ``Post``
-----------------

+-----------+---------------+-------------------+-----------------------+
| Nom       | Type de champ | Taille du champ   | Validation            |
+===========+===============+===================+=======================+
| title     | string        | 255               | requis                |
+-----------+---------------+-------------------+-----------------------+
| date      | datetime      |                   | requis                |
+-----------+---------------+-------------------+-----------------------+
| body      | text          |                   | requis                |
+-----------+---------------+-------------------+-----------------------+
| author    | Relation vers une ``User``        | requis                |
+-----------+-----------------------------------+-----------------------+
| comments  | Relation vers des ``Comment``     |                       |
+-----------+-----------------------------------+-----------------------+
| tags      | Relation vers des ``Tag``         |                       |
+-----------+-----------------------------------+-----------------------+

La suppression d'un post entraîne la suppression des commentaire qui lui sont associés.

L'entité ``Tag``
----------------

+-----------+---------------+-------------------+-----------------------+
| Nom       | Type de champ | Taille du champ   | Validation            |
+===========+===============+===================+=======================+
| name      | string        | 30                | requis                |
+-----------+---------------+-------------------+-----------------------+
| posts     | Relation vers des ``Post``        |                       |
+-----------+-----------------------------------+-----------------------+

L'entité ``Comment``
--------------------

+-----------+---------------+-------------------+-----------------------+
| Nom       | Type de champ | Taille du champ   | Validation            |
+===========+===============+===================+=======================+
| date      | datetime      |                   | requis                |
+-----------+---------------+-------------------+-----------------------+
| comment   | text          |                   | requis                |
+-----------+---------------+-------------------+-----------------------+
| author    | Relation vers un ``User``         | requis                |
+-----------+-----------------------------------+-----------------------+
| post      | Relation vers un ``Post``         |                       |
+-----------+-----------------------------------+-----------------------+

Les interfaces
==============

Les posts
---------

Liste des posts
^^^^^^^^^^^^^^^

.. image:: /_static/images/tp/PostIndex.png
    :align: center

Cette page affiche la liste des posts sous forme d'un tableau, triés par date du plus récent au plus ancien.

Formulaire
^^^^^^^^^^

.. image:: /_static/images/tp/PostForm.png
    :align: center

Le formulaire permet de remplir le titre, la date, le corp et d'associer le post à un utilisateur et à des tags.

Affichage d'un post
^^^^^^^^^^^^^^^^^^^

.. image:: /_static/images/tp/PostShow.png
    :align: center

Cette page d'affiche les données du post : titre, auteur, date, corps et tags. Elle affiche aussi les commentaires laisser par les visiteurs et permet de laisser d'autres commentaires.

Les commentaires
----------------

Formulaire
^^^^^^^^^^

.. image:: /_static/images/tp/CommentForm.png
    :align: center

Les utilisateurs
----------------

Liste des utilisateurs
^^^^^^^^^^^^^^^^^^^^^^

.. image:: /_static/images/tp/UserIndex.png
    :align: center

Cette page affiche la liste des utilisateurs sous forme d'un tableau, triés par username.

Formulaire
^^^^^^^^^^

.. image:: /_static/images/tp/UserForm.png
    :align: center

Affichage d'un utilisateur
^^^^^^^^^^^^^^^^^^^^^^^^^^

.. image:: /_static/images/tp/UserShow.png
    :align: center

En dessous du username et de l'email, la page affiche la liste des posts créés par l'utilisateur.

Les tags
--------

Liste des tags
^^^^^^^^^^^^^^

.. image:: /_static/images/tp/TagIndex.png
    :align: center

Cette page affiche la liste des tags ordonnés par nom avec le nombre de posts associés.

Formulaire
^^^^^^^^^^

.. image:: /_static/images/tp/TagForm.png
    :align: center

Affichage d'un tag
^^^^^^^^^^^^^^^^^^

.. image:: /_static/images/tp/TagShow.png
    :align: center

La page affiche la liste des posts associés au tag.

*******************
Travail à effectuer
*******************

#. Créez le bundle EpsiBlogBundle (chapitre *Création d’un bundle*)

#. Créez les entités Post, User, Comment et Tag

#. Ajoutez les relations entre les entités

#. Créez les interfaces pour gérer chacune des entités avec la commande ``php app/console generate:doctrine:crud``
    
    Pour avoir le l'aide sur comment utiliser cette commande :

    .. code-block:: console

        php app/console help generate:doctrine:crud

    Lorsque vous allez la lancer elle va vous demander si vous souhaitez créer les actions d'écriture (``new``, ``update`` et ``delete``), répondez ``yes``.

    Elle vous demandera également le format de la configuration de vos routes (``yml``, ``xml``, ``php``, ou ``annotation``), répondez ``yml``.

#. Ajouter la route ``epsi_blog_homepage`` qui doit afficher la liste des posts du blog (chapitre *Le routing*)

#. Mettez en place le triple héritage de template (chapitres *Les vues avec Twig*)

    .. image:: /_static/images/tp/TemplateHeritage.png
        :align: center

    * en rouge : le template de l'application ``app/Resources/views/base.html.twig``
    * en bleu : le template du bundle ``src/Epsi/Bundle/BlogBundle/Resources/views/base.html.twig``
    * en vert : le template de la page

#. Ajputer jQuery et Bootstrap (chapitres *Les assets*)

#. Ajoutez un menu en haut de la page vers les listes les entités post, user et tag (chapitres *Les vues avec Twig*)

#. Commencez par l'entité Tag

    #. Supprimez les champs non nécessaire dans le formulaire
    #. Ajouter la validation sur le champ du formulaire
    #. Mettez en forme la liste des tags
    #. Mettez en forme la page d'affichage d'un tag

#. Continuez avec les entités user et posts

#. Ajouter le formulaire ajout de commentaires grâce à une inclusion de contrôleur

#. Continuez l'intégration des commentaires 

    #. Supprimez les champs non nécessaire dans le formulaire
    #. Ajouter la validation sur le champ du formulaire
    #. Après la validation du formulaire, redirigez l'utilisateur vers le post sur lequel on a ajouté le commentaire
    #. Mettez en forme la liste des commentaires

A rendre

    * une archive avec vos développements Symfony + un dump de votre base de données

        .. code-block:: console

            $ cd /var/www/html/
            $ mysqldump -usymfony -p symfony > symfony.sql
            $ tar -cf symfony.tar Symfony/app/config/ Symfony/app/Resources/  Symfony/src/Epsi/ Symfony/composer.* symfony.sql

    * par mail à l'adresse madeline@veyrenc.fr
    * le 31/03/2015 dernier délais