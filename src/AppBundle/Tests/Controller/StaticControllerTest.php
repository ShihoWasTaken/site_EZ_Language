<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

	// Code générique
    private function checkThatPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    // Page "/"
    public function testThatIndexIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/');
    }

	// Page "/fr/"
    public function testThatFrenchIndexIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/fr/');
    }

    // Page "/about"
    public function testThatAboutIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/about');
    }

	// Page "/fr/about"
    public function testThatFrenchAboutIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/fr/about');
    }

    // Page "/contact"
    public function testThatContactIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/contact');
    }

    public function testFormContactShouldValidate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form(array(
            'contact[name]'      => 'Kenny GUIOUGOU',
            'contact[email]'     => 'kenny.guiougou@gmail.com',
            'contact[subject]'   => 'Test du formulaire',
            'contact[body]'      => 'Coucou je veux juste tester le formulaire avec PHP Unit',
        ));
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
    }

    public function testFormContactShouldNotValidateWithIncorrectEmail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton('Submit')->form(array(
            'contact[name]'      => 'Kenny GUIOUGOU',
            'contact[email]'     => 'kenny.guiougougmail.com',
            'contact[subject]'   => 'Test du formulaire',
            'contact[body]'      => 'Coucou je veux juste tester le formulaire avec PHP Unit',
        ));
        $client->submit($form);
        $this->assertFalse($client->getResponse()->isRedirect());
    }

	// Page "/fr/contact"
    public function testThatFrenchContactIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/fr/contact');
    }

    public function testFrenchFormContact()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fr/contact');
        $form = $crawler->selectButton('Submit')->form(array(
            'contact[name]'      => 'Kenny GUIOUGOU',
            'contact[email]'     => 'kenny.guiougou@gmail.com',
            'contact[subject]'   => 'Test du formulaire',
            'contact[body]'      => 'Coucou je veux juste tester le formulaire avec PHP Unit',
        ));
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
    }


}
