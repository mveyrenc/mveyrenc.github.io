.. _controleur-index3:

*************************
Utilisation des templates
*************************

Comme on ne peux pas générer tous le code HTML dans le corps de la fonction du contrôleur, on utilise des templates qui représentent la vue de l'architecture MVC.

Ajoutez la méthode ``index3Action`` dans le contrôleur :

.. code-block:: php
    :linenos:
    :emphasize-lines: 9-26

    class BlogController extends Controller
    {
        ...

        public function index2Action()
            ...
        {

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

.. important::

    Les templates sont toujours dans le répertoire ``Resources/views`` du bundle.

    Le chemin d'un template suit le format suivant : ``<NomDuBundle>:<Chemin>:<nom_du_template>.<format>.twig`` où :

    * *NomDuBundle* : nom du bundle dans lequel se trouve le template
    * *Chemin* : chemin relatif au répertoire ``Resources/views`` où se trouve le template ; par conventions c'est le nom du contrôleur ;
    * *nom_du_template* : nom du fichier ; par conventions c'est le nom de l'action ;
    * *format* : format de la vue : html, xml, etc.

Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/blog3/John