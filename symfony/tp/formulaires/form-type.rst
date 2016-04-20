#############
Les FormTypes
#############

Les FormTypes permettent de contruire des formulaires réutilisables comme par exemple entre une action d'ajout ou de modification.

Dans un terminal, lancez la commande suivante :

.. code-block:: console

    $ php app/console generate:doctrine:form EpsiBlogBundle:Tag

Cette commande a généré une classe dans le répertoire ``Form`` :

.. code-block:: php

    namespace Epsi\Bundle\BlogBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolverInterface;

    class TagType extends AbstractType
    {
        /**
         * @param FormBuilderInterface $builder
         * @param array $options
         */
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('name')
                ->add('posts')
            ;
        }

        /**
         * @param OptionsResolverInterface $resolver
         */
        public function setDefaultOptions(OptionsResolverInterface $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'Epsi\Bundle\BlogBundle\Entity\Tag'
            ));
        }

        /**
         * @return string
         */
        public function getName()
        {
            return 'epsi_bundle_blogbundle_tag';
        }
    }

Les FormTypes ont toujours la même structure :

* ils héritent de la classe ``AbstractType``
* la méthode ``buildForm`` permet de construire le formulaire
* dans la méthode ``setDefaultOptions`` on l'associe à l'entité que le formulaire manipule
* la méthode ``getName`` pour donner un nom au formulaire

Pour utiliser le FormType dans le contrôleur :

.. code-block:: php
    :emphasize-lines: 4,23-24,56-57

    namespace Epsi\Bundle\BlogBundle\Controller;

    use Epsi\Bundle\BlogBundle\Entity\Tag;
    use Epsi\Bundle\BlogBundle\Form\TagType;
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

            $form = $this->createForm(new TagType(), $entity);
            $form->add('submit', 'submit', array('label' => 'Add'));

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

            $form = $this->createForm(new TagType(), $entity);
            $form->add('submit', 'submit', array('label' => 'Update'));

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

