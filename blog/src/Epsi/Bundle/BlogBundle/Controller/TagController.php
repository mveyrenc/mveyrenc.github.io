<?php

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

    /**
     * Finds and displays a Post entity.
     *
     * @Route("/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EpsiBlogBundle:Tag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        return array(
            'entity' => $entity,
        );
    }

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EpsiBlogBundle:Tag')->findAll();

        return array(
            'entities' => $entities,
        );
    }
}
