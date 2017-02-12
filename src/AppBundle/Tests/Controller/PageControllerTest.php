<?php

namespace AppBundle\Tests\Controller;

class PageControllerTest extends CustomWebTestCase
{
    const VALID_ID = 1;

    /* L'édition/listing des Pages doivent être accessible uniquement par l'admin
    *  On teste donc la route avec les droits d'admin
    */
    public function testThatPageListIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/page/');
    }

    public function testThatPageEditIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/page/' . self::VALID_ID . '/edit');
    }
}
