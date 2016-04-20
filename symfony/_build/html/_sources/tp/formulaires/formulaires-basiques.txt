##################
Formulaire basique
##################

Dans le répertoire ``Controller`` de votre bundle, créez le fichier ``TagController.php`` et ajoutez-y le code suivant :

.. code-block:: php

    namespace Epsi\Bundle\BlogBundle\Controller;

    use Epsi\Bundle\BlogBundle\Entity\Tag;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    /**
     * @Route("/tag")
     */
    class TagController extends Controller
    {
        /**
         * @Route("/new")
         * @Template()
         */
        public function newAction()
        {
            $entity = new Tag();

            $formBuilder = $this->get('form.factory')->createBuilder('form', $entity);

            $formBuilder
                ->add('name')
                ->add('submit', 'submit');

            $form = $formBuilder->getForm();

            return array(
                'form' => $form->createView(),
            );
        }
    }

Dans le répertoire ``Resources/views`` de votre bundle créez le répertoire ``Tag`` puis ajoutez le fichier ``new.html.twig``, insérez-y le code suivant :

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
            <h1>Formulaire</h1>
            {% for type, messages in app.session.flashbag.all %}
                {% for message in messages %}
                    {{ type }} : {{ message }}
                {% endfor %}
            {% endfor %}
            {{ form(form) }}
        </div>
    {% endblock %}
    {% block javascripts %}
        <script src="{{ asset('bundles/epsiblog/js/jquery-1.12.2.min.js') }}"></script>
        <script src="{{ asset('bundles/epsiblog/js/bootstrap.min.js') }}"></script>
    {% endblock %}
    </body>
    </html>

Affichez la page http://localhost/Symfony/web/app_dev.php/tag/new.

.. image:: /_static/images/tp/formulaires-basiques.png
    :align: center
    :class: box

Pour créer un formulaire dans Symfony, on ne crée pas directement un objet ``Form``. On utilise un ``FormBuilder`` pour construire le formulaire, puis on génère le ``Form`` avec le ``FormBuilder``.
Enfin, on génère un ``FormView`` pour afficher le formulaire.




