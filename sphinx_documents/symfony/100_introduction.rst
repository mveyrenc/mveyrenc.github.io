----------------------
Introduction à Symfony
----------------------
    
Symfony est un framework MVC libre écrit en PHP 5. Symfony 2.x requiert une version de PHP supérieure ou égale à 5.3.3.

L'architecture du framework
===========================

Modèles, vues & controleurs
***************************

Lidée de l'achitecture dite MVC, est d'organiser le code en séparant les données, la présentation et les traiments.
Cette séparation rends les applications, même complexes, plus facile à maintenir et à faire évoluer.
 
Elle se sépare donc en trois couches :

* Le **modèle** est responsable des données et de tous les traitements faits sur les données.
  Rien d'autre dans l'application ne doit manipuler les données afin de garantir leur intégrité.
  
* La **vue** est chargée de générer les interfaces utilisateurs, généralement basées sur les données.
  Elle peut présenter les données sous plusieurs formes : HTML, json, XML, etc.
  
* Le **controleur** est le chef d'orchestre de l'application.
  Il reçois des événements depuis le monde extérieur, intéragit avec le modèle et affiche la vue appropriée.
  
(image MVC)
