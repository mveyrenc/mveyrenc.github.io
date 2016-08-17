Theming
=======

Fonctions de base
*****************

- ``drupal_get_path()`` : pour récupérer chaque chemin de fichier css/js
- ``drupal_add_css()`` : groupe CSS_DEFAULT / CSS_THEME

Hooks
*****

- ``hook_block_view()`` : Drupal sapprête à afficherun bloc - https://api.drupal.org/hook_block_view
- ``hook_user_login()`` : Quand l'utilisateur s'authentifie - https://api.drupal.org/hook_user_login
- ``hook_form_alter()`` : Avant qu'un formulaire soit affiché - https://api.drupal.org/hook_form_alter
- ``hook_block_info()`` : Déclaration de nouveaux blocks - https://api.drupal.org/hook_block_info
- ``hook_node_validate()`` : https://api.drupal.org/hook_node_validate
- ``hook_node_insert()`` : https://api.drupal.org/hook_node_insert
- ``hook_node_update()`` : https://api.drupal.org/hook_node_update
- ``hook_node_detete()`` : https://api.drupal.org/hook_node_detete
- ``hook_menu()`` : https://api.drupal.org/hook_menu

Infos
*****

- Si plusieurs hook *titi_block_view*/*toto_block_view* sont appelés, l'ordre d'appel est par ordre alphabétique. Si on veut contourner, on change le poids du module dans la table système.
- ``drupal_set_title()`` : Mettre à jour dynamiquement le h1
- ``drupal_add_http_header()`` : si on veut faire un flux RSS par ex
- ``hook_menu()`` : ``MENU_CONTEXT_INLINE`` pour afficher dans le menu contextuel en mode debug (engrenage) et ``MENU_CONTEXT_PAGE`` pour afficher dans le menu (par défaut)
- ``check_plain`` : protéger les chaines

Fonction t()
************

Type de jetons pour la fonction ``t('Welcome @username', array('@username' => $account->name))`` :
- ``!`` - interprète (on est sûr que la donnée ne contient pas d'injection particulière)
- ``%`` - échappe et ajoute la balise <em>
- ``@`` - échappe (dans tous les cas si on n'est pas sûr)

Users
*****

- User courant : ``$GLOBALS['user']`` ou ``get_current_user()``
- ``user_load()``, ``user_save()``, ``hook_user_view()``, ...
