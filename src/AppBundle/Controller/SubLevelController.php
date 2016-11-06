<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SubLevel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sublevel controller.
 *
 * @Route("sublevel")
 */
class SubLevelController extends Controller
{
    /**
     * Lists all subLevel entities.
     *
     * @Route("/", name="sublevel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subLevels = $em->getRepository('AppBundle:SubLevel')->findAll();

        return $this->render('sublevel/index.html.twig', array(
            'subLevels' => $subLevels,
        ));
    }

    /**
     * Creates a new subLevel entity.
     *
     * @Route("/new", name="sublevel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subLevel = new Sublevel();
        $form = $this->createForm('AppBundle\Form\SubLevelType', $subLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subLevel);
            $em->flush($subLevel);

            return $this->redirectToRoute('sublevel_show', array('id' => $subLevel->getId()));
        }

        return $this->render('sublevel/new.html.twig', array(
            'subLevel' => $subLevel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subLevel entity.
     *
     * @Route("/{id}", name="sublevel_show")
     * @Method("GET")
     */
    public function showAction(SubLevel $subLevel)
    {
        $deleteForm = $this->createDeleteForm($subLevel);

        return $this->render('sublevel/show.html.twig', array(
            'subLevel' => $subLevel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subLevel entity.
     *
     * @Route("/{id}/edit", name="sublevel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SubLevel $subLevel)
    {
        $deleteForm = $this->createDeleteForm($subLevel);
        $editForm = $this->createForm('AppBundle\Form\SubLevelType', $subLevel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sublevel_edit', array('id' => $subLevel->getId()));
        }

        return $this->render('sublevel/edit.html.twig', array(
            'subLevel' => $subLevel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subLevel entity.
     *
     * @Route("/{id}", name="sublevel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SubLevel $subLevel)
    {
        $form = $this->createDeleteForm($subLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subLevel);
            $em->flush($subLevel);
        }

        return $this->redirectToRoute('sublevel_index');
    }

    /**
     * Creates a form to delete a subLevel entity.
     *
     * @param SubLevel $subLevel The subLevel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubLevel $subLevel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sublevel_delete', array('id' => $subLevel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
