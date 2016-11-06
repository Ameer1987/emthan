<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Brova;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Brova controller.
 *
 * @Route("brova")
 */
class BrovaController extends Controller
{
    /**
     * Lists all brova entities.
     *
     * @Route("/", name="brova_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $brovas = $em->getRepository('AppBundle:Brova')->findAll();

        return $this->render('brova/index.html.twig', array(
            'brovas' => $brovas,
        ));
    }

    /**
     * Creates a new brova entity.
     *
     * @Route("/new", name="brova_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $brova = new Brova();
        $form = $this->createForm('AppBundle\Form\BrovaType', $brova);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($brova);
            $em->flush($brova);

            return $this->redirectToRoute('brova_show', array('id' => $brova->getId()));
        }

        return $this->render('brova/new.html.twig', array(
            'brova' => $brova,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a brova entity.
     *
     * @Route("/{id}", name="brova_show")
     * @Method("GET")
     */
    public function showAction(Brova $brova)
    {
        $deleteForm = $this->createDeleteForm($brova);

        return $this->render('brova/show.html.twig', array(
            'brova' => $brova,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing brova entity.
     *
     * @Route("/{id}/edit", name="brova_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Brova $brova)
    {
        $deleteForm = $this->createDeleteForm($brova);
        $editForm = $this->createForm('AppBundle\Form\BrovaType', $brova);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('brova_edit', array('id' => $brova->getId()));
        }

        return $this->render('brova/edit.html.twig', array(
            'brova' => $brova,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a brova entity.
     *
     * @Route("/{id}", name="brova_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Brova $brova)
    {
        $form = $this->createDeleteForm($brova);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($brova);
            $em->flush($brova);
        }

        return $this->redirectToRoute('brova_index');
    }

    /**
     * Creates a form to delete a brova entity.
     *
     * @param Brova $brova The brova entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Brova $brova)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('brova_delete', array('id' => $brova->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
