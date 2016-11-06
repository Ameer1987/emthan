<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SubBookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subbooktype controller.
 *
 * @Route("subbooktype")
 */
class SubBookTypeController extends Controller
{
    /**
     * Lists all subBookType entities.
     *
     * @Route("/", name="subbooktype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subBookTypes = $em->getRepository('AppBundle:SubBookType')->findAll();

        return $this->render('subbooktype/index.html.twig', array(
            'subBookTypes' => $subBookTypes,
        ));
    }

    /**
     * Creates a new subBookType entity.
     *
     * @Route("/new", name="subbooktype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subBookType = new Subbooktype();
        $form = $this->createForm('AppBundle\Form\SubBookTypeType', $subBookType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subBookType);
            $em->flush($subBookType);

            return $this->redirectToRoute('subbooktype_show', array('id' => $subBookType->getId()));
        }

        return $this->render('subbooktype/new.html.twig', array(
            'subBookType' => $subBookType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subBookType entity.
     *
     * @Route("/{id}", name="subbooktype_show")
     * @Method("GET")
     */
    public function showAction(SubBookType $subBookType)
    {
        $deleteForm = $this->createDeleteForm($subBookType);

        return $this->render('subbooktype/show.html.twig', array(
            'subBookType' => $subBookType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subBookType entity.
     *
     * @Route("/{id}/edit", name="subbooktype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SubBookType $subBookType)
    {
        $deleteForm = $this->createDeleteForm($subBookType);
        $editForm = $this->createForm('AppBundle\Form\SubBookTypeType', $subBookType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subbooktype_edit', array('id' => $subBookType->getId()));
        }

        return $this->render('subbooktype/edit.html.twig', array(
            'subBookType' => $subBookType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subBookType entity.
     *
     * @Route("/{id}", name="subbooktype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SubBookType $subBookType)
    {
        $form = $this->createDeleteForm($subBookType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subBookType);
            $em->flush($subBookType);
        }

        return $this->redirectToRoute('subbooktype_index');
    }

    /**
     * Creates a form to delete a subBookType entity.
     *
     * @param SubBookType $subBookType The subBookType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubBookType $subBookType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subbooktype_delete', array('id' => $subBookType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
