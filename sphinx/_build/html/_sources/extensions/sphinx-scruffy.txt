##############
sphinx-scruffy
##############

* https://pypi.python.org/pypi/sphinx-scruffy
* https://github.com/paylogic/sphinx-scruffy
* https://github.com/aivarsk/scruffy

***********
Dépendances
***********

.. code-block:: console

    sudo apt-get install graphviz librsvg2-bin plotutils
    sudo apt-get install ttf-thai-tlwg

**************
Exemple simple
**************

.. only:: html

    .. scruffy::

        [Node A]->[Node B]
        [Node B]->[Node C]
        [Group [Node A][Node B]]

.. code-block:: rst

    .. scruffy::

        [Node A]->[Node B]
        [Node B]->[Node C]
        [Group [Node A][Node B]]

********************
Diagrammes de classe
********************

.. only:: html

    .. scruffy::

        [User|+Forename;+Surname;+HashedPassword;-Salt|+Login();+Logout()]

.. code-block:: rst

    .. scruffy::

        [User|+Forename;+Surname;+HashedPassword;-Salt|+Login();+Logout()]

.. only:: html

    .. scruffy::

        [note: You can stick notes on diagrams too!{bg:cornsilk}]
        [Customer]<>1-orders 0..*>[Order]
        [Order]++*->[LineItem]
        [Order]-1>[DeliveryMethod]
        [Order]-*>[Product]
        [Category]<->[Product]
        [DeliveryMethod]^[National]
        [DeliveryMethod]^[International]

.. code-block:: rst

    .. scruffy::

        [note: You can stick notes on diagrams too!{bg:cornsilk}]
        [Customer]<>1-orders 0..*>[Order]
        [Order]++*->[LineItem]
        [Order]-1>[DeliveryMethod]
        [Order]-*>[Product]
        [Category]<->[Product]
        [DeliveryMethod]^[National]
        [DeliveryMethod]^[International]

**********************
Diagrammes de séquence
**********************

.. only:: html

    .. scruffy::
        :sequence:

        [Patron]order food>[Waiter]
        [Waiter]order food>[Cook]
        [Waiter]serve wine>[Patron]
        [Cook]pickup>[Waiter]
        [Waiter]serve food>[Patron]
        [Patron]pay>[Cashier]

.. code-block:: rst

    .. scruffy::
        :sequence:

        [Patron]order food>[Waiter]
        [Waiter]order food>[Cook]
        [Waiter]serve wine>[Patron]
        [Cook]pickup>[Waiter]
        [Waiter]serve food>[Patron]
        [Patron]pay>[Cashier]