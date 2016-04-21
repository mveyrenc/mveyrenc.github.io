##########################
Soumission d'un formulaire
##########################

Reprenez la méthode ``newAction`` du ``TagController`` et ajoutez les lignes surlignées :

.. code-block:: php
    :emphasize-lines: 7,18,30-39

    namespace Epsi\Bundle\BlogBundle\Controller;

    use Epsi\Bundle\BlogBundle\Entity\Tag;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
    use Symfony\Component\HttpFoundation\Request;

    /**
     * @Route("/tag")
     */
    class TagController extends Controller
    {
        /**
         * @Route("/new")
         * @Template()
         */
        public function newAction(Request $request)
        {
            $entity = new Tag();

            $formBuilder = $this->get('form.factory')->createBuilder('form', $entity);

            $formBuilder
                ->add('name')
                ->add('submit', 'submit');

            $form = $formBuilder->getForm();

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Tag bien enregistré.');

                return $this->redirect($this->generateUrl('epsi_blog_tag_new'));
            }

            return array(
                'form' => $form->createView(),
            );
        }
    }

Pour soumettre un formulaire, il faut construire le formulaire, comme pour l'affichage, puis on lui passe la requête reçue qui contient les données soumises par l'utilisateur. La méthode ``handleRequest`` hydrate notre objet ``$entity``. Donc en sortant de cette méthode, nous avons un tag rempli avec le nom saisi dans le formulaire. Mais avant de le sauvegrader, il faut vérifier que les données qu'il contient sont correctes.

Lorsque les données sont validée, il faut passer à l'enregistrement de notre objet. En premier lieu il faut récupérer l'entity manager, c'est lui qui gère les interractions avec la base de données,
Ensuite, on demande à l'entity manager de persister, autrement dit, enregistrer notre entité.
Pour finir, on flush l'entity manager. C'est à ce moment qu'il va exécuter les requêtes pour insérer, modifier ou supprimer des entrées dans la base de données.

En plus des méthodes ``persist`` et ``flush``, l'EntityManager dispose d'autres méthodes intéressantes :

* ``clear( $entity )`` : annule tous les ``persist`` effectués. Si un nom d'entité est passé en paramètre, alors seuls les ``persist`` sur les entités de ce type seront annulés
* ``detach( $entity )`` : annule le ``persist`` sur l'entité passé en argument
* ``contains( $entity )`` : retourne ``true`` si l'entité est gérée pas l'EntityManager, c'est à dire s'il y a eu un ``persist`` sur l'entité
* ``refresh( $entity )`` : met à jour l'entité donnée en argument dans l'état où elle est en base de données
* ``remove( $entity )`` : supprime l'entité donnée en argument de la base de données lors du prochain ``flush``

Allez sur la page http://localhost/Symfony/web/app_dev.php/tag/new et testez le formulaire.