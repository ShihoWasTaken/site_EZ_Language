<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\EZFunction;
use AppBundle\Entity\Argument;

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
            $EZFunction->setFrenchDescription($faker->text(100));
            $EZFunction->setEnglishDescription($faker->text(100));
            // Il ne faut pas mettre 1000 ( c'est très long ) 
            $EZFunction->setEnglishHtml($faker->text(100));
            $EZFunction->setFrenchHtml($faker->text(100));
            $EZFunction->setCategory($this->getReference('category1'));
            
            $argument = new Argument();
            $argument->setEZFunction($EZFunction);
            $argument->setEnglishDescription("Description en anglais");
            $argument->setFrenchDescription("Description en francais");
            $argument->setName("Argument 1");
            $argument->setReturn(false);
            $argument->setType($this->getReference('functionType5'));
            $EZFunction->addArgument($argument);
            
            $argument2 = new Argument();
            $argument2->setEZFunction($EZFunction);
            $argument2->setEnglishDescription("Description en anglais 2");
            $argument2->setFrenchDescription("Description en francais 2 ");
            $argument2->setName("Argument 2");
            $argument2->setReturn(false);
            $argument2->setType($this->getReference('functionType4'));
            $EZFunction->addArgument($argument2);
            
            $argument3 = new Argument();
            $argument3->setEZFunction($EZFunction);
            $argument3->setEnglishDescription("Description en anglais 3 - valeur de retour");
            $argument3->setFrenchDescription("Description en francais 3 - valeur de retour");
            $argument3->setName("Argument 3 - retour ");
            $argument3->setReturn(true); 
            $argument3->setType($this->getReference('functionType2'));
            $EZFunction->addArgument($argument3);
            
            $manager->persist($EZFunction);
        }                
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}