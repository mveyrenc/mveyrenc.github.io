#################
Customisation CSS
#################

.. index::
    customisation CSS

*********
Container
*********

.. index::
    single: directive; container

La directive ``container`` permet d'ajouter une ``div`` avec une classe CSS autour d'un bloc.

.. sidebar:: Rendu

    .. code-block:: html

        <div class="myclass container">
            There is also a general ...
        </div>

.. code-block:: rst

    .. container:: myclass

       There is also a general ...

:clear:`both`

*****
Class
*****

.. index::
    single: directive; rst-class

La directive ``rst-class`` (qui replace ``class`` dans Sphinx), ajoute une classe sur son contenu ou sur le premier élément se trouvant immédiatement après.

.. sidebar:: Rendu

    .. code-block:: html

        <p class="wy-text-info">Info text.</p>
        <p class="wy-text-info">Info text.</p>

.. code-block:: rst

    .. rst-class:: wy-text-info

        Info text.

        Info text.

:clear:`both`

.. sidebar:: Rendu

    .. code-block:: html

        <p class="wy-text-info">Info text.</p>
        <p>Not info text.</p>

.. code-block:: rst

    .. rst-class:: wy-text-info

    Info text.

    Not info text.

:clear:`both`

****
Role
****

.. index::
    single: role; classe CSS

.. sidebar:: Rendu

    .. code-block:: html

        <p>An example of using <span class="wy-text-danger">interpreted text</span></p>

.. code-block:: rst

    .. role:: wy-text-danger

    An example of using :wy-text-danger:`interpreted text`

:clear:`both`