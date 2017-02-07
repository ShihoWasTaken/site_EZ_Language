<?php
// @author : ROUINEB Hamza

namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Comment;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
  const MAX_NB_COMMENT = 5;
  /**
  * @var ContainerInterface
  */
    private $container;
  /**
  * {@inheritDoc}
  */
  public function setContainer(ContainerInterface $container = null)
  {
      $this->container = $container;
  }

  /**
  * This time I'm using populator of the faker bundle
  */
	public function load(ObjectManager $manager)
	{
    $faker = \Faker\Factory::create();
    $populator = new \Faker\ORM\Doctrine\Populator($faker,$manager);

    // generate MAX_NB_COMMENT comment
    $populator->addEntity('AppBundle\Entity\Comment', self::MAX_NB_COMMENT
      /*array(
        'username_canonical' => function() use ($faker) { return $faker->unique()->word(15); },
        'email_canonical' => function() use ($faker) { return $faker->unique()->email(); }
      )*/
    );

    // this is much more interesting
    $insertedPKs = $populator->execute();
	}

  // should be persisted with the earlier ones
	public function getOrder()
	{
		return 1;
	}
}
