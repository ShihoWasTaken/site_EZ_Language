<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	const MAX_NB_CATEGORY = 10;
        
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
        
	public function load(ObjectManager $manager)
	{
		$faker = \Faker\Factory::create();
                $userManager = $this->container->get('fos_user.user_manager');
                
		for ($i=0; $i<self::MAX_NB_CATEGORY; ++$i)
		{
			// On crée une nouvelle categorie.
			$category = new Category();
			$category->setFrenchLabel($faker->text(10));
            $category->setEnglishLabel($faker->text(10));
			$manager->persist($category);
			$this->addReference('category'.$i, $category);
		}
		$manager->flush();
	}
	
	public function getOrder()
	{
		return 2;
	}
}