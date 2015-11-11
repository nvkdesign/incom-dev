<?php
namespace Event\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Event\EventBundle\Entity\equipe;

class equipeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $equipe = new equipe();
        $equipe->setNom("Millenium");
        $equipe->setDescription("Une equipe française situé à Marseille");
        $equipe->setJeu($this->getReference('LOL'));

        $equipe2 = new equipe();
        $equipe2->setNom("Gambit Gaming");
        $equipe2->setDescription("Une equipe belge situé chez ta mère");
        $equipe2->setJeu($this->getReference('LOL'));

        $equipe3 = new equipe();
        $equipe3->setNom("LOL Gaming");
        $equipe3->setDescription("Une equipe belge situé chez ta mère");
        $equipe3->setJeu($this->getReference('LOL'));

        $equipe6 = new equipe();
        $equipe6->setNom("KEVIN");
        $equipe6->setDescription("Une equipe belge situé chez ta mère");
        $equipe6->setJeu($this->getReference('LOL'));

        $equipe4 = new equipe();
        $equipe4->setNom("NICO GAMING");
        $equipe4->setDescription("Une equipe belge situé chez ta mère");
        $equipe4->setJeu($this->getReference('LOL'));

        $equipe5 = new equipe();
        $equipe5->setNom("incom");
        $equipe5->setDescription("Une equipe belge situé chez ta mère");
        $equipe5->setJeu($this->getReference('LOL'));

        $manager->persist($equipe);
        $manager->persist($equipe2);
        $manager->persist($equipe3);
        $manager->persist($equipe4);
        $manager->persist($equipe5);
        $manager->flush();

        $this->addReference('M', $equipe);
        $this->addReference('Gambit', $equipe2);
        $this->addReference('lol', $equipe3);
        $this->addReference('kevin', $equipe6);
        $this->addReference('nico', $equipe4);
        $this->addReference('incom', $equipe5);

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // l'ordre dans lequel les fichiers sont chargés
    }
}

?>