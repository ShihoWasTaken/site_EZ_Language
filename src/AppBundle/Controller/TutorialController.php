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
        $tutorial = new Tutorial();

        //Create form
        $form = $this->get('form.factory')->create(new TutorialType, $tutorial, array(
            'locale' => $this->get('request')->getLocale())
        );
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tutorial);

            $em->flush();
            return $this->redirectToRoute('app_admin_tutorialList');
        }

        return $this->render('AppBundle:Tutorial:tutorial.create.html.twig', array(
                'form' => $form->createView()
        ));
    } 
    
    public function editAction($id){
        
        //Get Function by Id
        $em         = $this->getDoctrine()->getManager();
        $tutorial   = $em->getRepository('AppBundle:Tutorial')->findOneById($id);

        // Function exist
        if (!$tutorial) {
            throw $this->createNotFoundException(
                    '[Tutorial] No found for id ' . $id
            );
        }

        //Create form
        $form = $this->get('form.factory')->create(new TutorialType, $tutorial, array(
            'locale' => $this->get('request')->getLocale())
        );
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tutorial);

            $em->flush();
            return $this->redirectToRoute('app_admin_tutorialList');
        }

        return $this->render('AppBundle:Tutorial:tutorial.edit.html.twig', array(
                'form' => $form->createView()
        ));
    } 
}
