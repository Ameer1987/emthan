<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Employeetype controller.
 *
 * @Route("employeetype")
 */
class EmployeeTypeController extends Controller
{
    /**
     * Lists all employeeType entities.
     *
     * @Route("/", name="employeetype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employeeTypes = $em->getRepository('AppBundle:EmployeeType')->findAll();

        return $this->render('employeetype/index.html.twig', array(
            'employeeTypes' => $employeeTypes,
        ));
    }

    /**
     * Creates a new employeeType entity.
     *
     * @Route("/new", name="employeetype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $employeeType = new Employeetype();
        $form = $this->createForm('AppBundle\Form\EmployeeTypeType', $employeeType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employeeType);
            $em->flush($employeeType);

            return $this->redirectToRoute('employeetype_show', array('id' => $employeeType->getId()));
        }

        return $this->render('employeetype/new.html.twig', array(
            'employeeType' => $employeeType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employeeType entity.
     *
     * @Route("/{id}", name="employeetype_show")
     * @Method("GET")
     */
    public function showAction(EmployeeType $employeeType)
    {
        $deleteForm = $this->createDeleteForm($employeeType);

        return $this->render('employeetype/show.html.twig', array(
            'employeeType' => $employeeType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing employeeType entity.
     *
     * @Route("/{id}/edit", name="employeetype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EmployeeType $employeeType)
    {
        $deleteForm = $this->createDeleteForm($employeeType);
        $editForm = $this->createForm('AppBundle\Form\EmployeeTypeType', $employeeType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employeetype_edit', array('id' => $employeeType->getId()));
        }

        return $this->render('employeetype/edit.html.twig', array(
            'employeeType' => $employeeType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a employeeType entity.
     *
     * @Route("/{id}", name="employeetype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EmployeeType $employeeType)
    {
        $form = $this->createDeleteForm($employeeType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employeeType);
            $em->flush($employeeType);
        }

        return $this->redirectToRoute('employeetype_index');
    }

    /**
     * Creates a form to delete a employeeType entity.
     *
     * @param EmployeeType $employeeType The employeeType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EmployeeType $employeeType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employeetype_delete', array('id' => $employeeType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
