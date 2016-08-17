####################
Notes de bas de page
####################

.. index::
    note de pied de page
    single: lien; note de pied de page

Pour les notes de bas de page, utiliser ``[#name]_`` pour marquez n'endroit où insérer la note dans le texte, puis ajouter le corps de la note en base du document après la rubrique :

.. sidebar:: Rendu

    Lorem ipsum [#f1]_ dolor sit amet ... [#f2]_

    [...]

    .. rubric:: Notes

    .. [#f1] Text of the first footnote.
    .. [#f2] Text of the second footnote.

.. code-block:: rst

    Lorem ipsum [#f1]_ dolor sit amet ... [#f2]_

    [...]

    .. rubric:: Notes

    .. [#f1] Text of the first footnote.
    .. [#f2] Text of the second footnote.

:clear:`both`