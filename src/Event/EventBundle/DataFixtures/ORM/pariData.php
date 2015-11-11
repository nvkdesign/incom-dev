<?php
namespace Event\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Event\EventBundle\Entity\pari;

class pariData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pari = new pari();
        $pari->setMise("1000");
        $pari->setEvent($this->getReference('M-vs-Gambit'));
        $pari->setEquipeparie($this->getReference('Gambit'));
        $pari->setUser($this->getReference('Kevin'));

        $pari1 = new pari();
        $pari1->setMise("2000");
        $pari1->setEtat("Brouillon");
        $pari1->setEvent($this->getReference('M-vs-Gambit'));
        $pari1->setEquipeparie($this->getReference('Gambit'));
        $pari1->setUser($this->getReference('Kevin'));

        $manager->persist($pari);
        $manager->persist($pari1);
        $manager->flush();

        $this->addReference('pari', $pari);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // l'ordre dans lequel les fichiers sont chargés
    }
}

?>