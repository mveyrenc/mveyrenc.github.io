##
TP
##

#. Créez le bundle EpsiBlogBundle (chapitre *Création d’un bundle*)
#. Créez les entités Post, User, Comment, Tag et Image avec leurs relations (chapitre *Doctrine et la base de donnée*)
    
    * un post a un auteur de type user
    * un user est l'auteur de zéro ou plusieurs posts
    * un post peut avoir zéro ou plusieurs commentaires
    * un commentaire est lié à un post
    * un commentaire a un auteur
    * un utilisateur peut être l'auteur de zéro ou plusieurs commentaires
    * un post a un ou plusieurs tags

#. Créez les interfaces pour gérer chacune des entités avec la commande ``php app/console generate:doctrine:crud``
    
    Pour avoir le l'aide sur comment utiliser cette commande :

    .. code-block:: bash

        php app/console help generate:doctrine:crud

    Lorsque vous allez la lancer elle va vous demander si vous souhaitez créer les actions d'écriture (``new``, ``update`` et ``delete``), répondez ``yes``.

    Elle vous demandera également le format de la configuration de vos routes (``yml``, ``xml``, ``php``, ou ``annotation``), répondez ``yml``.

#. Ajouter la route ``epsi_blog_homepage`` qui doit afficher la liste des posts du blog (chapitre *Le routing*)
#. Reprenez dans le cours les templates ``base.html.twig`` de l'application et du bundle, ceux qui contiennent les assets (chapitres *Les vues avec Twig* et *Les assets*)
#. Modifiez le template d'affichage de la liste des posts pour mettre les différents éléments dans les blocks des templates de base. Pensez à modifier l'héritage  (chapitres *Les vues avec Twig*)
#. Ajoutez un menu en haut de la page vers les listes des différentes entités (chapitres *Les vues avec Twig*)
#. Commencez par l'entité Tag

    #. Supprimez le champ ``post`` dans le formulaire d'ajout
    #. Ajouter la validation sur le champ du formulaire, le nom est requis
    #. Après la validation du formulaire, modifiez la redirection pour allez sur la liste des tags
    #. Mettez en forme la liste des tags 

#. Continuez avec les autres entités