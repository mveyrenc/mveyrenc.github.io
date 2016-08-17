####################
Inclusion de fichier
####################

.. index::
    inclusion de fichier
    single: directive; include

.. code-block:: rst

    .. include:: subdir/incl.rst

Cette directive prend les options suivantes : ``start-line``, ``end-line``, ``start-after``, ``end-before``.

Pour éviter les warnings concernant des fichiers qui ne sont pas inclus dans le toctree, ajouter le répertoire ou les fichiers dans la configuration :

.. code-block:: python

    # conf.py
    
    exclude_patterns = ["include/*"]

