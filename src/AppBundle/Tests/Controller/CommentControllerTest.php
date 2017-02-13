<?php

namespace AppBundle\Tests\Controller;

class CommentControllerTest extends CustomWebTestCase
{
    public function testThatCommentListIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/comment/');
    }
}
