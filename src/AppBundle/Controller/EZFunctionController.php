<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\EZFunctionType;
use AppBundle\Entity\EZFunction;
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
     * Show Function
     * 
     * @param int $id => ID Page
     * @return 
     */
    public function showAction($id) {

        //Get Function by Id
        $em         = $this->getDoctrine()->getManager();
        $function   = $em->getRepository('AppBundle:EZFunction')->findOneById($id);

        // Function exist
        if (!$function) {
            throw $this->createNotFoundException(
                    '[Function] No found for id ' . $id
            );
        }

        $lang = $this->get('request')->getLocale();

        return $this->render('AppBundle:EZFunction:function.show.html.twig', array(
                    'function'      => $function,
                    'language'      => $lang
        ));
    }

    /**
     * Edit Function
     * 
     * @param int $id => ID Page
     * @return 
     */
    public function editAction($id) {

        //Get Function by Id
        $em         = $this->getDoctrine()->getManager();
        $function   = $em->getRepository('AppBundle:EZFunction')->findOneById($id);

        // Function exist
        if (!$function) {
            throw $this->createNotFoundException(
                    '[Function] No found for id ' . $id
            );
        }

        //Create form
        $form = $this->get('form.factory')->create(new EZFunctionType, $function, array(
            'locale' => $this->get('request')->getLocale())
        );
        
        $request = $this->getRequest();
        $form->handleRequest($request);

        if ($form->isValid()) {

            //Save $function;
            $em->persist($function);
            $em->flush();

            //return $this->redirectToRoute('app_admin_functionList');
        }

        return $this->render('AppBundle:EZFunction:function.edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }


    /**
     * Create Function
     * 
     * @return 
     */
    public function createAction() {

        $function = new EZFunction();

        //Create form
        $form = $this->get('form.factory')->create(new EZFunctionType, $function, array(
            'locale' => $this->get('request')->getLocale())
        );
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            //Save $function;
            $em = $this->getDoctrine()->getManager();
            $em->persist($function);

            $em->flush();
            return $this->redirectToRoute('app_admin_functionList');
        }

        return $this->render('AppBundle:EZFunction:function.create.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * Remove Function
     * 
     * @return 
     */
    public function removeAction($id) {

        //Get Function by Id
        $em         = $this->getDoctrine()->getManager();
        $function   = $em->getRepository('AppBundle:EZFunction')->findOneById($id);

         // Function exist
        if (!$function) {
            throw $this->createNotFoundException(
                    '[Function] No found for id ' . $id
            );
        }
        
        $em->remove($function);
        $em->flush();

        return new Response('Delete function', Response::HTTP_OK);
    }

}
