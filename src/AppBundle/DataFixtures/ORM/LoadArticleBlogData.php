<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ArticleBlog;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadArticleBlogData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
		$article = new ArticleBlog();
		$article->setFrenchTitle("Title 2 french");
		$article->setEnglishTitle("Title 2 english");
		$article->setFrenchHtml("<p style='color: red'>Blog 1 </p>");
		$article->setEnglishHtml("<p style='color: red'>Blog 1 english/p>");
		$article->setUser($this->getReference('user'.rand(0, 9)));
        $article->setLastUpdateDate(new \DateTime());

		$manager->persist($article);
		$this->addReference('article', $article);
		
		$article2 = new ArticleBlog();
		$article2->setFrenchTitle("Title 1 french");
		$article2->setEnglishTitle("Title 1 english");
		$article2->setFrenchHtml("<p style='color: red'>Blog 2 </p>");
		$article2->setEnglishHtml("<p style='color: red'>Blog 2 english/p>");
		$article2->setUser($this->getReference('user'.rand(0, 9)));
        $article2->setLastUpdateDate(new \DateTime());

		$manager->persist($article2);
		$this->addReference('article2', $article2);

		$manager->flush();
	}
	
	public function getOrder()
	{
		return 3;
	}
}