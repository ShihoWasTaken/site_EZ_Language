<?php


namespace AppBundle\Tests\Entity ;

use AppBundle\Entity\Comment;
use AppBundle\Entity\User;
use Symfony\Component\Validator\Constraints\NotBlank;

class CommentTest extends \PHPUnit_Framework_TestCase
{

    public function testGetComment()
    {
        $comment = new Comment();
        $txt = "This is just a mocking test";
        $comment->setComment($txt);
        $this->assertEquals($txt, $comment->getComment(),"GetComment test failed");
    }

    public function testGetPostedAt(){
        $date = new \DateTime(date("Y-m-d H:i:s", time()));
        $comment = new Comment();
        $comment->setPostedAt($date);
        $this->assertEquals($date, $comment->getPostedAt(),"testGetPostedAt test failed");
    }

    public function testGetUser(){
        $user = new User();
        $user->setUsername("Phoenix");
        $user->setEmail("phoenix@gmail.com");
        $comment = new Comment();
        $comment->setUser($user);

        $this->assertEquals($user, $comment->getUser(),"testGetUser test failed");
    }

    /*public function testComment()
    {
        
    }*/





}
















?>