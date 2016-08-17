#############
Inline markup
#############

.. index::
    inline markup
    mise en forme
    single: mise en forme; italique
    single: mise en forme; italique
    single: mise en forme; gras
    single: code; inline markup
    single: inline markup; strong
    single: inline markup; emphasize
    single: role; emphasize
    single: inline markup; code
    single: role; code
    single: role; literal
    single: role; subscript
    single: role; sub
    single: role; title-reference
    single: role; title
    single: role; t
    single: role; PEP
    single: role; pep-reference
    single: role; rfc-reference
    single: role; RFC

********
Italique
********

.. sidebar:: Rendu

    | *emphasize*
    | :emphasis:`emphasize`

.. code-block:: rst

    *emphasize*
    :emphasis:`emphasize`

:clear:`both`

****
Gras
****

.. sidebar:: Rendu

    | **strong**
    | :strong:`strong`

.. code-block:: rst

    **strong**
    :strong:`strong`

:clear:`both`

****
Code
****

.. sidebar:: Rendu

    | ``code``
    | :code:`code`
    | :literal:`literal`

.. code-block:: rst

    ``code``
    :code:`code`
    :literal:`literal`

:clear:`both`

********************
Expression régulière
********************

.. sidebar:: Rendu

    | :regexp:`(.*)`

.. code-block:: rst

    :regexp:`(.*)`

:clear:`both`

*******
Exemple
*******

.. sidebar:: Rendu

    | :samp:`toto`

.. code-block:: rst

    :samp:`toto`

:clear:`both`

********
Commande
********

.. sidebar:: Rendu

    | :command:`ls -l`

.. code-block:: rst

    :command:`ls -l`

:clear:`both`

*********
Programme
*********

.. sidebar:: Rendu

    | :program:`libreoffice`

.. code-block:: rst

    :program:`libreoffice`

:clear:`both`

*******
Fichier
*******

.. sidebar:: Rendu

    | :file:`/etc/hosts`

.. code-block:: rst

    :file:`/etc/hosts`

:clear:`both`

**********
Définition
**********

.. sidebar:: Rendu

    | Marquez l'instance la définition d'un terme dans le texte. (Pas d'entrées d':dfn:`index` sont générés.)

.. code-block:: rst

    Marquez l'instance la définition d'un terme dans le texte. (Pas d'entrées d':dfn:`index` sont générés.)

:clear:`both`


*****************************************************
Référence à des titres d'œuvres (livres, films, etc.)
*****************************************************

.. sidebar:: Rendu

    | `Design Patterns`
    | :title-reference:`Design Patterns`
    | :title:`Design Patterns`
    | :t:`Design Patterns`

.. code-block:: rst

    `Design Patterns`
    :title-reference:`Design Patterns`
    :title:`Design Patterns`
    :t:`Design Patterns`

:clear:`both`

******
Indice
******

.. sidebar:: Rendu

    | H\ :subscript:`2`\ O
    | H\ :sub:`2`\ O

.. code-block:: rst

    H\ :subscript:`2`\ O
    H\ :sub:`2`\ O

:clear:`both`

********
Exposant
********

.. sidebar:: Rendu

    | m\ :superscript:`3`
    | m\ :sup:`3`

.. code-block:: rst

    m\ :superscript:`3`
    m\ :sup:`3`

:clear:`both`

***********
Abréviation
***********

.. sidebar:: Rendu

    | :abbr:`LIFO (last-in, first-out)`

.. code-block:: rst

    :abbr:`LIFO (last-in, first-out)`

:clear:`both`

*********************************
PEP (Python Enhancement Proposal)
*********************************

.. sidebar:: Rendu

    | :PEP:`287`
    | :pep-reference:`287`

.. code-block:: rst

    :PEP:`287`
    :pep-reference:`287`

:clear:`both`

***********************************
RFC (Internet Request for Comments)
***********************************

.. sidebar:: Rendu

    | :RFC:`287`
    | :rfc-reference:`287`

.. code-block:: rst

    :RFC:`287`
    :rfc-reference:`287`

:clear:`both`

**********************************
Label dans l'interface utilisateur
**********************************

.. sidebar:: Rendu

    | :guilabel:`Ajouter`

.. code-block:: rst

    :guilabel:`Ajouter`

:clear:`both`

******************
Sélection de menus
******************

.. sidebar:: Rendu

    | :menuselection:`Start --> Programs`

.. code-block:: rst

    :menuselection:`Start --> Programs`

:clear:`both`

*******************
Séquence de touches
*******************

.. sidebar:: Rendu

    | :kbd:`C-x C-f`
    | :kbd:`Control-x Control-f`

.. code-block:: rst

    :kbd:`C-x C-f`
    :kbd:`Control-x Control-f`

:clear:`both`

**************
Entête de mail
**************

.. sidebar:: Rendu

    | :mailheader:`Content-Type`

.. code-block:: rst

    :mailheader:`Content-Type`

:clear:`both`

********
Mimetype
********

.. sidebar:: Rendu

    | :mimetype:`application/pdf`

.. code-block:: rst

    :mimetype:`application/pdf`

:clear:`both`

******************************
Variable pour :command:`make`
******************************

.. sidebar:: Rendu

    | make :makevar:`all`

.. code-block:: rst

    make :makevar:`all`

:clear:`both`

******
Manuel
******

.. sidebar:: Rendu

    | :manpage:`ls(1)`

.. code-block:: rst

    :manpage:`ls(1)`

:clear:`both`