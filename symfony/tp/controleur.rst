.. _controleur:

###############
Les contrôleurs
###############

Comme vu précédemment, le contrôleur est le chef d'orchestre de votre application, il va utiliser les autres composants (services, modèles, vues) afin de construire la page demandée par l'internaute.

Peu importe ce que vous souhaitez faire, un contrôleur reçoit toujours un objet ``Request`` et doit toujours retourner un objet ``Response``.
La demande de l'internaute se trouve dans un objet ``Request`` dans lequel le contrôleur toute les informations contenues dans la requête HTTP. La ``Response`` quant à elle correspond à la réponse HTTP.

.. toctree::
    :maxdepth: 2
    :glob:
    :hidden:

    controleur/*