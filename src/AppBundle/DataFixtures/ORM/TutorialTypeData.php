<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Tutorial;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class TutorialData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
		$tuto = new Tutorial();
		$tuto->setFrenchTitle("Title french");
		$tuto->setEnglishTitle("Title english");
		$tuto->setFrenchHtml("<p style='color: red'>description en rouge - french</p><pre>
        <code class=\"cpp prettyprint lang-cpp\">
            #include <SFML/Graphics.hpp>

            int main()
            {
                sf::RenderWindow window(sf::VideoMode(200, 200), \"SFML works!\");
                sf::CircleShape shape(100.f);
                shape.setFillColor(sf::Color::Green);

                while (window.isOpen())
                {
                    sf::Event event;
                    while (window.pollEvent(event))
                    {
                        if (event.type == sf::Event::Closed)
                        window.close();
                    }

                    window.clear();
                    window.draw(shape);
                    window.display();
                }

                return 0;
            }
        </code>
    </pre>");
		$tuto->setEnglishHtml("<p style='color: red'>description en rouge - english</p><pre>
        <code class=\"cpp prettyprint lang-cpp\">
            #include <SFML/Graphics.hpp>

            int main()
            {
                sf::RenderWindow window(sf::VideoMode(200, 200), \"SFML works!\");
                sf::CircleShape shape(100.f);
                shape.setFillColor(sf::Color::Green);

                while (window.isOpen())
                {
                    sf::Event event;
                    while (window.pollEvent(event))
                    {
                        if (event.type == sf::Event::Closed)
                        window.close();
                    }

                    window.clear();
                    window.draw(shape);
                    window.display();
                }

                return 0;
            }
        </code>
    </pre>");

		$manager->persist($tuto);
		$this->addReference('tuto1', $tuto);

		$tuto2 = new Tutorial();
		$tuto2->setFrenchTitle("Title 2 french");
		$tuto2->setEnglishTitle("Title 2 english");
		$tuto2->setFrenchHtml("<p style='color: red'>description en rouge - french</p>");
		$tuto2->setEnglishHtml("<p style='color: red'>description en rouge - english</p>");
		$tuto2->setTutoNext($tuto);

		$manager->persist($tuto2);
		$this->addReference('tuto2', $tuto2);
		
		$tuto3 = new Tutorial();
		$tuto3->setFrenchTitle("Title 3 french");
		$tuto3->setEnglishTitle("Title 3 english");
		$tuto3->setFrenchHtml("<p style='color: red'>description en rouge - french</p>");
		$tuto3->setEnglishHtml("<p style='color: red'>description en rouge - english</p>");
		$tuto3->setTutoNext($tuto);
		$tuto3->setTutoPrev($tuto2);

		$manager->persist($tuto3);
		$this->addReference('tuto3', $tuto3);

		$manager->flush();
	}
	
	public function getOrder()
	{
		return 1;
	}
}