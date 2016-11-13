<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Term;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Term controller.
 *
 * @Route("term")
 */
class TermController extends Controller
{
    /**
     * Lists all term entities.
     *
     * @Route("/", name="term_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $terms = $em->getRepository('AppBundle:Term')->findAll();

        return $this->render('term/index.html.twig', array(
            'terms' => $terms,
        ));
    }

    /**
     * Creates a new term entity.
     *
     * @Route("/new", name="term_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $term = new Term();
        $form = $this->createForm('AppBundle\Form\TermType', $term);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($term);
            $em->flush($term);

            return $this->redirectToRoute('term_show', array('id' => $term->getId()));
        }

        return $this->render('term/new.html.twig', array(
            'term' => $term,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a term entity.
     *
     * @Route("/{id}", name="term_show")
     * @Method("GET")
     */
    public function showAction(Term $term)
    {
        $deleteForm = $this->createDeleteForm($term);

        return $this->render('term/show.html.twig', array(
            'term' => $term,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing term entity.
     *
     * @Route("/{id}/edit", name="term_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Term $term)
    {
        $deleteForm = $this->createDeleteForm($term);
        $editForm = $this->createForm('AppBundle\Form\TermType', $term);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('term_edit', array('id' => $term->getId()));
        }

        return $this->render('term/edit.html.twig', array(
            'term' => $term,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a term entity.
     *
     * @Route("/{id}", name="term_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Term $term)
    {
        $form = $this->createDeleteForm($term);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($term);
            $em->flush($term);
        }

        return $this->redirectToRoute('term_index');
    }

    /**
     * Creates a form to delete a term entity.
     *
     * @param Term $term The term entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Term $term)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('term_delete', array('id' => $term->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
