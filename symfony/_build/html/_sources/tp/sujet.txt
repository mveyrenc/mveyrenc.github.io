###########
Sujet du TP
###########

Le blog que nous allons créer est très simple. En voici les grandes lignes :

* Nous aurons des posts écrits par des auteurs, auxquels nous attacherons des tags.
* Les tags pourront être attachés à plusieurs posts.
* Les auteurs peuvent écrire plusieurs posts.
* Nous pourrons lire, écrire, éditer et rechercher des posts.
* Nous pourrons créer, modifier et supprimer des tags.
* Nous pourrons également commenter les posts.
* Nous n'aurons pas de système de gestion des utilisateurs : nous devrons choisir l'utilisateur lorsque nous rédigerons un post ou un commentaire.


.. container:: wy-text-center

    .. scruffy::

        [User|username:string(30);email:string(100);password:string(100)]
        [Post|title:string(100);date:datetime;body:text]
        [Tag|name:string(30)]
        [Comment|date:datetime;comment:text]

        [User]1-0..*>[Post]
        [Tag]0..*-0..*>[Post]
        [Comment]1-0..*>[Post]
        [User]1-0..*>[Comment]