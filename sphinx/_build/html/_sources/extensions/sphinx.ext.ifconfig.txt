###################
sphinx.ext.ifconfig
###################

L'extension ``sphinx.ext.ifconfig`` permet conditionner la construction de certaines parties du document en fonction de paramètre de configuration.

Dans un premier temps, il faut définir le paramètre de configuration dans :file:`config.py` :

.. code-block:: python

    def setup(app):
        app.add_config_value('newconf', 'default', True)

Ensuite, dans les fichiers :file:`rst`, vous pouvez utiliser ce paramètre pour conditionner l'affiche de certaines valeurs :

.. code-block:: rst

    .. ifconfig:: newconf == 'default'

        Texte affiché que quand la config ``newconf`` est égale à ``default``

Dans votre :file:`Makefile`, vous pouvez changer la valeur du paramètre avec l'option ``-D`` :

.. code-block:: console

    $(SPHINXBUILD) -b html -D newconf=value $(ALLSPHINXOPTS) $(BUILDDIR)/html