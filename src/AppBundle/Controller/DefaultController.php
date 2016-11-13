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

            $year_id = $year->getId();
            $request->getSession()->set('year_id', $year_id);
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                    'year' => $year,
        ]);
    }

}
