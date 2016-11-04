<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Contact;
use AppBundle\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\Response;

class StaticController extends Controller
{
    public function homepageAction()
    {
      
        $lang  = $this->get('request')->getLocale();
        
        //Load Page "Home"
        $em    = $this->getDoctrine()->getManager();
        $page  = $em->getRepository('AppBundle:Page')->findOneById(1);
        $text  = '';
        if ($page !== null) {
            $text = $lang === 'en' ? $page->getEnglishText() : $page->getFrenchText();
        }


        return $this->render('AppBundle:Static:homepage.html.twig', array(
            'text' => $text
        ));
    }

    public function aboutAction()
	{
		return $this->render('AppBundle:Static:about.html.twig');
	}

    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
                    ->setFrom('ezlanguage.contact@gmail.com')
                    ->setTo('kenny.guiougou@gmail.com')
                    ->setBody($this->renderView('AppBundle:Mail:contact.html.twig', array('contact' => $contact))
                        ,'text/html');
                $this->get('mailer')->send($message);


                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('app_contact'));
            }
        }

        return $this->render('AppBundle:Static:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }


   

    public function profileAction($userId)
    {
        return new Response('Il faut faire la vue de cette action');
    }
}

