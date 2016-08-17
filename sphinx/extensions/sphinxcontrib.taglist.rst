#####################
sphinxcontrib.taglist
#####################

* https://github.com/spinus/sphinxcontrib-taglist

.. tag:: Some tagged information
    :tag: tag1 tag2 tag3 

.. code-block:: rst

    .. tag:: Some tagged information
        :tag: success::tag1 tag2 tag3

.. tag:: [tag1 tag2 tag3] Some tagged information

.. code-block:: rst

    .. tag:: [tag1 tag2 tag3] Some tagged information

Dans le :file:`config.py`, on peut customiser l'apparence du tag :

.. code-block:: python

    taglist_tags = {
        'tag1': {'background-color': 'green'}
    }

.. Attention::

    Le rôle ``tag`` définit dans cette extension est en conflit avec celui définit dans le thème ``sphinx_rtd_theme``.
    