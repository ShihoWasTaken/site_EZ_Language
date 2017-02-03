<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\ArticleBlogType;
use AppBundle\Entity\ArticleBlog;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

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
    
}
