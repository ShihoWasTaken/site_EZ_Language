<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

