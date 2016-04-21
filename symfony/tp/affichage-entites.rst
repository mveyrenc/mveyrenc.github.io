#####################
Affichage des entités
#####################

Après avoir enregistrer des tags dans notre base de données, nous souhaitons les afficher.

Pour recupérer des données dans la base de données, nous utilisons un EntityRepository. Chaque entité a son propre repository, on a le TagRepository pour les tags, le PostRepository pour les posts, etc.

Dans le controlleur, il faut passer par l'EntityManager pour pouvoir appeler l'EntityRepository :

.. code-block:: php

    $entityManager = $this->getDoctrine()->getManager();
    $entityRepository = $entityManager->getRepository('EpsiBlogBundle:Tag');

Ensuite, on peut appeler les méthodes du repository pour récupérer nos données. Par défaut, les repositories implémentent certaines méthodes qui permettent de :

* récupérer une entité à partir de son ID

    .. code-block:: php

        $entityRepository->find($id);

* récupérer tous les entités

    .. code-block:: php

        $entityRepository->findAll();

* récupérer les entités en fonction de critères

    .. code-block:: php

        $entityRepository->findBy(array $criteres, array $orderBy = null, $limit = null, $offset = null);

* récupérer une entité en fonction de critères

    .. code-block:: php

        $entityRepository->findOneBy(array $criteres);

On a aussi à disposition des méthodes magiques qui permettent rapidement de récupérer une ou plusieurs entités en fonction d'un critère :

* ``findByX($valeur)``
* ``findOneByX($valeur)``

X doit être remplacé par le nom d'une propriété, Par exemple ``findByTitre()``, ``findOneByTitre()``, ``findByDate()``, ``findOneByDate()``.

Pour toute autre requête, il faut ajouter une méthode dans le repository et construite la requête manuellement en DQL, Doctrine Query Language.

Mais nous allons nous contenter des méthodes déjà implémentées pour le moment.

.. toctree::
    :maxdepth: 2
    :glob:
    :hidden:

    affichage-entites/affichage-une-entite
    affichage-entites/affichage-plusieurs-entites
    affichage-entites/twig
    affichage-entites/*