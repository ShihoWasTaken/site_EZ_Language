<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\EZFunctionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EZFunctionController extends Controller {

    public function listAction() {

        $em = $this->getDoctrine()->getManager();
        $tabFunction = $em->getRepository('AppBundle:EZFunction')->findAll();


        return $this->render('AppBundle:EZFunction:function.list.html.twig', array(
                    'functions' => $tabFunction
        ));
    }

    /**
     * Edit Function
     * 
     * @param int $id => ID Page
     * @return 
     */
    public function editAction($id) {

        //Get Page by Id
        $em         = $this->getDoctrine()->getManager();
        $function   = $em->getRepository('AppBundle:EZFunction')->findOneById($id);

        // Page exist
        if (!$function) {
            throw $this->createNotFoundException(
                    '[Function] No found for id ' . $id
            );
        }

        //Create form
        $form = $this->get('form.factory')->create(new EZFunctionType, $function);
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            //Save $function;
            $em->flush();
            return $this->redirectToRoute('app_admin_functionList');
        }

        return $this->render('AppBundle:EZFunction:function.edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
