<?php

namespace AppBundle\Tests\Controller;

class CommentControllerTest extends CustomWebTestCase
{
    public function testThatCommentListIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/comment/');
    }


    public function testThatCommentEditIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/comment/edit');
    }


    public function testThatCommentCreateIsSuccessful()
    {
        $this->checkThatAdminPageIsSuccessful('/admin/comment/create');
    }

}
