######################
sphinxcontrib.webmocks
######################

* https://pythonhosted.org/sphinxcontrib-webmocks/

*******
Exemple
*******

:Name: :text:`Input your name`
:Address: :text:`Input your address`

:button:`OK` :button:`Cancel`

.. code-block:: rst

    :Name: :text:`Input your name`
    :Address: :text:`Input your address`

    :button:`OK` :button:`Cancel`

****
text
****

.. sidebar:: Rendu

    Text form is here: :text:`default value`

    Empty text form is here: :text:`_`

.. code-block:: rst

    Text form is here: :text:`default value`

    Empty text form is here: :text:`_`

:clear:`both`

********
textarea
********

.. sidebar:: Rendu

    Textarea form is here: :textarea:`default value`

    Empty textarea form is here: :textarea:`_`

.. code-block:: rst

    Textarea form is here: :textarea:`default value`

    Empty textarea form is here: :textarea:`_`

:clear:`both`

******
select
******

.. sidebar:: Rendu

    Select form is here: :select:`Item 1,Item 2,Item 3,Item 4`

.. code-block:: rst

    Select form is here: :select:`Item 1,Item 2,Item 3,Item 4`

:clear:`both`

*****
radio
*****

.. sidebar:: Rendu

    Radio buttons are here: :radio:`Item 1,Item 2,Item 3,Item 4`

.. code-block:: rst

    Radio buttons are here: :radio:`Item 1,Item 2,Item 3,Item 4`

:clear:`both`

********
checkbox
********

.. sidebar:: Rendu

    Checkboxes are here: :checkbox:`Item 1,Item 2,Item 3,Item 4`

.. code-block:: rst

    Checkboxes are here: :checkbox:`Item 1,Item 2,Item 3,Item 4`

:clear:`both`

******
button
******

.. sidebar:: Rendu

    Button is here: :button:`OK`

.. code-block:: rst

    Button is here: :button:`OK`

:clear:`both`

********
menulist
********

Cette directive est utilisé pour le breadcrumb dans la directive ``page``. (fonctionne pas)

..
    .. menulist::

        * Menu1
            * Sub-Menu 1-1
            * Sub-Menu 1-2
            * Sub-Menu 1-3
        * Menu2
        * Menu3
        * Menu4

.. code-block:: rst

    .. menulist::

        * Menu1
            * Sub-Menu 1-1
            * Sub-Menu 1-2
            * Sub-Menu 1-3
        * Menu2
        * Menu3
        * Menu4

:clear:`both`

****
page
****

.. page:: create_user

    :UserId: :text:`_`
    :E-mail: :text:`_`

    :button:`OK` :button:`Cancel`

.. code-block:: rst

    .. page:: create_user

        :UserId: :text:`_`
        :E-mail: :text:`_`

        :button:`OK` :button:`Cancel`

.. page:: create_user2
   :breadcrumb: Users > Create User

   :UserId: :text:`_`
   :E-mail: :text:`_`

   :button:`OK` :button:`Cancel`

.. code-block:: rst

    .. page:: create_user2
       :breadcrumb: Users > Create User

       :UserId: :text:`_`
       :E-mail: :text:`_`

       :button:`OK` :button:`Cancel`

.. only:: html

    .. page:: create_user3
       :breadcrumb: Users > Create User
       :desctable:

       :UserId: :text:`_ <required, description=Allows only ASCII chars>`
       :E-mail: :text:`_ <required>`

       :button:`OK` :button:`Cancel`

.. code-block:: rst

    .. page:: create_user3
       :breadcrumb: Users > Create User
       :desctable:

       :UserId: :text:`_ <required, description=Allows only ASCII chars>`
       :E-mail: :text:`_ <required>`

       :button:`OK` :button:`Cancel`
