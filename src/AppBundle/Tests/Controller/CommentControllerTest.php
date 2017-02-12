<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


# functional tests
# ROUINEB Hamza
class CommentControllerTest extends WebTestCase
{
	// Code générique
    /*private function checkThatPageIsSuccessful($url)
    {
        $comment = self::createComment();
        $client->request('GET', $url);
        
        $this->assertTrue($comment->getResponse()->isSuccessful());
    }*/

    // Page "/comment"
    public function testThatCommentIsSuccessful()
    {
    	$this->checkThatPageIsSuccessful('/comment');
    }

}
