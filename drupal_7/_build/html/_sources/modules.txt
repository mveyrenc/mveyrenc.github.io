Les modules
===========

Modules du core
***************

Voici un descriptif de quelques modules du core :

- ``aggregator`` : Gestion de flux RSS
- ``block`` : Fournit les outils pour créer des blocks dans des régions d'un thème
- ``color`` : Permet de customiser les couleurs des thèmes compatibles
- ``comment`` : Autorise les utilisateurs à commenter des contenus
- ``contact`` : Module de contact standard
- ``field`` / ``field_ui`` : API de manipulations de champs
- ``file`` : Field type Fichier
- ``image`` : Field type image + gestion des alias
- ``locale`` : Permet de traduire l'interface dans plusieurs langues
- ``list`` : Field type Liste
- ``number`` : Field type Nombre
- ``options`` : Field type Options (selection/checkbox/radio)
- ``poll`` : Gestion d'un sondage simple
- ``statistics`` : Enregistrement des statistiques de consultation dans Drupal
- ``taxonomy`` : Permet d'utiliser la taxonomie

Modules additionnels
********************

Voici une liste non exhaustive des modules additionnels utiles :

- ``admin_menu`` : Menu d'administration multi-niveaux plus pratique que le menu de base - https://www.drupal.org/project/admin_menu
- ``boost`` : Génère du page statique pour le trafic anonyme - https://www.drupal.org/project/boost
- ``captcha`` : Image captcha avec caractères à saisir - https://www.drupal.org/project/captcha
- ``ckeditor`` : Fournit un RTE paramétrable pour le contributeur - https://www.drupal.org/project/ckeditor
- ``coder`` : Fournit PHP_CodeSniffer - https://www.drupal.org/project/coder
- ``ctools`` : Fournit des outils utilisés par plusieurs modules facilitant le développement - https://www.drupal.org/project/ctools
- ``date`` : Field type Date - https://www.drupal.org/project/date
- ``devel`` : Fonctions/helpers de développement pour le debug - https://www.drupal.org/project/devel
- ``email`` : Field type Email - https://www.drupal.org/project/email
- ``entity`` : Fournit des fonctions pour manipuler les entités via le code (create / save / delete / view / access) - https://www.drupal.org/project/entity
- ``entitycache`` : Place les requêtes BDD des entités du core en cache
- ``features`` : Permet d'importer/exporter des entités, settings, et autres paramétrages entre plusieurs environnements - https://www.drupal.org/project/features
- ``field_permissions`` : Permissions sur des champs - https://www.drupal.org/project/field_permissions
- ``globalredirect`` : Fournit une liste de règles de redirection de base - https://www.drupal.org/project/globalredirect
- ``honeypot`` : Honeypot pour formulaires - https://www.drupal.org/project/honeypot
- ``imagecache_actions`` : Mise à disposition de filtres d'images supplémentaires - https://www.drupal.org/project/imagecache_actions
- ``imce`` : Téléchargement de medias dans un browser - https://www.drupal.org/project/imce
- ``l10n_client`` : Fournit un bouton en bas à droite qui permet de détecter les traductions sur la page courante - https://www.drupal.org/project/l10n_client. /!\ Version jQuery < 1.9 (support de $.browser)
- ``l10n_update`` : Permet de mettre à jour les traductions de tous les modules - https://www.drupal.org/project/l10n_update
- ``jquery_update`` : https://www.drupal.org/project/jquery_update
- ``link`` : Field type Lien - https://www.drupal.org/project/link
- ``linkit`` : Fournit un menu ajax lors de la saisie d'un node en relation - https://www.drupal.org/project/linkit
- ``maillog`` : Simule l'envoi d'un mail pour affichage dans le flux/BDD uniquement (mode dev sur données de prod) - https://www.drupal.org/project/maillog
- ``media`` : Management des media - https://www.drupal.org/project/media
- ``menu_block`` : Fournit des blocks menu de niveaux inférieurs - https://www.drupal.org/project/menu_block
- ``metatag`` : - https://www.drupal.org/project/metatag
- ``migrate`` : Import de données depuis Drupal 5/6/7, Wordpress ou autres - https://www.drupal.org/project/migrate
- ``module_filter`` : Améliore l'interface d'administration des modules - https://www.drupal.org/project/module_filter
- ``pathauto`` : Génère automatiquement des alias d'URL selon l'entité (+ règles paramétrables par type de contenu) - https://www.drupal.org/project/pathauto
- ``print`` : Génération d'une version imprimable web/pdf/epub/email - https://www.drupal.org/project/print
- ``redirect`` : Améliore la gestion des redirections - https://www.drupal.org/project/redirect
- ``rules`` : https://www.drupal.org/project/rules
- ``search_api`` : https://www.drupal.org/project/search_api
- ``security_review`` : Fournit une batterie de tests basiques de sécurité - https://www.drupal.org/project/security_review
- ``special_menu_items`` : Permet d'ajouter des entrées de menu sans lien ou séparateurs - https://www.drupal.org/project/special_menu_items
- ``strongarm`` : Permet d'importer/exporter des variables depuis des fichiers ou BDD (fonctionne avec features) - https://www.drupal.org/project/strongarm
- ``taxonomy_menu`` : Transforme l'arbo des termes en menu  - https://www.drupal.org/project/taxonomy_menu
- ``token`` : https://www.drupal.org/project/token
- ``transliteration`` : Transformation de chaines pour génération d'URL propres si caractères spéciaux (ou dans une langue spécifique) - https://www.drupal.org/project/transliteration
- ``xmlsitemap`` : https://www.drupal.org/project/xmlsitemap

Autres modules
**************

- ``webform`` : Création de formulaire au clic interface
- ``poll`` ou ``advanced_poll``
- ``migrate`` : API riche en objet avec la prise en compte de migration depuis Joomla / Wordpress ... - https://www.drupal.org/project/migrate
- ``feeds`` : https://www.drupal.org/project/feeds

Arbo d'un module
****************

- ``mymodule.info`` : Metadonnées du module : lister des fichiers PHP objet/interface dans files[], stylesheets[all] ou scripts[] chargé partout / Vider le cache de Drupal si on le modifie
- ``mymodule.module`` : Liste des hooks
- ``mymodule.install`` : Code d'install / désinstall / mise à jour nécessaire
- ``*.js`` : à référencer avec drupal_add_js()
- ``*.css`` : à référencer avec drupal_add_css()
- ``*.inc`` : Code PHP supplémentaires si besoin : à inclure avec require / module_load_include() ...