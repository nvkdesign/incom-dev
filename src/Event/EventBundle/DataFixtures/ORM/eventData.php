<?php
namespace Event\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Event\EventBundle\Entity\event;

class eventData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $event = new event();
        $event->setJeu($this->getReference('LOL'));
        $event->setTitre("SK Gaming vs H2K");
        $event->setDescription("koaeoakzejoiaziejaoziejaoizeoaijzoei");
        $event->setEquipe1($this->getReference('M'));
        $event->setEquipe2($this->getReference('Gambit'));
        $event->setCoteteam1("1.245");
        $event->setCoteteam2("1.123");
        $event->setEquipegagnante($this->getReference('M'));
        $event->setJeu($this->getReference('LOL'));
        $event->setEtat("Terminé");
        $event->setDatefinpari(new \DateTime());

        $event1 = new event();
        $event1->setJeu($this->getReference('LOL'));
        $event1->setTitre("Fnatic Vs SKTT1");
        $event1->setDescription("koaeoakzejoiaziejaoziejaoizeoaijzoei");
        $event1->setEquipe1($this->getReference('M'));
        $event1->setEquipe2($this->getReference('Gambit'));
        $event1->setCoteteam1("1.245");
        $event1->setCoteteam2("1.123");
        $event1->setEquipegagnante($this->getReference('Gambit'));
        $event1->setJeu($this->getReference('LOL'));
        $event1->setEtat("Brouillon");
        $event1->setDatefinpari(new \DateTime());

        $manager->persist($event);
        $manager->persist($event1);
        $manager->flush();

        $this->addReference('M-vs-Gambit', $event);
        $this->addReference('Gambit-vs-M', $event1);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // l'ordre dans lequel les fichiers sont chargés
    }
}

?>