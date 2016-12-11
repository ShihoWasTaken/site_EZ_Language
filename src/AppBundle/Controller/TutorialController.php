<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\TutorialType;
use AppBundle\Entity\Tutorial;

class TutorialController extends Controller
{
    public function listAction(){
        
        $em = $this->getDoctrine()->getManager();
        $tutorials = $em->getRepository('AppBundle:Tutorial')->findAll();

        $lang = $this->get('request')->getLocale();
        
        return $this->render('AppBundle:Tutorial:tutorial.list.html.twig', array(
            'tutorials' => $tutorials,
            'lang'      => $lang
        ));
    } 
    
    public function showAction($id){
        
    } 
    
    public function createAction(){
        
    } 
    
    public function editAction($id){
        
    } 
}
