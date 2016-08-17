####
Math
####

.. index::
    math
    single: directive; math
    single: role; math

.. attention::
    Il faut activer l'extension ``sphinx.ext.mathjax``.

Voici une équation : :math:`X_{0:5} = (X_0, X_1, X_2, X_3, X_4)`.

.. code-block:: rst

    Voici une équation : :math:`X_{0:5} = (X_0, X_1, X_2, X_3, X_4)`.

En voici une autre :

.. math::

    \nabla^2 f =
    \frac{1}{r^2} \frac{\partial}{\partial r}
    \left( r^2 \frac{\partial f}{\partial r} \right) +
    \frac{1}{r^2 \sin \theta} \frac{\partial f}{\partial \theta}
    \left( \sin \theta \, \frac{\partial f}{\partial \theta} \right) +
    \frac{1}{r^2 \sin^2\theta} \frac{\partial^2 f}{\partial \phi^2}

.. code-block:: rst

    En voici une autre :

    .. math::

        \nabla^2 f =
        \frac{1}{r^2} \frac{\partial}{\partial r}
        \left( r^2 \frac{\partial f}{\partial r} \right) +
        \frac{1}{r^2 \sin \theta} \frac{\partial f}{\partial \theta}
        \left( \sin \theta \, \frac{\partial f}{\partial \theta} \right) +
        \frac{1}{r^2 \sin^2\theta} \frac{\partial^2 f}{\partial \phi^2}