<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\ArticleBlogType;
use AppBundle\Entity\ArticleBlog;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

    public function showArticleAction($id){
        
        $em = $this->getDoctrine()->getManager();
        $articleBlog = $em->getRepository('AppBundle:ArticleBlog')->findOneById($id);
        
        // articleBlog exist
        if (!$articleBlog) {
            throw $this->createNotFoundException(
                    '[ArticleBlog] No found for id ' . $id
            );
        }
        
        $lang = $this->get('request')->getLocale();
        
        return $this->render('AppBundle:Blog:articleBlog.show.html.twig', array(
            'articleBlog' => $articleBlog,
            'lang'      => $lang
        ));
    }

     public function listArticleAction(Request $request){
        // Variable
        $page           = $request->get('page');

        $em             = $this->getDoctrine()->getManager();
        $articlesBlog   = $em->getRepository('AppBundle:ArticleBlog')->findAll();

        // Lang
        $lang = $this->get('request')->getLocale();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $articlesBlog, 
            $request->query->getInt('page', $page || 1 ), //page number
            20 // limit per page
        );


        return $this->render('AppBundle:Blog:articleBlog.list.html.twig', array(
            'articlesBlogs' => $pagination,
            'lang'          => $lang
        ));
    } 
    
     public function createArticleAction(){
        $articleBlog = new ArticleBlog();
        
        
      

        //Create form
        $form = $this->get('form.factory')->create(new ArticleBlogType, $articleBlog);
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        	 
       
	        if ($form->isValid()) {
	            $em = $this->getDoctrine()->getManager();
	            $em->persist($articleBlog);
	            $em->flush();
	            
	            return $this->redirectToRoute('app_admin_articleBlogList');
	        }
        

        return $this->render('AppBundle:Blog:articleBlog.create.html.twig', array(
                'form' => $form->createView()
        ));
    }

    
    public function editArticleAction($id){
        
        //Get ArticleBlog by Id
        $em             = $this->getDoctrine()->getManager();
        $articleBlog    = $em->getRepository('AppBundle:ArticleBlog')->findOneById($id);

        // articleBlog exist
        if (!$articleBlog) {
            throw $this->createNotFoundException(
                    '[ArticleBlog] No found for id ' . $id
            );
        }

        //Create form
        $form = $this->get('form.factory')->create(new ArticleBlogType, $articleBlog);
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($articleBlog);

            $em->flush();
            return $this->redirectToRoute('app_admin_articleBlogList');
        }

        return $this->render('AppBundle:Blog:articleBlog.edit.html.twig', array(
                'form' => $form->createView()
        ));
    }


    public function searchAction(Request $request)
    {
        $searchtext = $request->get('q');
        $page       = $request->get('page');

        $em         = $this->getDoctrine()->getManager();
        
        $tabArticle = $em->getRepository('AppBundle:ArticleBlog')->createQueryBuilder("a")
                                                                ->select('a.id, a.french_title, a.english_title')
                                                                ->where('a.french_title LIKE :name OR a.english_title LIKE :name')
                                                                ->setParameter('name', '%'. $searchtext .'%')
                                                                ->getQuery()
                                                                ->getResult();

             


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tabArticle, 
            $request->query->getInt('page', $page || 1 ), //page number
            20 // limit per page
        );

        return $this->render('AppBundle:Blog:blog.html.twig', array(
            'pagination' => $pagination,
            'searchtext' => $searchtext
        ));
    }
    
}
