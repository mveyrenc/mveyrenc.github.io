######################
Création d'un document
######################

*********
Par copie
*********

Copiez le répertoire ``sphinx_demo_doc`` ou ``sphinx_demo_slides`` puis faites un rechercher/remplacer sur les éléments suivants :

* ``Demo doc Documentation`` => ex : ``Symfony Documentation``
* ``Demo doc`` => ex : ``Symfony``
* ``Demodoc`` => ex : ``Symfonydoc``

********************
En ligne de commande
********************

.. code-block:: bash

    sphinx-quickstart

Après avoir lancé le *quickstart*, éditez le fichier ``conf.py`` pour affecter le bon thème :

.. code-block:: python

    extensions = [
        # ...
        'sphinx_rtd_theme',
    ]
    # ...
    html_theme = 'sphinx_rtd_theme'
