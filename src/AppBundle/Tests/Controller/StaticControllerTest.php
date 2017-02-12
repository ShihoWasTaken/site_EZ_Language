<?php

namespace AppBundle\Tests\Controller;

class DefaultControllerTest extends CustomWebTestCase
{

    /* Le texte des boutons de validation du formulaire de contact en anglais et en français
    *  Si les tests ne passent plus, vérifier que le texte des boutons corresponds bien à celui des pages
    */
    const CONTACT_SUBMIT_BUTTON_TEXT = 'Send';
    const CONTACT_SUBMIT_BUTTON_FRENCH_TEXT = 'Envoyer';

    const VALID_USER_ID = 1;
    const INVALID_USER_ID = 'toto';

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
        $client = self::createClient();

        $crawler = $client->request('GET', '/contact');
        $form = $crawler->selectButton(self::CONTACT_SUBMIT_BUTTON_TEXT)->form(array(
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
        $client = self::createClient();

        $crawler = $client->request('GET', '/contact');

        $form = $crawler->selectButton(self::CONTACT_SUBMIT_BUTTON_TEXT)->form(array(
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
        $client = self::createClient();

        $crawler = $client->request('GET', '/fr/contact');
        $form = $crawler->selectButton(self::CONTACT_SUBMIT_BUTTON_FRENCH_TEXT)->form(array(
            'contact[name]'      => 'Kenny GUIOUGOU',
            'contact[email]'     => 'kenny.guiougou@gmail.com',
            'contact[subject]'   => 'Test du formulaire',
            'contact[body]'      => 'Coucou je veux juste tester le formulaire avec PHP Unit',
        ));
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
    }

    // Page "/profile/{id}""
    public function testThatProfileIsSuccessful()
    {
        $this->checkThatPageIsSuccessful('/profile/'. self::VALID_USER_ID);
    }

    // Page "/fr/profile/{id}"
    public function testThatFrenchProfileIsSuccessful()
    {
        $this->checkThatPageIsSuccessful('/fr/profile/' . self::VALID_USER_ID);
    }

    // Page "/profile/{id}""
    public function testThatInvalidUserIdShouldReturn404()
    {
            $client = self::createClient();
            $client->request('GET', '/profile/' . self::INVALID_USER_ID);
            $this->assertTrue($client->getResponse()->isNotFound());
    }

}
