.. _controleur-index6:

*************************
Validation des paramètres
*************************

Dans la configuration des routes, on peut demander à Symfony de valider le format des paramètres présents dans l'URL, ainsi, Symfony s'occupe de faire la vérification à notre place.

Dans la route de l'action ``index5Action``, on veut que le paramètre ``name`` doit être une suite de mot (lettre + chiffre + espace). Pour cela, on utilise le paramètre ``requirements``,
qui valide le format d'un paramètre avec une expression régulière.

.. code-block:: php
    :linenos:
    :emphasize-lines: 12

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

    class BlogController extends Controller
    {
        ...

        public function index4Action()
            ...
        {

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

.. admonition:: Expressions régulières

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