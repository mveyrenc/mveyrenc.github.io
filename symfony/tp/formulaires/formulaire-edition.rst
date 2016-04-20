####################
Formulaire d'édition
####################

Pour modifier une entité, il faut suivre le même process que pour en créer une, à l'exception qui faut passer une entité déjà existante au formulaire.

Toujours dans le ``TagController``, ajoutez l'action suivante :



.. code-block:: php
    :emphasize-lines: 19-55

    namespace Epsi\Bundle\BlogBundle\Controller;

    // ...

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
            // ...
        }

        /**
         * @Route("/{id}/edit")
         * @Template()
         */
        public function editAction(Request $request, $id)
        {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('EpsiBlogBundle:Tag')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Post entity.');
            }

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

                return $this->redirect($this->generateUrl('epsi_blog_tag_edit', array('id' => $id)));
            }

            return array(
                'form' => $form->createView(),
            );
        }
    }

Copiez le template ``new.html.twig`` pour créer le template ``edit.html.twig``.