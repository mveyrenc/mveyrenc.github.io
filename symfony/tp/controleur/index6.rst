.. _controleur-index6:

**************
Les paramètres
**************

Dans la configuration des routes, on peut demander à Symfony de valider le format des paramètres présents dans l'URL, ainsi, Symfony s'occupe de faire la vérification à notre place.

Dans la route de l'action ``index5Action``, on veut que le paramètre ``name`` doit être une suite de mot (lettre + chiffre + espace). Pour cela, on utilise le paramètre ``requirements``,
qui valide le format d'un paramètre avec une expression régulière.

.. code-block:: php

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    class BlogController extends Controller
    {
        ...

        /**
         * @Route("/blog5/{name}", requirements={"name" = "(\w+[\s]?)+"})
         * @Template()
         */
        public function index5Action($name)
        {
            return array(
                'name' => $name,
            );
        }
    }


Allez sur les pages :

* http://symfony.loc.epsi.fr/app_dev.php/blog5/John
* http://symfony.loc.epsi.fr/app_dev.php/blog5/John1
* http://symfony.loc.epsi.fr/app_dev.php/blog5/John%20Doe
* `http://symfony.loc.epsi.fr/app_dev.php/blog5/John%20Doe%20... <http://symfony.loc.epsi.fr/app_dev.php/blog5/John%20Doe%20...>`_
