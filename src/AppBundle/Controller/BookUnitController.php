<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BookUnit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bookunit controller.
 *
 * @Route("bookunit")
 */
class BookUnitController extends Controller
{
    /**
     * Lists all bookUnit entities.
     *
     * @Route("/", name="bookunit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookUnits = $em->getRepository('AppBundle:BookUnit')->findAll();

        return $this->render('bookunit/index.html.twig', array(
            'bookUnits' => $bookUnits,
        ));
    }

    /**
     * Creates a new bookUnit entity.
     *
     * @Route("/new", name="bookunit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bookUnit = new Bookunit();
        $form = $this->createForm('AppBundle\Form\BookUnitType', $bookUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bookUnit);
            $em->flush($bookUnit);

            return $this->redirectToRoute('bookunit_show', array('id' => $bookUnit->getId()));
        }

        return $this->render('bookunit/new.html.twig', array(
            'bookUnit' => $bookUnit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bookUnit entity.
     *
     * @Route("/{id}", name="bookunit_show")
     * @Method("GET")
     */
    public function showAction(BookUnit $bookUnit)
    {
        $deleteForm = $this->createDeleteForm($bookUnit);

        return $this->render('bookunit/show.html.twig', array(
            'bookUnit' => $bookUnit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bookUnit entity.
     *
     * @Route("/{id}/edit", name="bookunit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BookUnit $bookUnit)
    {
        $deleteForm = $this->createDeleteForm($bookUnit);
        $editForm = $this->createForm('AppBundle\Form\BookUnitType', $bookUnit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bookunit_edit', array('id' => $bookUnit->getId()));
        }

        return $this->render('bookunit/edit.html.twig', array(
            'bookUnit' => $bookUnit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bookUnit entity.
     *
     * @Route("/{id}", name="bookunit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BookUnit $bookUnit)
    {
        $form = $this->createDeleteForm($bookUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bookUnit);
            $em->flush($bookUnit);
        }

        return $this->redirectToRoute('bookunit_index');
    }

    /**
     * Creates a form to delete a bookUnit entity.
     *
     * @param BookUnit $bookUnit The bookUnit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BookUnit $bookUnit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bookunit_delete', array('id' => $bookUnit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
