<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Services\LoLAPIService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StaticController extends Controller
{
    public function homepageAction()
    {
		return $this->render('AppBundle:Static:homepage.html.twig');
    }

    public function aboutAction()
	{
		return $this->render('AppBundle:Static:about.html.twig');
	}

    public function contactAction()
    {
        return $this->render('AppBundle:Static:contact.html.twig');
    }
}

