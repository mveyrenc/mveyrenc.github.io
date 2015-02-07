#######################
Architecture de Symfony
#######################

*********************************
L'architecture des frameworks MVC
*********************************

L'idée de l'achitecture dite MVC, est d'organiser le code en séparant les données, leurs présentations et leurs traitements.
Cette séparation rends les applications, même complexes, plus facile à maintenir et à faire évoluer.
 
Elle se sépare donc en trois couches :

* Le **modèle** est responsable des données et de tous les traitements faits sur les données.
  Rien d'autre dans l'application ne doit manipuler les données afin de garantir leur intégrité.
  
* La **vue** est chargée de générer les interfaces utilisateurs, généralement basées sur les données.
  Elle peut présenter les données sous plusieurs formes : HTML, json, XML, etc.
  
* Le **contrôleur** est le chef d'orchestre de l'application.
  Il reçoit des événements depuis le monde extérieur, intéragit avec le modèle et affiche la vue appropriée.
  
.. image:: _static/images/MVC.png