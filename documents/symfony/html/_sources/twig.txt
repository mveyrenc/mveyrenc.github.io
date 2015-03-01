##################
Les vues avec Twig
##################

Symfony utilise le moteur de templating Twig pour aider au rendu des pages. Il présente plusieurs avantages :

* il compile les templates en code PHP optimisé
* il possède toutes les structures de contrôle classiques
* la syntaxe qu'il propose est compacte et souvent plus rapide à taper
* il propose nativement un grand nombre de méthodes et de filtres
* il propose un système avancé de blocs, macros et d'héritage qui permet de facilement factoriser le code

Voyons un exemple. Voici un exemple de code en PHP et son équivalent en Twig :

.. literalinclude:: code-block/twig/vue.php
    :language: html+php
    :lines: 1-7

.. literalinclude:: code-block/twig/vue.twig
    :language: html+jinja
    :lines: 1-7

*******
Le base
*******

Retournons à l'origine de l'appel du template, c'est à dire dans le contrôleur et ajoutons quelques paramètres au template :

.. literalinclude:: code-block/twig/vue.php
    :language: php
    :lines: 10-16

Ensuite enrichissons un peu le template d'affichage :

.. literalinclude:: code-block/twig/show.html.twig
    :language: html+jinja

Voici le résultat :

.. image:: _static/images/twig_resultat1.png
    :align: center

La syntaxe est très simple :

* ``{{ ... }}`` **affiche** quelque chose ;
* ``{% ... %}`` **fait** quelque chose ;
* ``{# ... #}`` n'affiche rien et ne fait rien : c'est la syntaxe pour les commentaires, qui peuvent être sur plusieurs lignes ;

*******************
Accès aux variables
*******************

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 1-22

************************
Affectation de variables
************************

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 25-27

***********
Les filtres
***********

Les variables peuvent être modifiées par des filtres. Les filtres sont séparés par des pipes (``|``) et peuvent avoir des paramètres supplémentaire entre parenthèses.

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 30-31

On peut également appliquer un filtre sur une portion de code :

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 33-35

*************
Les fonctions
*************

Les fonctions sont appelées pour générer du contenu. Elles sont appelées par leur nom suivi de paramètres entre parenthèses :

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 38-40

**************************
Les structures de contrôle
**************************

Les structures de contrôle sont des tags dans Twig. 

Conditions
==========

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 43-49

Boucle
======

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 52-54

Le tag ``{% for %}`` met à disposition au sein de la boucle un variable ``loop`` qui contient les attributs suivantes :

* ``index`` : numéro de l'itération courante en commençant par 1
* ``index0`` :  : numéro de l'itération courante en commençant par 0
* ``revindex`` : nombre d'itérations restantes avant la fin de la boucle en finissant par 1
* ``revindex0`` : nombre d'itérations restantes avant la fin de la boucle en finissant par 0
* ``first`` : est-ce la première itération
* ``last`` : est-ce la dernière itération
* ``length`` : nombre total d'itération

**********************
Les types de variables
**********************

Les types de valeurs sont similaires aux types natifs de PHP excepté qu'il fait la différence entre les tableaux et les hashs (tableaux associatifs) :

* les chaînes de caractères ``"Hello world"``
* les entiers ``42``
* les flottants ``42.56``
* les tableaux ``["foo", "bar"]``
* les hashs ``{"foo": "bar"}`` ``{'foo': 'foo', 'bar': 'bar'}`` ``{foo: 'foo', bar: 'bar'}`` ``{2: 'foo', 4: 'bar'}``
* les booleans ``true`` et ``false``
* le null ``null``

**************
Les opérateurs
**************

* Mathématiques
    * addition ``{{ 1 + 1 }}`` = 2
    * soustraction ``{{ 3 - 2 }}`` = 1
    * multiplication ``{{ 2 * 2 }}`` = 4
    * division ``{{ 1 / 2 }}`` = 0.5
    * division avec arrondi ``{{ 20 // 7 }}`` = 2
    * modulo ``{{ 20 % 7 }}`` = 6
    * puissance ``{{ 2 ** 3 }}`` = 8
* Logiques
    * ET ``and`` (équivalent du ``&&`` PHP)
    * OU ``or`` (équivalent du ``||`` PHP)
    * Négation ``not`` (équivalent du ``!`` PHP)
* Binaires
    * ET ``b-and`` (équivalent du ``&`` PHP)
    * OU ``b-or`` (équivalent du ``|`` PHP)
    * OU exclusif ``not`` (équivalent du ``^`` PHP)
* Comparaisons
    * égalité ``==``
    * différence ``!=``
    * inférieur ``<``
    * supérieur ``>``
    * inférieur ou égal ``<=``
    * supérieur ou égal ``>=``
    * pour les chaîne de caractères
        * commence par ``starts``
        * finit par ``ends``
        * corresponds à ``matches`` (test avec une expression régulière)
* Test
    * est égal à une constante ``is constant()``
    * est définit ``is defined``
    * est divisible par ``is divisible by()``
    * est vide ``is empty``
    * est un nombre pair ``is even``
    * est un nombre impair ``is odd``
    * est itérable ``is iterable``
    * est null ``is null``
    * est identique à ``is same as()`` (équivalent du ``===`` PHP)
* Autres opérateurs
    * crée un séquence ``..`` (équivalent de la fonction range) ``1..4 = [1, 2, 3, 4]``
    * applique un filtre ``|``
    * convertie les opérandes en chaînes de caractères et les concatènes ``~``. ``"Hello " ~ name ~ "!" = "Hello John!"``
    * récupère un attribut d'un objet ``.`` ou ``[]``. ``user.name`` ou ``user['name']``
    * opérateur tertiaire ``?:`` . ``{{ foo ? 'yes' : 'no' }}``
        * ``{{ foo ?: 'no' }}`` est équivalent à ``{{ foo ? foo : 'no' }}``
        * ``{{ foo ? 'yes' }}`` est équivalent à ``{{ foo ? 'yes' : '' }}``
* Substitution de chaînes de caractères
    * ``#{}`` dans un chaîne ouverte ace des double quote. ``"foo #{1 + 2} baz" = "foo 2 bar"``
* Contrôle es espaces blancs
    * Supprime tous les espaces, tabulations et saut de lignes inutiles :
    * ``{% spaceless %}{% endspaceless %}``

        .. literalinclude:: code-block/twig/base_twig.html.twig
            :language: html+jinja
            :lines: 1-6

    * ``{%-``, ``-%}``, ``{{-`` et ``-}}``

        .. literalinclude:: code-block/twig/base_twig.html.twig
            :language: html+jinja
            :lines: 8-10
    
**********************
Les variables globales
**********************

Quelques variables sont disponibles dans les templates afin nous faciliter la vie :

* ``app.request`` : la requête qui a été passé au contrôleur
* ``app.session`` : la session de l'utilisateur
* ``app.environment`` : l'environnement sur lequel on travaille (dev, prod, etc.)
* ``app.debug`` : le débug est-il activé ou non
* ``app.security`` : le service security
* ``app.user`` : l'utilisateur courant

On peut également injecter nos propres variables en ajoutant la configuration suivante :

.. literalinclude:: code-block/twig/config.yml
    :language: yaml

Ensuite dans les templates, il ne reste plus qu'à appeller la variable : ``{{ auteur }}``

**********
Les macros
**********

Les macros sont similaires à des fonctions excepté qu'elles sont écrites directement en Twig :

.. literalinclude:: code-block/twig/macro.html.twig
    :language: html+jinja

*********************
Héritage de templates
*********************

L'héritage permet de créer un squelette définissant la structure générale des pages dans lequel on définit des blocs qui seront surchargés par les templates enfants.

Une des bonne pratique pour organiser ses templates est de mettre trois niveaux d'héritage :

* le **layout général** : il s'agit du design du site. Il est indépendant de celui des bundles. Il contient la structure des page de votre site : header, footer, menu principal, etc. Son chemin exact est ``app/Resources/views/base.html.twig`` et voici la syntaxe pour l'appeler dans vos bundles : ``::base.html.twig``
* le **layout du bundle** : il hérite du layout général et contient tous les éléments communs aux pages d'un même bundle comme un menu secondaire par exemple
* le **template de la page** : il hérite du layout du bundle et contient la partie centrale de la page

Reprenons le template ``show.html.twig`` et répartissons le code dans les templates ``app/Resources/views/base.html.twig`` et ``src/Epsi/Bundle/BlogBundle/Resources/views/base.html.twig`` en remplaçant les parties spécifiques par des blocs et en l'enrichissant un peu :

.. literalinclude:: code-block/twig/base.html.twig
    :language: html+jinja

.. literalinclude:: code-block/twig/base_bundle.html.twig
    :language: html+jinja

.. literalinclude:: code-block/twig/show_extend.html.twig
    :language: html+jinja

**********************
Inclusion de templates
**********************

.. literalinclude:: code-block/twig/base_twig.html.twig
    :language: html+jinja
    :lines: 57-59

Lors de l'inclusion de template, le template inclus a accès à toutes les variables du contexte courant sauf si on utilise le mot clé ``only``. Le mot clé ``with`` permet quand à lui de passer des variables au template.

************************
Inclusion de contrôleurs
************************

Pour inclure un contôleur, c'est très simple il suffit d'utiliser la fonction ``render`` :

.. code-block:: html+jinja
    
    {{ render(controller("EpsiBlogBundle:Blog:menu")) }}

Ici, contrairement à un inclusion de template qui va utiliser les variables de sont template parent, le contrôleur appelé va récupérer tous les données qu'il lui sont nécessaire et les afficher dans une vue.

Twig propose beaucoup de filtres, méthodes et fonctions que vous pouvez retrouver sur la documentation officielle : http://twig.sensiolabs.org/


