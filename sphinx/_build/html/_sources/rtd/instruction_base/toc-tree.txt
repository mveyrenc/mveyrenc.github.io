########
TOC tree
########

.. index::
    table des matières
    single: directive; toctree

.. code-block:: rst

    .. toctree::
        :maxdepth: 2
        :numbered:
        :glob:
        :hidden:

        intro/*
        All about strings <strings>
        datatypes
        numeric
        (many more documents listed here)

:maxdepth: Profondeur à afficher
:numbered: Affiche les numéros de chapitres
:glob: À utiliser quand on veux inclure un répertoire ou un ensemble de fichiers comme ``intro/*``
:hidden: N'affiche pas le TOC. Les titres apparaissent dans la navigation de gauche (HTML)