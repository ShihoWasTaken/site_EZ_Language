<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\FunctionType;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FunctionTypeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
		$function = new FunctionType();
		$function->setName('void');
		$function1 = new FunctionType();
		$function1->setName('int');
		$function2 = new FunctionType();
		$function2->setName('string');
		$function3 = new FunctionType();
		$function3->setName('double');
		$function4 = new FunctionType();
		$function4->setName('boolean');

		$manager->persist($function);
		$this->addReference('functionType1', $function);
		$manager->persist($function1);
		$this->addReference('functionType2', $function1);
		$manager->persist($function2);
		$this->addReference('functionType3', $function2);
		$manager->persist($function3);
		$this->addReference('functionType4', $function3);
		$manager->persist($function4);
		$this->addReference('functionType5', $function4);

		$manager->flush();
	}
	
	public function getOrder()
	{
		return 2;
	}
}