<?php 

// src/AppBundle/Tests/Repository/ProductRepositoryFunctionalTest.php
namespace AppBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CommentFunctionalTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    /*
     * The database testDb should be filled  
     */
    public function testRetrieveComment()
    {   
        $comment = $this->em->getRepository('AppBundle:Comment')->find(1);

        $this->assertNotNull($comment);
    }

    /**
     * {<@in></@in>heritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}



?>