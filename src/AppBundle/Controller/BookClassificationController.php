<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BookClassification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bookclassification controller.
 *
 * @Route("bookclassification")
 */
class BookClassificationController extends Controller
{
    /**
     * Lists all bookClassification entities.
     *
     * @Route("/", name="bookclassification_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookClassifications = $em->getRepository('AppBundle:BookClassification')->findAll();

        return $this->render('bookclassification/index.html.twig', array(
            'bookClassifications' => $bookClassifications,
        ));
    }

    /**
     * Creates a new bookClassification entity.
     *
     * @Route("/new", name="bookclassification_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bookClassification = new Bookclassification();
        $form = $this->createForm('AppBundle\Form\BookClassificationType', $bookClassification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bookClassification);
            $em->flush($bookClassification);

            return $this->redirectToRoute('bookclassification_show', array('id' => $bookClassification->getId()));
        }

        return $this->render('bookclassification/new.html.twig', array(
            'bookClassification' => $bookClassification,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bookClassification entity.
     *
     * @Route("/{id}", name="bookclassification_show")
     * @Method("GET")
     */
    public function showAction(BookClassification $bookClassification)
    {
        $deleteForm = $this->createDeleteForm($bookClassification);

        return $this->render('bookclassification/show.html.twig', array(
            'bookClassification' => $bookClassification,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bookClassification entity.
     *
     * @Route("/{id}/edit", name="bookclassification_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BookClassification $bookClassification)
    {
        $deleteForm = $this->createDeleteForm($bookClassification);
        $editForm = $this->createForm('AppBundle\Form\BookClassificationType', $bookClassification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bookclassification_edit', array('id' => $bookClassification->getId()));
        }

        return $this->render('bookclassification/edit.html.twig', array(
            'bookClassification' => $bookClassification,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bookClassification entity.
     *
     * @Route("/{id}", name="bookclassification_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BookClassification $bookClassification)
    {
        $form = $this->createDeleteForm($bookClassification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bookClassification);
            $em->flush($bookClassification);
        }

        return $this->redirectToRoute('bookclassification_index');
    }

    /**
     * Creates a form to delete a bookClassification entity.
     *
     * @param BookClassification $bookClassification The bookClassification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BookClassification $bookClassification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bookclassification_delete', array('id' => $bookClassification->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
