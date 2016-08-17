##############
Les directives
##############

.. index::
    directive

.. code-block:: rst

    .. <name>:: <arguments>
        :<option>: <option values>

        content

#########
Les rôles
#########

.. index::
    role

.. code-block:: rst

    :<name>:`<argument>`

*********************
Customisation de rôle
*********************

.. index::
    single: directive; role

La directive ``role`` permet de créer des rôles dynamiquement qui seront ensuite interprétés par le parser.

Pour déclarer un rôle ::

    .. role:: custom

Ensuite on l'utilise ainsi ::

    An example of using :custom:`interpreted text`