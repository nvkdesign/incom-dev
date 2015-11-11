<?php
namespace Event\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Event\EventBundle\Entity\user;

class userData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new user();
        $user->setNom("Kevin");
        $user->setPointactuel("5000");
        $user->setPointdispo("5000");

        $manager->persist($user);
        $manager->flush();

        $this->addReference('Kevin', $user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // l'ordre dans lequel les fichiers sont chargés
    }
}

?>