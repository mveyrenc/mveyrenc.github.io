######################
Autres entités du blog
######################

Créez les autres entités nécessaires à la réalisation du blog :

****
User
****

.. container:: wy-text-center

    .. scruffy::

        [User|username:string(30);email:string(100);password:string(100)]

***
Tag
***

.. container:: wy-text-center

    .. scruffy::

        [Tag|name:string(30)]

*******
Comment
*******

.. container:: wy-text-center

    .. scruffy::

        [Comment|date:datetime;comment:text]
