#####################
Listes et définitions
#####################

.. index::
    liste

************
Liste à puce
************

.. index::
    single: liste; liste à puce

Pour construire une liste, ajoutez le caractère ``*`` au début du paragraphe et indentez la correctement. 

.. sidebar:: Rendu

    * This is a bulleted list.
    * It has two items, the second
      item uses two lines.

.. code-block:: rst

    * This is a bulleted list.
    * It has two items, the second
      item uses two lines.

:clear:`both`

***************
Liste numérotée
***************

.. index::
    single: liste; liste numérotée

Pour les listes numérotés, remplacez ``*`` par ``#``.

.. sidebar:: Rendu

    1. This is a numbered list.
    2. It has two items too.
    #. This is a numbered list.
    #. It has two items too.

    a) Point a
    b) Point b
    #) Automatic point c.

.. code-block:: rst

    1. This is a numbered list.
    2. It has two items too.
    #. This is a numbered list.
    #. It has two items too.

    a) Point a
    b) Point b
    #) Automatic point c.

:clear:`both`

***************
Liste imbriquée
***************

.. index::
    single: liste; liste imbriquée

Pour créez des listes imbriquées, faites attention à séparer les listes parent et enfant avec au moins une ligne vide :

.. sidebar:: Rendu

    * this is
    * a list

        * with a nested list
        * and some subitems

    * and here the parent list continues

.. code-block:: rst

    * this is
    * a list

        * with a nested list
        * and some subitems

    * and here the parent list continues

:clear:`both`

*****************
Liste horizontale
*****************

.. index::
    single: liste; liste horizontale
    single: directive; hlist

.. sidebar:: Rendu

    .. hlist::
        :columns: 2

        * list of
        * short items
        * that should be
        * displayed
        * horizontally

.. code-block:: rst

    .. hlist::
        :columns: 2

        * list of
        * short items
        * that should be
        * displayed
        * horizontally

:clear:`both`

********************
Liste de définitions
********************

.. index::
    single: liste; liste de définitions

Les définitions sont des paragraphes indentés sans marqueur au début :

.. sidebar:: Rendu

    term (up to a line of text)
        Definition of the term, which must be indented

        and can even consist of multiple paragraphs
    next term
        Description.

.. code-block:: rst

    term (up to a line of text)
        Definition of the term, which must be indented

        and can even consist of multiple paragraphs
    next term
        Description.

:clear:`both`

***************
Liste de champs
***************

.. index::
    single: liste; liste de champs

.. sidebar:: Rendu

    :Name: Isaac Newton
    :Long: Here we insert more
        text to show the effect of
        many lines.
    :Remark:
        Start on the next line.

.. code-block:: rst

    :Name: Isaac Newton
    :Long: Here we insert more
        text to show the effect of
        many lines.
    :Remark:
        Start on the next line.

:clear:`both`

***************
Liste d'options
***************

.. index::
    single: liste; liste d'option

.. sidebar:: Rendu

    -v           An option
    -o file      Same with value
    --delta      A long option
    --delta=len  Same with value

.. code-block:: rst


    -v           An option
    -o file      Same with value
    --delta      A long option
    --delta=len  Same with value

:clear:`both`