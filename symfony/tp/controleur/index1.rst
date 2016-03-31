.. _controleur-index1:

************************
Création d'un contrôleur
************************

Un contrôleur est une classe PHP :

* qui se trouve dans le répertoire ``Controller`` du bundle :
* dont le nom se termine par ``Controller`` ;
* qui hérite de la classe ``Symfony\Bundle\FrameworkBundle\Controller\Controller``.

Dans le répertoire ``src/Epsi/Bundle/BlogBundle/Controller/``, créez le contrôleur suivant avec une action simple :


.. code-block:: php
    :linenos:

    namespace Epsi\Bundle\BlogBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

    class BlogController extends Controller
    {
        /**
         * @Route("/blog1")
         */
        public function index1Action()
        {
            $response = new Response();
            $response->setContent('Hello world!');
            $response->setStatusCode(Response::HTTP_OK);

            return $response;
        }
    }

Allez sur la page http://symfony.loc.epsi.fr/app_dev.php/blog1