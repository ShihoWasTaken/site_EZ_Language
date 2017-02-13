<?php

namespace AppBundle\Tests\Controller;

class BlogControllerTest extends CustomWebTestCase
{
    /* Les Blogs doivent être accessible publiquement
    *  On teste donc les route sans les droits d'admin
    */
    public function testThatBlogListIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/blog/');
    }
}
