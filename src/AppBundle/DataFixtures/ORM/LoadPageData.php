<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Page;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadPageData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{      
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
            
            //Create Page Home
            $page = new Page();
            $page->setEnglishText("[ENGLISH]" . $faker->text(400));
            $page->setFrenchText("[FRANCAIS]" . $faker->text(400));
            $page->setName("HOME");
            $page->setUser($this->getReference('user'.rand(0, 9)));
            $page->setLastUpdateDate(new \DateTime());
            $this->addReference('pagehome', $page);
            $manager->persist($page);
            
            //Create Page Contact
            $pageContact = new Page();
            $pageContact->setEnglishText("[ENGLISH]" . $faker->text(400));
            $pageContact->setFrenchText("[FRANCAIS]" . $faker->text(400));
            $pageContact->setName("CONTACT");
            $pageContact->setUser($this->getReference('user'.rand(0, 9)));
            $pageContact->setLastUpdateDate(new \DateTime());
            $this->addReference('pagecontact', $pageContact);
            $manager->persist($pageContact);

            //Create Page About
            $pageAbout = new Page();
            $pageAbout->setEnglishText("[ENGLISH]" . $faker->text(400));
            $pageAbout->setFrenchText("[FRANCAIS]" . $faker->text(400));
            $pageAbout->setName("ABOUT");
            $pageAbout->setUser($this->getReference('user'.rand(0, 9)));
            $pageAbout->setLastUpdateDate(new \DateTime());
            $this->addReference('pageabout', $pageAbout);
            $manager->persist($pageAbout);
            
            //Flush Data
            $manager->flush();
	}
	
	public function getOrder()
	{
            return 4;
	}
}