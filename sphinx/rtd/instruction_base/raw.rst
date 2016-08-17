###
Raw
###

.. index::
    raw
    raw-html
    raw-latex
    single: role; raw

Ce rôle permet d'insérer du texte écrit directement dans le langage du builder.

.. sidebar:: Rendu

    .. raw:: html

        <hr width=50 size=10>

.. code-block:: rst

    .. raw:: html

        <hr width=50 size=10>

:clear:`both`

.. sidebar:: Rendu

    .. raw:: latex

        \setlength{\parindent}{0pt}


.. code-block:: rst

    .. raw:: latex

        \setlength{\parindent}{0pt}

:clear:`both`

On peut lui passer les options suivantes :

:file: fichier à inclure
:url: l'URL d'une page à inclure
:encoding: l'encodage du fichier ou de la page inclus