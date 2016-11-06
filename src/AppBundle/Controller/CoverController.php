<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cover;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cover controller.
 *
 * @Route("cover")
 */
class CoverController extends Controller
{
    /**
     * Lists all cover entities.
     *
     * @Route("/", name="cover_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $covers = $em->getRepository('AppBundle:Cover')->findAll();

        return $this->render('cover/index.html.twig', array(
            'covers' => $covers,
        ));
    }

    /**
     * Creates a new cover entity.
     *
     * @Route("/new", name="cover_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cover = new Cover();
        $form = $this->createForm('AppBundle\Form\CoverType', $cover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cover);
            $em->flush($cover);

            return $this->redirectToRoute('cover_show', array('id' => $cover->getId()));
        }

        return $this->render('cover/new.html.twig', array(
            'cover' => $cover,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cover entity.
     *
     * @Route("/{id}", name="cover_show")
     * @Method("GET")
     */
    public function showAction(Cover $cover)
    {
        $deleteForm = $this->createDeleteForm($cover);

        return $this->render('cover/show.html.twig', array(
            'cover' => $cover,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cover entity.
     *
     * @Route("/{id}/edit", name="cover_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cover $cover)
    {
        $deleteForm = $this->createDeleteForm($cover);
        $editForm = $this->createForm('AppBundle\Form\CoverType', $cover);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cover_edit', array('id' => $cover->getId()));
        }

        return $this->render('cover/edit.html.twig', array(
            'cover' => $cover,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cover entity.
     *
     * @Route("/{id}", name="cover_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cover $cover)
    {
        $form = $this->createDeleteForm($cover);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cover);
            $em->flush($cover);
        }

        return $this->redirectToRoute('cover_index');
    }

    /**
     * Creates a form to delete a cover entity.
     *
     * @param Cover $cover The cover entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cover $cover)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cover_delete', array('id' => $cover->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
