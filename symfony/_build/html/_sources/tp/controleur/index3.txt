.. _controleur-index3:

*************************
Utilisation des templates
*************************

Les templates représentent la vue de l'architecture MVC. Il permettent de générer le code de pages web qu'elles soient en HTML, Json, XML ou tout autre format.
 
Pour appeler un template, on utilise la méthode ``render`` du service ``templating``. Cette fonction prend deux paramètres :

* le chemin du template que l'on veut appeler (chaîne de caractère)
* les données qui seront utilisables dans le template (tableau associatif)

.. note::

    Dans Symfony un service est un objet instancié par le kernel qui permet de gérer d'effectuer une tâche. On trouve par exemple les services :

    * **router** qui gère le routing
    * **mailer** pour envoyer des mails
    * **logger** pour écrire des logs
    * **request** et **response** qui gèrent la requête et la réponse du contrôleur
    * **templating** qui permet d'appeler des templates

Comme exemple, ajoutez la méthode ``index3Action`` dans le contrôleur :

.. code-block:: php
    :linenos:
    :emphasize-lines: 10-27

    class BlogController extends Controller
    {
        ...

        public function index2Action()
        {
            ...
        }

        /**
         * @Route("/blog3/{name}")
         */
        public function index3Action($name)
        {
            $response = new Response();
            $response->setContent(
                $this->get('templating')->render(
                    'EpsiBlogBundle:Blog:index3.html.twig',
                    array(
                        'name' => $name,
                    )
                )
            );
            $response->setStatusCode(Response::HTTP_OK);

            return $response;
        }
    }

Créez le template ``index3.html.twig`` dans le répertoire ``src/Epsi/Bundle/BlogBundle/Resources/views/Blog/`` avec le contenu suivant :

.. code-block:: html+jinja
    :linenos:

    Hello <b>{{ name }}</b>!

Dans l'exemple ci-dessus, nous appelons le template ``EpsiBlogBundle:Blog:index3.html.twig``. Sous Symfony, les templates sont toujours dans le répertoire ``Resources/views`` du bundle.
De plus, le chemin d'un template suit le format suivant : ``<NomDuBundle>:<Chemin>:<nom_du_template>.<format>.twig`` où :

* *NomDuBundle* : nom du bundle dans lequel se trouve le template
* *Chemin* : chemin relatif au répertoire ``Resources/views`` où se trouve le template ; par conventions c'est le nom du contrôleur ;
* *nom_du_template* : nom du fichier ; par conventions c'est le nom de l'action ;
* *format* : format de la vue : html, xml, etc.

Par conséquent, le fichier correspondant au template ``EpsiBlogBundle:Blog:index3.html.twig`` est ``Epsi/Bundle/EpsiBlogBundle/Resources/views/Blog/index3.html.twig``

Concernant les données qui seront utilisables dans le template, dans le contrôleur, elles sont représentées sous la forme d'un tableau associatif où la clé représente le nom de la variable à utiliser dans le template.

Pour tester cet exemple, allez sur la page http://symfony.loc.epsi.fr/app_dev.php/blog3/John