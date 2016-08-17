.. _top-of-page:

#####
Liens
#####

.. index::
    lien

************************
Vers un titre de la page
************************

.. sidebar:: Rendu

    `Vers un titre de la page`_

.. code-block:: rst

    `Vers un titre de la page`_

:clear:`both`

***********************************
Vers une référence dans le document
***********************************

Placez une référence dans le document, toujours avant un titre : ::

    .. _nom-du-label:

Pour faire un lien vers la référence : ::

    :ref:`texte affiché <nom-du-label>` ou :ref:`<nom-du-label>`

.. sidebar:: Rendu

    :ref:`début de la page <top-of-page>` ou :ref:`top-of-page`

.. code-block:: rst

    :ref:`début de la page <top-of-page>` 
    ou :ref:`top-of-page`

:clear:`both`

************
Lien externe
************

Première notation, comme les citations :

.. sidebar:: Rendu

    A link to `Sphinx Home`_ in citation style.

    .. _Sphinx Home: http://sphinx.pocoo.org

.. code-block:: rst

    A link to `Sphinx Home`_ in citation style.

    .. _Sphinx Home: http://sphinx.pocoo.org

:clear:`both`

Seconde notation, en ligne :

.. sidebar:: Rendu

    In-line versions are `Sphinx Home <http://sphinx.pocoo.org>`_ or `<http://sphinx.pocoo.org>`_ or (in Sphinx) http://sphinx.pocoo.org

.. code-block:: rst

    In-line versions are `Sphinx Home <http://sphinx.pocoo.org>`_ or `<http://sphinx.pocoo.org>`_ or (in Sphinx) http://sphinx.pocoo.org

:clear:`both`

**************
Download links
**************

.. sidebar:: Rendu

    :download:`Télécharger le logo !</_static/images/Open-Wide_php_logo.png>`

.. code-block:: rst

    :download:`Télécharger le logo !</_static/images/Open-Wide_php_logo.png>`

:clear:`both`