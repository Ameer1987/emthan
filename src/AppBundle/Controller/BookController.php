<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Book controller.
 *
 * @Route("book")
 */
class BookController extends Controller {

    /**
     * Lists all book entities.
     *
     * @Route("/", name="book_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('AppBundle:Book')->findAll();

        return $this->render('book/index.html.twig', array(
                    'books' => $books,
        ));
    }

    /**
     * Creates a new book entity.
     *
     * @Route("/new", name="book_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $book = new Book();
        $form = $this->createForm('AppBundle\Form\BookType', $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush($book);

            return $this->redirectToRoute('book_show', array('id' => $book->getId()));
        }

        return $this->render('book/new.html.twig', array(
                    'book' => $book,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a book entity.
     *
     * @Route("/{id}", name="book_show")
     * @Method("GET")
     */
    public function showAction(Book $book) {
        $deleteForm = $this->createDeleteForm($book);

        return $this->render('book/show.html.twig', array(
                    'book' => $book,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing book entity.
     *
     * @Route("/{id}/edit", name="book_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Book $book) {
        $deleteForm = $this->createDeleteForm($book);
        $editForm = $this->createForm('AppBundle\Form\BookType', $book);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book_edit', array('id' => $book->getId()));
        }

        return $this->render('book/edit.html.twig', array(
                    'book' => $book,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a book entity.
     *
     * @Route("/{id}", name="book_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Book $book) {
        $form = $this->createDeleteForm($book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($book);
            $em->flush($book);
        }

        return $this->redirectToRoute('book_index');
    }

    /**
     * Creates a form to delete a book entity.
     *
     * @param Book $book The book entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Book $book) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('book_delete', array('id' => $book->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * Lists all book entities.
     *
     * @Route("/view_properties/{id}", name="book_view_properties")
     * @Method("GET")
     */
    public function viewPropertiesAction($id) {
        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('AppBundle:Book')->findOneById($id);

        return $this->render('book/book_properties_view.html.twig', array(
                    'book' => $book,
        ));
    }

    /**
     * Creates a form to edit a book entity.
     *
     * @Route("/edit_properties/{book_id}", name="book_properties_edit")
     * @Method({"GET", "POST"})
     */
    public function editBookPropertiesAction($book_id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('AppBundle:Book')->findOneById($book_id);
        $form = $this->createForm('AppBundle\Form\BookType', $book);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($book);
            $em->flush($book);

            return $this->redirect($this->generateUrl('book_view_properties', array('id' => $book->getId())));
        }

        return $this->render('book/book_properties_edit.html.twig', array(
                    'book' => $book,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Deletes a book entity.
     *
     * @Route("/delete/{book_id}", name="ajax_book_delete")
     * @Method("POST")
     */
    public function deleteBookAjaxAction($book_id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('AppBundle:Book')->findOneById($book_id);
        $em->remove($book);
        $em->flush($book);

        return new \Symfony\Component\HttpFoundation\Response('success');
    }

    /**
     * Lists all book entities.
     *
     * @Route("/view_units/{id}", name="book_view_units")
     * @Method("GET")
     */
    public function viewBookUnitsAction($id) {
        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('AppBundle:Book')->findOneById($id);

        return $this->render('book/book_units_view.html.twig', array(
                    'book' => $book,
        ));
    }

    /**
     * Lists all book entities.
     *
     * @Route("/view_contents/{id}", name="book_view_contents")
     * @Method("GET")
     */
    public function viewBookContentsAction($id) {
        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('AppBundle:Book')->findOneById($id);

        return $this->render('book/book_contents_view.html.twig', array(
                    'book' => $book,
        ));
    }

}
