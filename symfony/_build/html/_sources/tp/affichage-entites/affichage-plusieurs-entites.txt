##############################
Affichage de plusieurs entités
##############################

Dans le ``TagController`` ajouter la méthode suivante :

.. code-block:: php
    :emphasize-lines: 22-35

    namespace Epsi\Bundle\BlogBundle\Controller;

    // ...

    /**
     * @Route("/tag")
     */
    class TagController extends Controller
    {

        // ...

        /**
         * @Route("/{id}")
         * @Template()
         */
        public function showAction($id)
        {
            // ...
        }

        /**
         * @Route("/")
         * @Template()
         */
        public function indexAction()
        {
            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository('EpsiBlogBundle:Tag')->findAll();

            return array(
                'entities' => $entities,
            );
        }
    }

Dans le répertoire ``Resources/views/Tag`` de votre bundle ajoutez le fichier ``index.html.twig``, insérez-y le code suivant :

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
            <h1>Tags</h1>
            {% for type, messages in app.session.flashbag.all %}
                {% for message in messages %}
                    {{ type }} : {{ message }}
                {% endfor %}
            {% endfor %}
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                {% for entity in entities %}
                    <tr>
                        <td><a href="{{ path('epsi_blog_tag_show', { 'id': entity.id }) }}">{{ entity.id }}</a></td>
                        <td>{{ entity.name }}</td>
                        <td>
                            <ul>
                                <li>
                                    <a href="{{ path('epsi_blog_tag_show', { 'id': entity.id }) }}">show</a>
                                </li>
                                <li>
                                    <a href="{{ path('epsi_blog_tag_edit', { 'id': entity.id }) }}">edit</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                {% endfor %}
            </table>

            <ul>
                <li>
                    <a href="{{ path('epsi_blog_tag_new') }}">
                        Create a new entry
                    </a>
                </li>
            </ul>
        </div>
    {% endblock %}
    {% block javascripts %}
        <script src="{{ asset('bundles/epsiblog/js/jquery-1.12.2.min.js') }}"></script>
        <script src="{{ asset('bundles/epsiblog/js/bootstrap.min.js') }}"></script>
    {% endblock %}
    </body>
    </html>

Allez sur la page http://localhost/Symfony/web/app_dev.php/tag. Vous devriez voir la liste des tags que vous avez créé.