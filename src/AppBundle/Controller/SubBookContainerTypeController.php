<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SubBookContainerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subbookcontainertype controller.
 *
 * @Route("subbookcontainertype")
 */
class SubBookContainerTypeController extends Controller
{
    /**
     * Lists all subBookContainerType entities.
     *
     * @Route("/", name="subbookcontainertype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subBookContainerTypes = $em->getRepository('AppBundle:SubBookContainerType')->findAll();

        return $this->render('subbookcontainertype/index.html.twig', array(
            'subBookContainerTypes' => $subBookContainerTypes,
        ));
    }

    /**
     * Creates a new subBookContainerType entity.
     *
     * @Route("/new", name="subbookcontainertype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subBookContainerType = new Subbookcontainertype();
        $form = $this->createForm('AppBundle\Form\SubBookContainerTypeType', $subBookContainerType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subBookContainerType);
            $em->flush($subBookContainerType);

            return $this->redirectToRoute('subbookcontainertype_show', array('id' => $subBookContainerType->getId()));
        }

        return $this->render('subbookcontainertype/new.html.twig', array(
            'subBookContainerType' => $subBookContainerType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subBookContainerType entity.
     *
     * @Route("/{id}", name="subbookcontainertype_show")
     * @Method("GET")
     */
    public function showAction(SubBookContainerType $subBookContainerType)
    {
        $deleteForm = $this->createDeleteForm($subBookContainerType);

        return $this->render('subbookcontainertype/show.html.twig', array(
            'subBookContainerType' => $subBookContainerType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subBookContainerType entity.
     *
     * @Route("/{id}/edit", name="subbookcontainertype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SubBookContainerType $subBookContainerType)
    {
        $deleteForm = $this->createDeleteForm($subBookContainerType);
        $editForm = $this->createForm('AppBundle\Form\SubBookContainerTypeType', $subBookContainerType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subbookcontainertype_edit', array('id' => $subBookContainerType->getId()));
        }

        return $this->render('subbookcontainertype/edit.html.twig', array(
            'subBookContainerType' => $subBookContainerType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subBookContainerType entity.
     *
     * @Route("/{id}", name="subbookcontainertype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SubBookContainerType $subBookContainerType)
    {
        $form = $this->createDeleteForm($subBookContainerType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subBookContainerType);
            $em->flush($subBookContainerType);
        }

        return $this->redirectToRoute('subbookcontainertype_index');
    }

    /**
     * Creates a form to delete a subBookContainerType entity.
     *
     * @param SubBookContainerType $subBookContainerType The subBookContainerType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubBookContainerType $subBookContainerType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subbookcontainertype_delete', array('id' => $subBookContainerType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
