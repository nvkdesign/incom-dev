<?php

namespace Event\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * equipe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Event\EventBundle\Entity\equipeRepository")
 */
class equipe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Event\EventBundle\Entity\jeu", inversedBy="listequipes")
     * @ORM\JoinColumn(name="id_jeu", referencedColumnName="id")
     */
    private $jeu;

    /**
     * @ORM\OneToMany(targetEntity="Event\EventBundle\Entity\event", mappedBy="equipe")
     *
     */
    private $listevents;

    /**
     * @ORM\OneToMany(targetEntity="Event\EventBundle\Entity\event", mappedBy="equipegagnante")
     *
     */
    private $listeventgagne;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Event\EventBundle\Entity\pari", mappedBy="equipe")
     *
     */
    private $listparis;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    public function __construct()
    {
        $this->jeu = new ArrayCollection();
        $this->equipe1 = new ArrayCollection();
        $this->equipe2 = new ArrayCollection();
        $this->equipegagnante = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return equipe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return equipe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set jeu
     *
     * @param \Event\EventBundle\Entity\jeu $jeu
     * @return equipe
     */
    public function setJeu(\Event\EventBundle\Entity\jeu $jeu)
    {
        $this->jeu = $jeu;

        return $this;
    }

    /**
     * Get jeu
     *
     * @return \Event\EventBundle\Entity\jeu 
     */
    public function getJeu()
    {
        return $this->jeu;
    }

    /**
     * Add listevents
     *
     * @param \Event\EventBundle\Entity\event $listevents
     * @return equipe
     */
    public function addListevent(\Event\EventBundle\Entity\event $listevents)
    {
        $this->listevents[] = $listevents;

        return $this;
    }

    /**
     * Remove listevents
     *
     * @param \Event\EventBundle\Entity\event $listevents
     */
    public function removeListevent(\Event\EventBundle\Entity\event $listevents)
    {
        $this->listevents->removeElement($listevents);
    }

    /**
     * Get listevents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListevents()
    {
        return $this->listevents;
    }

    /**
     * Add listeventgagne
     *
     * @param \Event\EventBundle\Entity\event $listeventgagne
     * @return equipe
     */
    public function addListeventgagne(\Event\EventBundle\Entity\event $listeventgagne)
    {
        $this->listeventgagne[] = $listeventgagne;

        return $this;
    }

    /**
     * Remove listeventgagne
     *
     * @param \Event\EventBundle\Entity\event $listeventgagne
     */
    public function removeListeventgagne(\Event\EventBundle\Entity\event $listeventgagne)
    {
        $this->listeventgagne->removeElement($listeventgagne);
    }

    /**
     * Get listeventgagne
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListeventgagne()
    {
        return $this->listeventgagne;
    }

    /**
     * Add listparis
     *
     * @param \Event\EventBundle\Entity\pari $listparis
     * @return equipe
     */
    public function addListpari(\Event\EventBundle\Entity\pari $listparis)
    {
        $this->listparis[] = $listparis;

        return $this;
    }

    /**
     * Remove listparis
     *
     * @param \Event\EventBundle\Entity\pari $listparis
     */
    public function removeListpari(\Event\EventBundle\Entity\pari $listparis)
    {
        $this->listparis->removeElement($listparis);
    }

    /**
     * Get listparis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListparis()
    {
        return $this->listparis;
    }
}
