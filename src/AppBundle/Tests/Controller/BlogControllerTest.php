<?php

namespace AppBundle\Tests\Controller;

class BlogControllerTest extends CustomWebTestCase
{
    const VALID_ID = 1;

    /* La création/édition des Blogs doivent être accessible uniquement par l'admin
    *  On teste donc la route avec les droits d'admin
    */
    public function testThatBlogEditIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/blog/article/' . self::VALID_ID . '/edit');
    }

    public function testThatBlogCreateIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/blog/article/create');
    }

    /* Les Blogs doivent être accessible publiquement
    *  On teste donc les route sans les droits d'admin
    */
    public function testThatBlogListIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/blog/');
    }

    public function testThatBlogShowIsSuccessful()
    {
        $this->checkThatPageIsSuccessful('/blog/article/' . self::VALID_ID);
    }
}
