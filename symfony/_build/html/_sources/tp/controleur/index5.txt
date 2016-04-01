.. _controleur-index5:

***************************************************
Utilisation des templates avec encore moins de code
***************************************************

Pour écrire encore moins de code, on peut utiliser l'annotation ``@Template`` qui va remplacer l'appel à la méthode render du contrôleur. Dans ce cas, l'action doit juste renvoyer le tableau des paramètres à passer au template.

Ajoutez une nouvelle action dans le contrôleur :

.. code-block:: php
    :linenos:
    :emphasize-lines: 1,12-21

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    class BlogController extends Controller
    {
        ...

        public function index4Action()
        {
            ...
        }

        /**
         * @Route("/blog5/{name}")
         * @Template()
         */
        public function index5Action($name)
        {
            return array(
                'name' => $name,
            );
        }
    }

Comme vous pouvez l'observez, on ne spécifie pas le chemin du template dans l'annotation ``@Template``, ceci permet d'utiliser automatiquement le chemin normalisé. Ici, ``EpsiBlogBundle:Blog:index5.html.twig``.

Pour le template ``EpsiBlogBundle:Blog:index5.html.twig``, on copie le template ``EpsiBlogBundle:Blog:index3.html.twig``.

Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/blog5/John