<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Comments;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $em = $this->getDoctrine()->getEntityManager();
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

    /**
     * @Route("/article/{article_name}", name="show_article")
     */
    public function showArticleAction(Request $request, $article_name)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('BlogBundle:Articles');
        $article = $repository->findBy(array("title" => $article_name));

        $comment = new Comments();
        $comment->setAuthor($this->getUser());
        $comment->setArticles($article);
        $comment->setDateOc(new \DateTime());
        $form = $this->createFormBuilder($comment)
            ->add('content', TextType::class, array('label' => ' ', 'data' => ''))
            ->add('save', SubmitType::class, array('label' => 'Commenter', 'attr' => array('class'=>'btn btn-primary')))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();
            $em->persist($comment);
            $em->flush();
        }

        $categories = $this->getDoctrine()
                           ->getRepository('BlogBundle:Category')
                           ->findAll();

        return $this->render('BlogBundle:Articles:show_article.html.twig', array("article" => $article, "categories" => $categories, "form" => $form->createView()));
    }
}
