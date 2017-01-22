<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BookContent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bookcontent controller.
 *
 * @Route("bookcontent")
 */
class BookContentController extends Controller
{
    /**
     * Lists all bookContent entities.
     *
     * @Route("/", name="bookcontent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookContents = $em->getRepository('AppBundle:BookContent')->findAll();

        return $this->render('bookcontent/index.html.twig', array(
            'bookContents' => $bookContents,
        ));
    }

    /**
     * Creates a new bookContent entity.
     *
     * @Route("/new", name="bookcontent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bookContent = new Bookcontent();
        $form = $this->createForm('AppBundle\Form\BookContentType', $bookContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bookContent);
            $em->flush($bookContent);

            return $this->redirectToRoute('bookcontent_show', array('id' => $bookContent->getId()));
        }

        return $this->render('bookcontent/new.html.twig', array(
            'bookContent' => $bookContent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bookContent entity.
     *
     * @Route("/{id}", name="bookcontent_show")
     * @Method("GET")
     */
    public function showAction(BookContent $bookContent)
    {
        $deleteForm = $this->createDeleteForm($bookContent);

        return $this->render('bookcontent/show.html.twig', array(
            'bookContent' => $bookContent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bookContent entity.
     *
     * @Route("/{id}/edit", name="bookcontent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BookContent $bookContent)
    {
        $deleteForm = $this->createDeleteForm($bookContent);
        $editForm = $this->createForm('AppBundle\Form\BookContentType', $bookContent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bookcontent_edit', array('id' => $bookContent->getId()));
        }

        return $this->render('bookcontent/edit.html.twig', array(
            'bookContent' => $bookContent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bookContent entity.
     *
     * @Route("/{id}", name="bookcontent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BookContent $bookContent)
    {
        $form = $this->createDeleteForm($bookContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bookContent);
            $em->flush($bookContent);
        }

        return $this->redirectToRoute('bookcontent_index');
    }

    /**
     * Creates a form to delete a bookContent entity.
     *
     * @param BookContent $bookContent The bookContent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BookContent $bookContent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bookcontent_delete', array('id' => $bookContent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
