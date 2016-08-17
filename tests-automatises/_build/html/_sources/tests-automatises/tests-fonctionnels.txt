#####################
Les tests fonctionels
#####################

Un test fonctionnel est un procédé permettant de s'assurer du bon fonctionnement d'une fonctionnalité.

.. admonition:: +

    * Comme des tests d'acceptance, mais plus rapides
    * Peuvent fournir un rapport plus détaillé
    * Stable : seul les changements majeurs au niveau du code peuvent les mettre en échec

.. admonition:: -
    :class: warning

    * Pas de Javascript et donc pas d'ajax
    * En émulant un navigateur, on rique d'avoir des faux-positifs
    * Nécessite un framefork

*******
Exemple
*******

.. code-block:: php

    // Test écrit avec Codeception
    $I = new FunctionalTester($scenario);
    $I->amOnPage('/');
    $I->click('Sign Up');
    $I->submitForm('#signup', ['username' => 'MilesDavis', 'email' => 'miles@davis.com']);
    $I->see('Thank you for Signing Up!');
    $I->seeEmailSent('miles@davis.com', 'Thank you for registration');
    $I->seeInDatabase('users', ['email' => 'miles@davis.com']);

Frameworks :

* `Codeception <http://codeception.com/>`_
* Librairie intégrée dans le framework que vous utilisez