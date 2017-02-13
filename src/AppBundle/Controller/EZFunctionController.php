<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\EZFunctionType;
use AppBundle\Form\Type\CommentType;
use AppBundle\Entity\EZFunction;
use AppBundle\Entity\Comment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EZFunctionController extends Controller {

    public function adminListAction(Request $request) {
        // Variable
        $page        = $request->get('page');

        $em          = $this->getDoctrine()->getManager();
        $tabFunction = $em->getRepository('AppBundle:EZFunction')->findAll();

        // Lang
        $lang = $this->get('request')->getLocale();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tabFunction, 
            $request->query->getInt('page', $page || 1 ), //page number
            20 // limit per page
        );

        return $this->render('AppBundle:EZFunction:function.adminList.html.twig', array(
              'functions' => $pagination,
              'lang' => $lang
        ));
    }

    public function listAction(Request $request) {
        // Variable
        $page        = $request->get('page');

        $em          = $this->getDoctrine()->getManager();
        $tabFunction = $em->getRepository('AppBundle:EZFunction')->findAll();

        // Lang
        $lang = $this->get('request')->getLocale();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $tabFunction,
            $request->query->getInt('page', $page || 1 ), //page number
            20 // limit per page
        );

        return $this->render('AppBundle:EZFunction:function.list.html.twig', array(
            'functions' => $pagination,
            'lang' => $lang
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

         //Create form
        $comment = new Comment();
        $form = $this->get('form.factory')->create(new CommentType, $comment);
        $request = $this->getRequest();
        $form->handleRequest($request);

        //ADD COMMENT
        if ($form->isValid() && $this->getUser() !== null) {
            $comment->setUser($this->getUser());
            $comment->setEZFunction($function);
            $comment->setPostedAt(new \DateTime());

            // Save comment;
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('app_functionShow', array('id' => $function->getId() ));
        }


        $lang = $this->get('request')->getLocale();
        $aArgs = array();
        $reArg = "";

        foreach($function->getArguments() as $argument)
        {
            if($argument->isReturn())
            {
                $reArg = $argument->getType()->getName();
            }
            else
            {
                $aArgs = array_merge($aArgs, array($argument->getName() . " is " . $argument->getType()->getName()));
            }
        }

        if(empty($reArg))
        {
            $str_code = "procedure " . $function->getName() . "(" . join(', ', $aArgs) . ")";
        }
        else
        {
            $str_code = "function " . $function->getName() . "(" . join(', ', $aArgs) . ") return " . $reArg;
        }

        return $this->render('AppBundle:EZFunction:function.show.html.twig', array(
                    'function'      => $function,
                    'language'      => $lang,
                    'form'          => $form->createView(),
                    'aArgs'         => $aArgs,
                    'reArg'         => $reArg,
                    'str_code'      => $str_code
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
            // Save function;
            $em->persist($function);
            $em->flush();

            return $this->redirectToRoute('app_admin_functionEdit', array('id' => $function->getId() ));
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
      

        // Create form
        $form = $this->get('form.factory')->create(new EZFunctionType, $function, array(
            'locale' => $this->get('request')->getLocale())
        );
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        	
	        if ($form->isValid()) {
	            // Save function;
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
