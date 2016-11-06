<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SubBook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subbook controller.
 *
 * @Route("subbook")
 */
class SubBookController extends Controller
{
    /**
     * Lists all subBook entities.
     *
     * @Route("/", name="subbook_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subBooks = $em->getRepository('AppBundle:SubBook')->findAll();

        return $this->render('subbook/index.html.twig', array(
            'subBooks' => $subBooks,
        ));
    }

    /**
     * Creates a new subBook entity.
     *
     * @Route("/new", name="subbook_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subBook = new Subbook();
        $form = $this->createForm('AppBundle\Form\SubBookType', $subBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subBook);
            $em->flush($subBook);

            return $this->redirectToRoute('subbook_show', array('id' => $subBook->getId()));
        }

        return $this->render('subbook/new.html.twig', array(
            'subBook' => $subBook,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subBook entity.
     *
     * @Route("/{id}", name="subbook_show")
     * @Method("GET")
     */
    public function showAction(SubBook $subBook)
    {
        $deleteForm = $this->createDeleteForm($subBook);

        return $this->render('subbook/show.html.twig', array(
            'subBook' => $subBook,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subBook entity.
     *
     * @Route("/{id}/edit", name="subbook_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SubBook $subBook)
    {
        $deleteForm = $this->createDeleteForm($subBook);
        $editForm = $this->createForm('AppBundle\Form\SubBookType', $subBook);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subbook_edit', array('id' => $subBook->getId()));
        }

        return $this->render('subbook/edit.html.twig', array(
            'subBook' => $subBook,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subBook entity.
     *
     * @Route("/{id}", name="subbook_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SubBook $subBook)
    {
        $form = $this->createDeleteForm($subBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subBook);
            $em->flush($subBook);
        }

        return $this->redirectToRoute('subbook_index');
    }

    /**
     * Creates a form to delete a subBook entity.
     *
     * @param SubBook $subBook The subBook entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubBook $subBook)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subbook_delete', array('id' => $subBook->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
