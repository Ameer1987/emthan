<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Booktype controller.
 *
 * @Route("booktype")
 */
class BookTypeController extends Controller
{
    /**
     * Lists all bookType entities.
     *
     * @Route("/", name="booktype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookTypes = $em->getRepository('AppBundle:BookType')->findAll();

        return $this->render('booktype/index.html.twig', array(
            'bookTypes' => $bookTypes,
        ));
    }

    /**
     * Creates a new bookType entity.
     *
     * @Route("/new", name="booktype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bookType = new Booktype();
        $form = $this->createForm('AppBundle\Form\BookTypeType', $bookType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bookType);
            $em->flush($bookType);

            return $this->redirectToRoute('booktype_show', array('id' => $bookType->getId()));
        }

        return $this->render('booktype/new.html.twig', array(
            'bookType' => $bookType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bookType entity.
     *
     * @Route("/{id}", name="booktype_show")
     * @Method("GET")
     */
    public function showAction(BookType $bookType)
    {
        $deleteForm = $this->createDeleteForm($bookType);

        return $this->render('booktype/show.html.twig', array(
            'bookType' => $bookType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bookType entity.
     *
     * @Route("/{id}/edit", name="booktype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BookType $bookType)
    {
        $deleteForm = $this->createDeleteForm($bookType);
        $editForm = $this->createForm('AppBundle\Form\BookTypeType', $bookType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('booktype_edit', array('id' => $bookType->getId()));
        }

        return $this->render('booktype/edit.html.twig', array(
            'bookType' => $bookType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bookType entity.
     *
     * @Route("/{id}", name="booktype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BookType $bookType)
    {
        $form = $this->createDeleteForm($bookType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bookType);
            $em->flush($bookType);
        }

        return $this->redirectToRoute('booktype_index');
    }

    /**
     * Creates a form to delete a bookType entity.
     *
     * @param BookType $bookType The bookType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BookType $bookType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('booktype_delete', array('id' => $bookType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
