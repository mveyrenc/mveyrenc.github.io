.. _routes:

##########
Les routes
##########

Les routes permettent à Symfony de savoir quel contrôleur exécuter lorsque vous appelez une page.

Une route est composée à minima :

* d'un nom. Il s'agit d'une chaine de caractères,

Le routing fait la correspondance entre les URLs et les les contrôleurs. La configuration de ce mapping se fait

    * dans le fichier ``app/config/routing.yml`` :

        .. code-block:: yaml

            # app/config/routing.yml

            epsi_blog:
                resource: "@EpsiBlogBundle/Controller/"
                type:     annotation
                prefix:   /

            app:
                resource: "@AppBundle/Controller/"
                type:     annotation

    * dans les bundles sous forme de fichiers de configuration ou avec l'annotation ``@Route`` dans les contrôleurs :

        .. code-block:: php

            /**
             * @Route("/hello/{name}")
             */

Ce qui produit les routes suivantes :

.. code-block:: console 

    > php app/console debug:router --show-controllers

     Name                     Method Scheme Host Path                              Controller
     _wdt                     ANY    ANY    ANY  /_wdt/{token}                     web_profiler.controller.profiler:toolbarAction       
     _profiler_home           ANY    ANY    ANY  /_profiler/                       web_profiler.controller.profiler:homeAction          
     _profiler_search         ANY    ANY    ANY  /_profiler/search                 web_profiler.controller.profiler:searchAction        
     _profiler_search_bar     ANY    ANY    ANY  /_profiler/search_bar             web_profiler.controller.profiler:searchBarAction     
     _profiler_purge          ANY    ANY    ANY  /_profiler/purge                  web_profiler.controller.profiler:purgeAction         
     _profiler_info           ANY    ANY    ANY  /_profiler/info/{about}           web_profiler.controller.profiler:infoAction          
     _profiler_phpinfo        ANY    ANY    ANY  /_profiler/phpinfo                web_profiler.controller.profiler:phpinfoAction       
     _profiler_search_results ANY    ANY    ANY  /_profiler/{token}/search/results web_profiler.controller.profiler:searchResultsAction 
     _profiler                ANY    ANY    ANY  /_profiler/{token}                web_profiler.controller.profiler:panelAction         
     _profiler_router         ANY    ANY    ANY  /_profiler/{token}/router         web_profiler.controller.router:panelAction           
     _profiler_exception      ANY    ANY    ANY  /_profiler/{token}/exception      web_profiler.controller.exception:showAction         
     _profiler_exception_css  ANY    ANY    ANY  /_profiler/{token}/exception.css  web_profiler.controller.exception:cssAction          
     _configurator_home       ANY    ANY    ANY  /_configurator/                   SensioDistributionBundle:Configurator:check          
     _configurator_step       ANY    ANY    ANY  /_configurator/step/{index}       SensioDistributionBundle:Configurator:step           
     _configurator_final      ANY    ANY    ANY  /_configurator/final              SensioDistributionBundle:Configurator:final          
     _twig_error_test         ANY    ANY    ANY  /_error/{code}.{_format}          twig.controller.preview_error:previewErrorPageAction 
     epsi_blog_default_index  ANY    ANY    ANY  /hello/{name}                     EpsiBlogBundle:Default:index                         
     homepage                 ANY    ANY    ANY  /                                 AppBundle:Default:index

..
    Créons les premières routes de notre blog :

    .. literalinclude:: /code-block/routing/routing.yml
        :language: yaml
        :lines: 1-11

**************
Fonctionnement
**************

Les routes sont composés à minima de trois éléments suivants :

* un **identifiant**. Il doit être unique dans l'application. Quand on utilise les annotations, Symfony génère lui même cet identifiant. Pour les autres configurations, il faudra le faire à la main ;
* un **chemin** (``path``). C'est URL de la route. Les éléments entre ``{}`` sont des paramètres de l'URL, comme l'ID d'un objet ;
* le **contrôleur** à appeler.

Voici comment fonctionne le routeur pas à pas :

#. On appelle l'URL ``/hello/World`` ;
#. Le routeur essaie de faire correspondre cette URL avec le chemin de chaque route. On d'ailleurs le voir dans le profiler :

    .. image:: /_static/images/profiler_routes.png
        :align: center
        :class: box

#. Le routeur s'arrête dès qu'il a trouvé un route qui correspond ;
#. À partir de la route, il trouve qu'il faut appelé le contrôleur ``EpsiBlogBundle:Default:index`` avec comme paramètre ``name = World`` ;
#. Le routeur renvoie donc ces informations au Kernel ;
#. Le noyau va exécuter le contrôleur.

Dans le cas où le routeur ne trouve pas de correspondance pour une URL, il renvoi une erreur 404, comme par exemple pour la page, http://symfony.loc.epsi.fr/app_dev.php/hello/The/World :

    .. image:: /_static/images/symfony_exception.png
        :align: center
        :class: box

    En haut de la page est affiché un message d'erreur, un exception a été détectée.

    Dans la seconde partie, la stack trace. Il s'agit de la liste des fonctions appelées depuis le contrôleur frontal jusqu'à la ligne qui a levé l'exception.

******************************
Les annotation pour le routeur
******************************

@Route
======

* Il faut importer le namespace ``Sensio\Bundle\FrameworkExtraBundle\Configuration\Route``

* Définit le chemin avec ses paramètres

    .. code-block:: php

        /**
         * @Route("/")
         */
        public function indexAction()
        {
        }

    .. code-block:: php

        /**
         * @Route("/{id}", requirements={"id" = "\d+"}, defaults={"id" = 1})
         */
        public function showAction($id)
        {
        }

* Elle peut être utilisée avant la déclaration du contrôleur, ou avant une méthode du contrôleur

    .. code-block:: php

        /**
         * @Route("/blog")
         */
        class BlogController extends Controller
        {
            /**
             * @Route("/")
             */
            public function indexAction()
            {
            }

            /**
             * @Route("/{id}")
             */
            public function showAction($id)
            {
            }
       }

@Method
=======

* Il faut importer le namespace ``Sensio\Bundle\FrameworkExtraBundle\Configuration\Method``

* Définit la méthode HTTP utilisée

    .. code-block:: php

        /**
         * @Route("/blog")
         */
        class PostController extends Controller
        {
            /**
             * @Route("/edit/{id}")
             * @Method({"GET", "POST"})
             */
            public function editAction($id)
            {
            }

            /**
             * @Route("/update/{id}")
             * @Method({"POST"})
             */
            public function updateAction($id)
            {
            }
        }

Contrôles des paramètres des routes
-----------------------------------

Lorsq'on va sur la page http://symfony.loc.epsi.fr/app_dev.php/hello/The%20World, elle affiche "Hello The World!".

Ajoutons un validation pour vérifier que le nom soit bien un mot ou un ensemble de mots.

La validation des paramètres se fait grâce à des expressions régulières. Voici les éléments de base pour les construire :

* ``[abc]`` : le caractère "a", "b" ou "c"
* ``[^abc]`` : n'importe quel caractère sauf "a", "b", ou "c"
* ``[a-z]`` : n'importe quel caractère dans l'intervalle a-z
* ``[a-zA-Z]`` : n'importe quel caractère dans les intervalles a-z ou A-Z
* ``^`` : début de ligne
* ``$`` : fin de ligne
* ``.`` : n'importe quel caractère unique
* ``\s`` : tout caractère blanc
* ``\S`` : tout caractère qui n'est pas un caractère blanc
* ``\d`` : tout caractère décimal
* ``\D`` : tout caractère qui n'est pas un caractère décimal
* ``\w`` : tout caractère de "mot" (lettre, nombre, underscore)
* ``\W`` : tout caractère qui n'est pas un caractère de "mot"
* ``(...)`` : sous ensemble
* ``(a|b)`` : "a" ou "b"
* ``a?`` : zéro ou un "a"
* ``a*`` : zéro "a" ou plus
* ``a+`` : un "a" ou plus
* ``a{3}`` : exactement trois "a"
* ``a{3,}`` : trois "a" ou plus
* ``a{3,6}`` : entre trois ou six "a"

Le nom est une chaîne de caractères qui est composé de un ou plusieurs mots séparés par un espace, ce qui nous donne : ``(\w\s?)+``

    * un mot
    * suivit de zéro ou un espace
    * le tout répété au moins une fois

Ajoutons cette règle dans le contrôleur :

    .. code-block:: php

        # src/Epsi/Bundle/BlogBundle/Controller/DefaultController.php
        class DefaultController extends Controller
        {
            /**
             * @Route("/hello/{name}", requirements={"name" = "(\w+[\s]?)+"})
             * @Template()
             */
            public function indexAction($name)
            {
                return array('name' => $name);
            }
        }

Ensuite lorsqu'on affiche les pages suivantes

    * http://symfony.loc.epsi.fr/app_dev.php/hello/World affiche "Hello World!"
    * http://symfony.loc.epsi.fr/app_dev.php/hello/The%20World affiche "Hello The World!"
    * http://symfony.loc.epsi.fr/app_dev.php/hello/125 affiche "Hello 125"
    * http://symfony.loc.epsi.fr/app_dev.php/hello/hého affiche une message d'erreur (404).

..
    On peut également utiliser des paramètres suivants :

    .. literalinclude:: /code-block/routing/routing.yml
        :language: yaml
        :lines: 19-24

    Avec cette route, les URL suivantes vont valides :

    * http://symfony.loc.epsi.fr/app_dev.php/post/5
    * http://symfony.loc.epsi.fr/app_dev.php/post/5.html
    * http://symfony.loc.epsi.fr/app_dev.php/post/5.xml
    * http://symfony.loc.epsi.fr/app_dev.php/post/5.json

Paramètres spéciaux de routing
------------------------------

Il existe deux paramètres spéciaux :

* ``_format`` : il est utilisé pour définir le format de la requête

    Lorsque vous utilisez ce paramètre Symfony va automatique remplir le header ``Content-Type`` avec la bonne valeur en fonction du format demandé. Dans le contrôleur, on peut récupérer sa valeur avec ``$this->get('request')->getRequestFormat()``.

    .. code-block:: php

        # src/Epsi/Bundle/BlogBundle/Controller/DefaultController.php
        class DefaultController extends Controller
        {
            /**
             * @Route("/hello/{name}.{_format}", 
             *         requirements={"name" = "(\w+[\s]?)+", "format" = "html|json"}, 
             *         defaults={ "_format" = "html"})
             * @Template()
             */
            public function indexAction($name)
            {
                return array('name' => $name);
            }
        }

    Avec cette configuration :

        * http://symfony.loc.epsi.fr/app_dev.php/hello/World et http://symfony.loc.epsi.fr/app_dev.php/hello/World.html affiche la version HTML de la page ;
        * http://symfony.loc.epsi.fr/app_dev.php/hello/World.json affiche la page en json

* ``_locale`` : il est utilisé pour définir la locale de la session

    Ce paramètre permet de choisir la langue à afficher. Cette valeur sera également stockée en session pour que les futures requêtes la conservent. Dans le contrôleur, on peut récupérer sa valeur avec ``$this->get('request')->getLocale()``.

*************************
Comment générer des URL ?
*************************

Depuis un contrôleur, c'est la méthode ``$this->generateUrl()`` qu'il faut appeler. Par exemple : ``$url = $this->generateUrl( 'epsi_blog_show', array( 'id' => $id ) );``

Depuis les tempaltes Twig, on utilise l'opérateur ``path``. Par exemple : ``{{ path( 'epsi_blog_show', { 'id': article_id } ) }}``.