<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        if ($request->getSession()->get('year_id') !== null) {
            $year_id = $request->getSession()->get('year_id');
            $year = $em->getRepository('AppBundle:Year')->findOneById($year_id);
        } else {
            $year = $em->getRepository('AppBundle:Year')->createQueryBuilder('y')
                            ->orderBy('y.isDefault', 'DESC')
                            ->setMaxResults(1)
                            ->getQuery()->getOneOrNullResult();

            if ($year !== null) {
                $year_id = $year->getId();
                $request->getSession()->set('year_id', $year_id);
            }
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                    'year' => $year,
        ]);
    }

    /**
     * @Route("/categories/{category_id}", name="categories")
     */
    public function subjectsAction($category_id, Request $request) {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('AppBundle:Category')->findOneById($category_id);

        // replace this example code with whatever you need
        return $this->render('default/categories.html.twig', [
                    'category' => $category,
        ]);
    }
    
    /**
     * @Route("/brovas/{book_id}", name="brovas")
     */
    public function trackingAction($book_id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('AppBundle:Book')->findOneById($book_id);
        return $this->render('default/brovas.html.twig', [
                    'book' => $book,
        ]);
    }

    /**
     * @Route("/sub_books/{sub_book_id}", name="sub_books")
     */
    public function subBooksAction($sub_book_id, Request $request) {
        $em = $this->getDoctrine()->getManager();

        $sub_book = $em->getRepository('AppBundle:SubBook')->findOneById($sub_book_id);

        // replace this example code with whatever you need
        return $this->render('default/sub_books.html.twig', [
                    'sub_book' => $sub_book,
        ]);
    }

}
