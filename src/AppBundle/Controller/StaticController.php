<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Contact;
use AppBundle\Form\Type\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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


    public function searchbarAction(Request $request)
    {
        /*
        $api = $this->container->get('app.lolapi');
        // On doit traiter le nom du summoner
        $summonerName =  str_replace(' ', '', strtolower($request->request->get('searchbar-summonerName')));
        $summoner = $api->getSummonerByNames(array($summonerName));
        if(isset($summoner['errorCode']))
        {
            throw new NotFoundHttpException('Sorry not existing!');
        }
        */
        return new Response($request->request->get('searchbar'));
        return $this->redirectToRoute('app_function', array('functionId' => $functionId));
    }

    public function profileAction($userId)
    {
        return new Response('Il faut faire la vue de cette action');
    }

    public function functionAction($functionId)
    {
        return new Response('Il faut faire la vue de cette action');
    }
}

