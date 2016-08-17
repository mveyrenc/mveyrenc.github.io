######
Images
######

.. index::
    image
    single: directive; image

.. sidebar:: Rendu

    .. image:: /_static/images/Open-Wide_php_logo.png

.. code-block:: rst

    .. image:: /_static/images/Open-Wide_php_logo.png

:clear:`both`

.. sidebar:: Rendu

    .. image:: /_static/images/Open-Wide_php_logo.png
        :height: 100px
        :width: 200 px
        :scale: 50 %
        :alt: alternate text
        :align: center
        :target: http://www.openwide.fr

.. code-block:: rst

    .. image:: /_static/images/Open-Wide_php_logo.png
        :height: 100px
        :width: 200 px
        :scale: 50 %
        :alt: alternate text
        :align: center
        :target: http://www.openwide.fr

:clear:`both`

Vous pouvez ajouter la class ``box`` à votre image pour ajouter une bordure :

.. sidebar:: Rendu

    .. image:: /_static/images/Open-Wide_php_logo.png
        :height: 100px
        :width: 200 px
        :scale: 50 %
        :align: center
        :class: box

.. code-block:: rst

    .. image:: /_static/images/Open-Wide_php_logo.png
        :height: 100px
        :width: 200 px
        :scale: 50 %
        :align: center
        :class: box

:clear:`both`

#######
Figures
#######

.. index::
    figure
    single: image; figure
    single: directive; figure


.. figure:: /_static/images/Open-Wide_php_logo.png
   :scale: 150 %
   :align: center
   :alt: map to buried treasure

   This is the caption of the figure (a simple paragraph).

   The legend consists of all elements after the caption.  In this
   case, the legend consists of this paragraph and the following
   table:

    +-----------------------+
    | Meaning               | 
    +=======================+
    | Campground            |
    +-----------------------+
    | Lake                  | 
    +-----------------------+
    | Mountain              |
    +-----------------------+

.. code-block:: rst

    .. figure:: /_static/images/Open-Wide_php_logo.png
       :scale: 150 %
       :align: center
       :alt: map to buried treasure

       This is the caption of the figure (a simple paragraph).

       The legend consists of all elements after the caption.  In this
       case, the legend consists of this paragraph and the following
       table:

        +-----------------------+
        | Meaning               | 
        +=======================+
        | Campground            |
        +-----------------------+
        | Lake                  | 
        +-----------------------+
        | Mountain              |
        +-----------------------+

:clear:`both`