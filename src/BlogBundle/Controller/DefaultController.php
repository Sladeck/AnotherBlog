<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM BlogBundle:Articles a ORDER BY a.dateOc DESC";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );

        $categories = $this->getDoctrine()
                           ->getRepository('BlogBundle:Category')
                           ->findAll();

        return $this->render('BlogBundle:Base:index.html.twig', array('pagination' => $pagination, "categories"=>$categories));
    }

    /**
     * @Route("/category/{category_name}", name="get_by_category")
     */
    public function getByCategoryAction(Request $request, $category_name)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM BlogBundle:Articles a LEFT JOIN a.category c WHERE c.name='" . $category_name . "'";
        $query = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5
        );
        $categories = $this->getDoctrine()
                           ->getRepository('BlogBundle:Category')
                           ->findAll();

        return $this->render('BlogBundle:Base:index.html.twig', array("categories" => $categories, 'pagination' => $pagination));
    }
}
