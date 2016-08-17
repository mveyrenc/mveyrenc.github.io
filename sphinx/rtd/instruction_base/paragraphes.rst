###########
Paragraphes
###########

*****************
Paragraphe simple
*****************

Les paragraphes sont tout simplement des morceaux de texte séparés par une ou plusieurs lignes vides.

**************
Bloc de lignes
**************

.. sidebar:: Rendu

    | Line block
    | New line and we are still on
        the same line
    |      Yet a new line

.. code-block:: rst

    | Line block
    | New line and we are still on
        the same line
    |      Yet a new line

:clear:`both`

**********
Blockquote
**********

.. sidebar:: Rendu

    Il faut les indenter par rapport au paragraphe précédent.

        Neither from itself nor from another,
        Nor from both,
        Nor without a cause,
        Does anything whatever, anywhere arise.

        --Nagarjuna - *Mulamadhyamakakarika*

.. code-block:: rst

    Il faut les indenter par rapport au paragraphe précédent.

       Neither from itself nor from another,
       Nor from both,
       Nor without a cause,
       Does anything whatever, anywhere arise.

       --Nagarjuna - *Mulamadhyamakakarika*

:clear:`both`

**********
Pull quote
**********

.. index::
    single: directive; pull-quote

Comme les blockquotes, mais avec une directive.

.. sidebar:: Rendu

    .. pull-quote::

          Just as a solid rock ...

.. code-block:: rst

    .. pull-quote::

          Just as a solid rock ...

:clear:`both`

**********************
Epigraph et highlights
**********************

.. index::
    single: directive; highlights
    single: directive; epigraph

Ce sont des blockquotes avec une classe CSS particulière.

.. sidebar:: Rendu

    .. highlights::

          With these *highlights* ...

    .. epigraph::

          With these *epigraph* ...

.. code-block:: rst

    .. highlights::

          With these *highlights* ...

    .. epigraph::

          With these *epigraph* ...

:clear:`both`
