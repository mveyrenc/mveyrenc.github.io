######################
Affichage d'une entité
######################

Dans le ``TagController`` ajouter la méthode suivante :

.. code-block:: php
    :emphasize-lines: 22-39

    namespace Epsi\Bundle\BlogBundle\Controller;

    // ...

    /**
     * @Route("/tag")
     */
    class TagController extends Controller
    {

        // ...

        /**
         * @Route("/{id}/edit")
         * @Template()
         */
        public function editAction(Request $request, $id)
        {
            // ...
        }

        /**
         * @Route("/{id}")
         * @Template()
         */
        public function showAction($id)
        {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('EpsiBlogBundle:Tag')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find tag entity.');
            }

            return array(
                'entity' => $entity,
            );
        }
    }

Dans le répertoire ``Resources/views/Tag`` de votre bundle ajoutez le fichier ``show.html.twig``, insérez-y le code suivant :

.. code-block:: html+jinja

    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equic="Content-type" content="text/html; charset=utf-8"/>
        {% block stylesheets %}
            <link href="{{ asset('bundles/epsiblog/css/bootstrap.min.css') }}" rel="stylesheet"/>
            <link href="{{ asset('bundles/epsiblog/css/bootstrap-theme.css') }}" rel="stylesheet"/>
        {% endblock %}
    </head>
    <body>
    {% block body %}
        <div class="container">
            <h1>{{ entity.name }}</h1>
            {% for type, messages in app.session.flashbag.all %}
                {% for message in messages %}
                    {{ type }} : {{ message }}
                {% endfor %}
            {% endfor %}
        </div>
    {% endblock %}
    {% block javascripts %}
        <script src="{{ asset('bundles/epsiblog/js/jquery-1.12.2.min.js') }}"></script>
        <script src="{{ asset('bundles/epsiblog/js/bootstrap.min.js') }}"></script>
    {% endblock %}
    </body>
    </html>

Allez sur la page http://localhost/Symfony/web/app_dev.php/tag/1. Vous devriez voir le nom de votre tag s'affichez.