<?php

namespace AppBundle\Tests\Controller;

class EZFunctionControllerTest extends CustomWebTestCase
{
    const VALID_ID = 1;

    /* La création/édition/listing des Fonctions doivent être accessible uniquement par l'admin
    *  On teste donc la route avec les droits d'admin
    */
    public function testThatEzFunctionListIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/function/');
    }

    public function testThatEzFunctionEditIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/function/' . self::VALID_ID . '/edit');
    }

    public function testThatEzFunctionCreateIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/function/create');
    }

    /* Les Fonctions doivent être accessible publiquement
    *  On teste donc la route sans les droits d'admin
    */
    public function testThatEzFunctionShowIsSuccessful()
    {
        $this->checkThatPageIsSuccessful('/function/' . self::VALID_ID);
    }
}
