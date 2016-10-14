<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\EZFunction;
use AppBundle\Entity\Category;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadEZFunctionData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    const MAX_NB_FUNCTIONS = 30;

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



        for ($i=0; $i<self::MAX_NB_FUNCTIONS; ++$i)
        {
            // On crée un nouvel utilisateur.
            $EZFunction = new EZFunction();
            $EZFunction->setName($faker->text(10));
            $EZFunction->setUser($this->getReference('user'.rand(0, 9)));
            $EZFunction->setFrenchLabel($faker->text(10));
            $EZFunction->setEnglishLabel($faker->text(10));
            $EZFunction->setCategory($this->getReference('category'.rand(0, 9)));
            $manager->persist($EZFunction);
        }                
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}