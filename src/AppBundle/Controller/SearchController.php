<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    
    public function searchbarAction(Request $request)
    {
        $searchtext = $request->get('q');
        $page       = $request->get('page');

        $em         = $this->getDoctrine()->getManager();
        $tabPage    = $em->getRepository('AppBundle:EZFunction')->createQueryBuilder('a')
                                                                ->where('a.name LIKE :name')
                                                                ->setParameter('name', '%'. $searchtext .'%');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tabPage, 
            $request->query->getInt('page', $page || 1 ), //page number
            20 // limit per page
        );

        return $this->render('AppBundle:Search:search.html.twig', array(
            'pagination' => $pagination,
            'searchtext' => $searchtext
        ));
    }
}
