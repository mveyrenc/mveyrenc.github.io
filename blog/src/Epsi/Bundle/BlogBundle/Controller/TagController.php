<?php

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
