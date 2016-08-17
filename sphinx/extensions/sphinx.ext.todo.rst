###############
sphinx.ext.todo
###############

L'extension ``sphinx.ext.todo`` permet d'insérer des TODO :

.. todo::

    * un truc à faire
    * un autre
    * encore un autre

.. code-block:: rst

    .. todo::

        * un truc à faire
        * un autre
        * encore un autre

La directives ``todolist`` permet d'afficher toutes les TODO présentent dans le document si le paramètre de configuration ``todo_include_todos`` est à ``True``.

.. code-block:: rst

    .. todolist::

.. todolist::


    