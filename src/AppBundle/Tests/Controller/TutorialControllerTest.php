<?php

namespace AppBundle\Tests\Controller;

class TutorialControllerTest extends CustomWebTestCase
{
    const VALID_ID = 1;

    /* La création/édition/listing des tutoriels doivent être accessible uniquement par l'admin
    *  On teste donc la route avec les droits d'admin
    */
    public function testThatTutorialListIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/tutorial/');
    }

    public function testThatTutorialEditIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/tutorial/' . self::VALID_ID . '/edit');
    }

    public function testThatTutorialCreateIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/tutorial/create');
    }

    /* Les tutoriels doivent être accessible publiquement
    *  On teste donc la route sans les droits d'admin
    */
    public function testThatTutorialShowIsSuccessful()
    {
        $this->checkThatPageIsSuccessful('/tutorial/' . self::VALID_ID);
    }
}
