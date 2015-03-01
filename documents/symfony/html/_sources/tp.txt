##
TP
##

#. Créez le bundle EpsiBlogBundle
#. Créez les entités Post, User, Comment et Tag avec leur relation
#. Créez les interfaces pour gérer chacune des entités avec la commande ``php app/console generate:doctrine:crud``
#. Ajouter la route ``epsi_blog_homepage`` qui doit afficher la liste des posts du blog
#. Reprenez dans le cours les templates ``base.html.twig`` de l'application et du bundle, ceux qui contiennent les assets
#. Modifiez le template d'affichage de la liste des posts pour mettre les différents éléments dans les blocks des templates de base. Pensez à modifier l'héritage.
#. Ajoutez un menu en haut de la page vers les listes des différentes entités
#. Commencez par l'entité Tag
    #. Supprimez le champ ``post`` dans le formulaire d'ajout
    #. Après la validation du formulaire, modifiez la redirection pour allez sur la liste des tags
    #. Mettez en forme la liste des tags 