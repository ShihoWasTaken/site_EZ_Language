<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Page;
use AppBundle\Form\Type\PageType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller {

    public function listAction() {

        $em = $this->getDoctrine()->getManager();
        $tabPage = $em->getRepository('AppBundle:Page')->findAll();


        return $this->render('AppBundle:Page:page.list.html.twig', array(
                    'pages' => $tabPage
        ));
    }

    /**
     * Edit Page Action
     * 
     * @param int $id => ID Page
     * @return 
     */
    public function editAction($id) {

        //Get Page by Id
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')->findOneById($id);

        // Page exist
        if (!$page) {
            throw $this->createNotFoundException(
                    '[Page] No found for id ' . $id
            );
        }

        //Create form
        $form = $this->get('form.factory')->create(new PageType, $page);
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            //Save $page;
            $em->flush();
        }

        return $this->render('AppBundle:Page:page.edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
