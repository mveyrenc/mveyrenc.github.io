#######################
Les tests d'acceptation
#######################

Les tests d'acceptence permettent de tester des scénarios tels que les jouent un utilisateur final.

.. admonition:: +

    * Peuvent être joué sur n'importe quel site et n'importe quel environnement
    * Peuvent tester du Javascript et des requêtes ajax
    * Peuvent être montrés au client
    * Très stables, ils sont peu affectés par les changements de codes, de version ou de techno

.. admonition:: -
    :class: warning

    * Lents, voir très lents
    * Instable lors de l'exécution : les temps de chargement, d'affiche, etc. penvent donner des faux-natifs

*******
Exemple
*******

.. code-block:: gherkin

    Feature: App
      Scenario: I should see the home page of Symfony
        Given I am on "/"
        Then I should see "Welcome to Symfony 2.7.3"

Ou

.. code-block:: gherkin

    # language: fr
    Fonctionnalité: App
      Scénario: Je vais sur la page d'accueil de Symfony
        Etant donné que je suis sur la page "/"
        Alors je devrais voir "Welcome to Symfony 2.7.3"

*******
Gherkin
*******
Le Gherkin est un language permettant d'écrire des sénarios.

Comme YAML et Python, l'indentation permet de définir les différents blocks de code et chaque ligne définit une étape.
Génaralement, les lignes de code Gherkin commence par un mot clé.

Le Gherkin existe en plusieurs languages dont l'anglais et le français.

*********************
Features et scenarios
*********************

Chaque **feature** doit être placé dans un fichier ``*.feature``.
Une **feature** peut contenir des **scenarios**, des **scenarios outline** (plan de scénario) et des **backgrounds** (étape jouée avant chaque scénario).
Chaque **scenario** contient des étapes qui doivent commençer par ``Given``, ``When``, ``Then``, ``But`` ou ``And``.

Une **feature** ou un **scenario** peut être associée à des tags afin de pouvoir filtrer les tests à lancer :

.. code-block:: gherkin

    @billing
    Feature: Verify billing

      @important
      Scenario: Missing product description

      Scenario: Several products

********************
Écrire des scénarios
********************

`Documentation de Behat <http://docs.behat.org/en/v3.0/user_guide/writing_scenarios.html#user-guide-writing-scenarios-backgrounds/>`_

*******************
Lancement des tests
*******************

* `JBehave <http://jbehave.org//>`_ (Java)
* `Cucumber <https://cucumber.io/>`_ (Ruby)
* `Behat <http://docs.behat.org/en/v3.0/>`_ (PHP)
* `Behave <http://pythonhosted.org/behave/>`_ (Python)

*****
Behat
*****

Installation
============

.. code-block:: console

    php composer.phar require --dev behat/behat
    php composer.phar require --dev behat/mink
    php composer.phar require --dev behat/mink-selenium2-driver
    php composer.phar require --dev behat/mink-extension
    php composer.phar require --dev behat/mink-goutte-driver
    vendor/bin/behat --init

Fichier de configuration :

.. code-block:: yaml

    # behat.yml
    default:
        suites:
            default:
                path: "%paths.base%/features"
                contexts:
                    - FeatureContext
                    - Behat\MinkExtension\Context\MinkContext
        extensions:
            Behat\MinkExtension:
                base_url: "http://mveyrenc.github.io"
                sessions:
                    default:
                        goutte: ~

.. admonition:: Mink Drivers

    ======================  =================  =========  ======  ========  ====
    Feature                 BrowserKit/Goutte  Selenium2  Zombie  Selenium  Sahi
    ======================  =================  =========  ======  ========  ====
    Page traversing         Yes                Yes        Yes     Yes       Yes
    Form manipulation       Yes                Yes        Yes     Yes       Yes
    HTTP Basic auth         Yes                No         Yes     No        No
    Windows management      No                 Yes        No      Yes       Yes
    iFrames management      No                 Yes        No      Yes       No
    Request headers access  Yes                No         Yes     No        No
    Response headers        Yes                No         Yes     No        No
    Cookie manipulation     Yes                Yes        Yes     Yes       Yes
    Status code access      Yes                No         Yes     No        No
    Mouse manipulation      No                 Yes        Yes     Yes       Yes
    Drag'n Drop             No                 Yes        No      Yes       Yes
    Keyboard actions        No                 Yes        Yes     Yes       Yes
    Element visibility      No                 Yes        No      Yes       Yes
    JS evaluation           No                 Yes        Yes     Yes       Yes
    Window resizing         No                 Yes        No      No        No
    Window maximizing       No                 Yes        No      Yes       No
    ======================  =================  =========  ======  ========  ====


Exécuter Behat
==============

Écrivez vos tests dans le répertoire ``features`` comme par exemple :

.. code-block:: gherkin

    # language: fr

    Fonctionnalité: Homepage
        Scénario: Je vais sur la page d'accueil
            Etant donné je suis sur la page d'accueil
            Alors je devrais voir "Tests automatisés et intégration continue PHP"

Lancez les tests :

.. code-block:: console

    vendor/bin/behat



