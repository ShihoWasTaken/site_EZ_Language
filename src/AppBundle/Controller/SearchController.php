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
        
        $tabPage    = $em->getRepository('AppBundle:EZFunction')->createQueryBuilder("a")
                                                                ->select('c.french_label as french_category, c.english_label as english_category, a.id, a.name, a.french_description, a.english_description, \'function\' as type')
                                                                ->join('a.category','c')
                                                                ->where('a.name LIKE :name')
                                                                ->setParameter('name', '%'. $searchtext .'%')
                                                                ->getQuery()
                                                                ->getResult();

        
        
        $tabTuto    = $em->getRepository('AppBundle:Tutorial')->createQueryBuilder("a")
                                                                ->select('a.id, a.french_title, a.english_title, \'tuto\' as type')
                                                                ->where('a.french_title LIKE :name OR a.english_title LIKE :name')
                                                                ->setParameter('name', '%'. $searchtext .'%')
                                                                ->getQuery()
                                                                ->getResult();       

        $tab = array_merge($tabTuto, $tabPage);  

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tab, 
            $request->query->getInt('page', $page || 1 ), //page number
            20 // limit per page
        );

        return $this->render('AppBundle:Search:search.html.twig', array(
            'pagination' => $pagination,
            'searchtext' => $searchtext
        ));
    }
}
