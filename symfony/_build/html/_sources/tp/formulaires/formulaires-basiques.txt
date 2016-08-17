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
        <script src="{{ asset('bundles/epsiblog/js/jquery-1.12.3.min.js') }}"></script>
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

Dans l'exemple ci dessus, lors de la construction du formulaire, on ne précise pas le type de champ à afficher. Symfony le détermine automatique en fonction de la nature du champ de l'entité :

* si le champ dans l'entité est un string, on aura un input text dans le formulaire,
* si le champ dans l'entité est un booléen, on aura une case à cocher dans le formulaire,
* si le champ dans l'entité est une relation, on aura un select simple ou multiple dans le formulaire,
* etc.

Cependant, on peut ajouter un paramètre à la méthode ``add`` pour forcer le type de champ affiché. Par exemple, si je fais un ``->add('name', 'text')``, le champ name sera un textarea dans le formulaire.

On peut ajouter un troisième paramètre à la méthode ``add`` pour paramétrer le champ comme par exemple lui ajouter un classe CSS. Toutes les options par tye de champ sont précisées dans la documentation de Symfony : http://symfony.com/doc/2.7/reference/forms/types.html.





