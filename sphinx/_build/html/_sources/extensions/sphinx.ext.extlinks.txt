###################
sphinx.ext.extlinks
###################

L'extension ``sphinx.ext.extlinks`` est une aide quand on a plusieurs liens qui pointent vers le même site ou quand on a des liens avec les paramètres.

Dans le fichier :file:`config.py`, on définit les liens :

.. code-block:: python

    extlinks = {'alias': ('http://url.de.la.page/%s', 'préfixe du lien ')}

    extlinks = {'helios': ('https://helios.openwide.fr/ticket/%s', 'ticket ')}

Ensuite, on peut utiliser l'alias comme un rôle : 

.. sidebar:: Rendu

    :helios:`29400`

.. code-block:: rst

    :helios:`29400`

:clear:`both`

On peut également spécifier un nom explicite pour le lien : 

.. sidebar:: Rendu

    :helios:`ce ticket Helios <29400>`

.. code-block:: rst

    :helios:`ce ticket Helios <29400>`

:clear:`both`
