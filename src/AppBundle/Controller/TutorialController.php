<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\CategoryType;
use AppBundle\Entity\Category;

class CategoryController extends Controller
{

    public function createAction()
    {
        
        $category = new Category();
        
        //Get all categorie 
        $em             = $this->getDoctrine()->getManager();
        $categories     = $em->getRepository('AppBundle:Category')->findAll();

        //Create form
        $form = $this->get('form.factory')->create(new CategoryType, $category);
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        $lang = $this->get('request')->getLocale();

        if ($form->isValid()) {

            //Save $function;
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('app_admin_category');
        }
        else
        {
            return $this->render('AppBundle:Category:category.create.html.twig', array(
                    'form'          => $form->createView(),
                    'categories'    => $categories,
                    'language'      => $lang
            ));
        }
    }
}
