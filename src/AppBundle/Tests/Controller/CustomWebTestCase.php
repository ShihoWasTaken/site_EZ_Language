<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CustomWebTestCase extends WebTestCase
{
    const ADMIN_USERNAME = 'user';
    const ADMIN_PASSWORD = 'password';

    // Pour les URL standards
    protected function checkThatPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    // Pour les URL de type DELETE accessibles uniquement aux admins
    protected function checkThatAdminRemoveIsSuccessful($url)
    {
        // Login en tant qu'admin
        $client = self::createClient();
        $crawler = $client->request('GET', 'login');
        $form = $crawler->selectButton('_submit')->form(array(
            '_username'  => self::ADMIN_USERNAME,
            '_password'  => self::ADMIN_PASSWORD,
        ));
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
        $this->assertTrue($client->getResponse()->isSuccessful());

        // Test de l'URL d'admin
        $client->request('DELETE', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    // Pour les URL accessibles uniquement aux admins
    protected function checkThatAdminPageIsSuccessful($url)
    {
        // Login en tant qu'admin
        $client = self::createClient();
        $crawler = $client->request('GET', 'login');
        $form = $crawler->selectButton('_submit')->form(array(
            '_username'  => self::ADMIN_USERNAME,
            '_password'  => self::ADMIN_PASSWORD,
        ));
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
        $this->assertTrue($client->getResponse()->isSuccessful());

        // Test de l'URL d'admin
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

}
