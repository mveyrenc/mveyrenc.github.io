############
Aide mémoire
############

**********************
Le console et Doctrine
**********************

Manipuler la base de données
============================

* ``doctrine:database:create`` : crée la base de données configurée
* ``doctrine:database:drop`` : supprime la base de données configurée

Manipuler le schéma de la base
==============================

* ``doctrine:schema:create`` : exécute ou affiche les requêtes SQL nécessaire pour créer le schéma de la base
* ``doctrine:schema:drop`` : exécute ou affiche les requêtes SQL nécessaire pour supprimer le schéma de la base
* ``doctrine:schema:update`` : exécute ou affiche les requêtes SQL nécessaire pour mettre à jour le schéma de la base
* ``doctrine:schema:validate`` : vérifie les entités Doctrine et si le schéma de la base de données est à jour

Génération de code
==================

* ``doctrine:generate:entities`` : complète les entité en fonction des annotation présente dans les entités
* ``doctrine:generate:entity`` : génère une nouvelle entité Doctrine
* ``doctrine:generate:form`` : génère la classe de formulaire associée à une entité
* ``doctrine:generate:crud`` : génère le contrôleur, les templates et le formulaire pour gérer une entité
