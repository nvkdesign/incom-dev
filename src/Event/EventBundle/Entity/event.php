<?php

namespace Event\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Event\EventBundle\Entity\eventRepository")
 */
class event
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=100)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefinpari", type="datetime")
     */
    private $datefinpari;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Event\EventBundle\Entity\pari", mappedBy="event")
     */
    private $listparis;

    /**
     * @ORM\ManyToOne(targetEntity="Event\EventBundle\Entity\jeu", inversedBy="listevent")
     * @ORM\JoinColumn(name="id_jeu", referencedColumnName="id")
     */
    private $jeu;


    /**
     * @ORM\ManyToOne(targetEntity="Event\EventBundle\Entity\equipe", inversedBy="listevent")
     * @ORM\JoinColumn(name="id_equipe1", referencedColumnName="id")
     */
    private $equipe1;

    /**
     * @ORM\ManyToOne(targetEntity="Event\EventBundle\Entity\equipe", inversedBy="listevent")
     * @ORM\JoinColumn(name="id_equipe2", referencedColumnName="id")
     */
    private $equipe2;

    /**
     * @ORM\ManyToOne(targetEntity="Event\EventBundle\Entity\equipe", inversedBy="listeventgagne")
     * @ORM\JoinColumn(name="id_equipegagnante", referencedColumnName="id")
     */
    private $equipegagnante;

    /**
     * @var float
     *
     * @ORM\Column(name="coteteam1", type="float")
     */
    private $coteteam1;

    /**
     * @var float
     *
     * @ORM\Column(name="coteteam2", type="float")
     */
    private $coteteam2;

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
     * Set titre
     *
     * @param string $titre
     * @return event
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set coteteam1
     *
     * @param float $coteteam1
     * @return event
     */
    public function setCoteteam1($coteteam1)
    {
        $this->coteteam1 = $coteteam1;

        return $this;
    }

    /**
     * Get coteteam1
     *
     * @return float 
     */
    public function getCoteteam1()
    {
        return $this->coteteam1;
    }

    /**
     * Set coteteam2
     *
     * @param float $coteteam2
     * @return event
     */
    public function setCoteteam2($coteteam2)
    {
        $this->coteteam2 = $coteteam2;

        return $this;
    }

    /**
     * Get coteteam2
     *
     * @return float 
     */
    public function getCoteteam2()
    {
        return $this->coteteam2;
    }

    /**
     * Set jeu
     *
     * @param \Event\EventBundle\Entity\jeu $jeu
     * @return event
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
     * Set equipe1
     *
     * @param \Event\EventBundle\Entity\equipe $equipe1
     * @return event
     */
    public function setEquipe1(\Event\EventBundle\Entity\equipe $equipe1)
    {
        $this->equipe1 = $equipe1;

        return $this;
    }

    /**
     * Get equipe1
     *
     * @return \Event\EventBundle\Entity\equipe 
     */
    public function getEquipe1()
    {
        return $this->equipe1;
    }

    /**
     * Set equipe2
     *
     * @param \Event\EventBundle\Entity\equipe $equipe2
     * @return event
     */
    public function setEquipe2(\Event\EventBundle\Entity\equipe $equipe2)
    {
        $this->equipe2 = $equipe2;

        return $this;
    }

    /**
     * Get equipe2
     *
     * @return \Event\EventBundle\Entity\equipe 
     */
    public function getEquipe2()
    {
        return $this->equipe2;
    }

    /**
     * Set equipegagnante
     *
     * @param \Event\EventBundle\Entity\equipe $equipegagnante
     * @return event
     */
    public function setEquipegagnante(\Event\EventBundle\Entity\equipe $equipegagnante)
    {
        $this->equipegagnante = $equipegagnante;

        return $this;
    }

    /**
     * Get equipegagnante
     *
     * @return \Event\EventBundle\Entity\equipe 
     */
    public function getEquipegagnante()
    {
        return $this->equipegagnante;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listparis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listparis
     *
     * @param \Event\EventBundle\Entity\pari $listparis
     * @return event
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

    /**
     * Set description
     *
     * @param string $description
     * @return event
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
     * Set etat
     *
     * @param string $etat
     * @return event
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set datefinpari
     *
     * @param \DateTime $datefinpari
     * @return event
     */
    public function setDatefinpari($datefinpari)
    {
        $this->datefinpari = $datefinpari;

        return $this;
    }

    /**
     * Get datefinpari
     *
     * @return \DateTime 
     */
    public function getDatefinpari()
    {
        return $this->datefinpari;
    }
}
