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

	// Page "/fr/contact"
    public function testThatFrenchContactIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/fr/contact');
    }

}
