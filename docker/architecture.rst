############
Architecture
############

*****************************
Organisation type d'un projet
*****************************

.. code-block:: console

    .
    ├── docker                  # Tout ce qui est lié à docker
    │   ├── core                # Submodule owsi-docker
    │   │   ├── docker          # Images génériques
    │   │   ├── make            # Makefiles commune à tous les projets
    │   │   └── README.md       # Documentation du core
    │   ├── images              # Images spécifiques au projet
    │   │   ├── mailcatcher
    │   │   ├── pgsql
    │   │   └── symfony
    │   └── volumes             # Volumes montés dans les containers
    │       ├── conf.d
    │       ├── data.d
    │       ├── log.d
    │       └── script.d
    ├── docker-compose.yml      # Configuration des containers du projet
    ├── logo.jpg                # Logo du client (pour gitlab)
    ├── Makefile                # Makefile du projet
    ├── README.md               # Doc rapide du projet
    └── src                     # Sources du projet
        ├── docs                # Documentation du projet (submodule)
        └── symfony             # Code source de l'application