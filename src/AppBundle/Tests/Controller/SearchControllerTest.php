<?php

namespace AppBundle\Tests\Controller;

class SearchControllerTest extends CustomWebTestCase
{
    public function testSearchPageIsSuccessful()
    {
        $this->checkThatPageIsSuccessful('/search');
    }

    public function testFrenchSearchPageIsSuccessful()
    {
        $this->checkThatPageIsSuccessful('/fr/search');
    }

}
