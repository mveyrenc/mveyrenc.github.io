#############
Substitutions
#############

.. index::
    substitution

Les substitutions permettent de remplacer un marqueur par du texte :

.. code-block:: rst

    .. |substitution_text| directive type:: data directive block

Par défault, il est existe trois substitutions :

* ``|release|``
* ``|version|``
* ``|today|``


********************************
Insertion d'images dans du texte
********************************

.. sidebar:: Rendu

    West led the |H| 3, covered by dummy's |H| Q, East's |H| K,
    and trumped in hand with the |S| 2.

    .. |H| image:: /_static/images/face-angel.png
        :height: 11
        :width: 11
    .. |S| image:: /_static/images/face-embarrassed.png
        :height: 11
        :width: 11

    * |Red light| means stop.
    * |Green light| means go.
    * |Yellow light| means go really fast.

    .. |Red light|    image:: /_static/images/flag-red.png
    .. |Green light|  image:: /_static/images/flag-green.png
    .. |Yellow light| image:: /_static/images/flag-yellow.png

    |-><-| is the official symbol of POEE_.

    .. |-><-| image:: /_static/images/face-worried.png
    .. _POEE: http://www.poee.org/

.. code-block:: rst

    West led the |H| 3, covered by dummy's |H| Q, East's |H| K,
    and trumped in hand with the |S| 2.

    .. |H| image:: /_static/images/face-angel.png
        :height: 11
        :width: 11
    .. |S| image:: /_static/images/face-embarrassed.png
        :height: 11
        :width: 11

    * |Red light| means stop.
    * |Green light| means go.
    * |Yellow light| means go really fast.

    .. |Red light|    image:: /_static/images/flag-red.png
    .. |Green light|  image:: /_static/images/flag-green.png
    .. |Yellow light| image:: /_static/images/flag-yellow.png

    |-><-| is the official symbol of POEE_.

    .. |-><-| image:: /_static/images/face-worried.png
    .. _POEE: http://www.poee.org/

:clear:`both`

********************
Insérer du code HTML
********************

.. sidebar:: Rendu

    .. |br| raw:: html

       <br />

    saut |br| de |br| ligne

.. code-block:: rst

    .. |br| raw:: html

       <br />

    saut |br| de |br| ligne

:clear:`both`

*************************
Remplacement par du texte
*************************

.. sidebar:: Rendu

    .. |more-doc| replace::  *more in* **reST** *directives manual*

    .. _more-doc: http://docutils.sourceforge.net/doc...


    Instead ...  use ``image`` |more-doc|_

.. code-block:: rst

    .. |more-doc| replace::  *more in* **reST** *directives manual*

    .. _more-doc: http://docutils.sourceforge.net/doc...


    Instead ...  use ``image`` |more-doc|_