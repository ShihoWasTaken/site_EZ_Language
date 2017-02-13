<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Contact;
use AppBundle\Form\Type\ContactType;

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
        $lang  = $this->get('request')->getLocale();

        //Load Page "about"
        $em    = $this->getDoctrine()->getManager();
        $page  = $em->getRepository('AppBundle:Page')->findOneById(3);
        $text  = '';
        if ($page !== null) {
            $text = $lang === 'en' ? $page->getEnglishText() : $page->getFrenchText();
        }


        return $this->render('AppBundle:Static:about.html.twig', array(
            'text' => $text
        ));
	}

    public function notfoundAction()
	{
		return $this->render('AppBundle:Static:notfound.html.twig');
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
                    ->setSubject('[EzLanguage.com] Contact')
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



    /**
     * Show user
     * @param int $userId
     * @return type
     * @throws type
     */
    public function profileAction($userId)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneById($userId);
        if (!$user)
        {
            throw $this->createNotFoundException(
                '[User] No found for id ' . $userId
            );
        }
        else
        {
            return $this->render('AppBundle:Static:profil.html.twig', array(
                'user'      => $user
            ));
        }
    }
}
