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
        
        $em = $this->getDoctrine()->getManager();
        $tutorial = $em->getRepository('AppBundle:Tutorial')->findOneById($id);
        
        // tutorial exist
        if (!$tutorial) {
            throw $this->createNotFoundException(
                    '[Tutorial] No found for id ' . $id
            );
        }
        
        $lang = $this->get('request')->getLocale();
        
        return $this->render('AppBundle:Tutorial:tutorial.show.html.twig', array(
            'tutorial' => $tutorial,
            'lang'      => $lang
        ));
    } 
    
    public function createAction(){
        
    } 
    
    public function editAction($id){
        
    } 
}
