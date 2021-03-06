<?php

namespace Event\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * pari
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Event\EventBundle\Entity\pariRepository")
 */
class pari
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
     * @ORM\ManyToOne(targetEntity="Event\EventBundle\Entity\event", inversedBy="listparis")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Event\EventBundle\Entity\equipe", inversedBy="listparis")
     * @ORM\JoinColumn(name="id_equipeparie", referencedColumnName="id")
     */
    private $equipeparie;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="listparis")
     * @ORM\JoinColumn(name="id_Utilisateurs", referencedColumnName="id")
     */
    private $user;


    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->event = new ArrayCollection();
        $this->equipeparie = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="mise", type="integer")
     */
    private $mise;




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
     * Set mise
     *
     * @param integer $mise
     * @return pari
     */
    public function setMise($mise)
    {
        $this->mise = $mise;

        return $this;
    }

    /**
     * Get mise
     *
     * @return integer 
     */
    public function getMise()
    {
        return $this->mise;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return pari
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
     * @return pari
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
    public function getDatefinpari($format = 'Y-m-d H:i:s')
    {
        return $this->datefinpari->format($format);
    }

    /**
     * Set event
     *
     * @param \Event\EventBundle\Entity\event $event
     * @return pari
     */
    public function setEvent(\Event\EventBundle\Entity\event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Event\EventBundle\Entity\event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set equipe
     *
     * @param \Event\EventBundle\Entity\equipe $equipe
     * @return pari
     */
    public function setEquipe(\Event\EventBundle\Entity\equipe $equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe
     *
     * @return \Event\EventBundle\Entity\equipe 
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set category
     *
     * @param \Event\EventBundle\Entity\pari $category
     * @return pari
     */
    public function setCategory(\Event\EventBundle\Entity\pari $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Event\EventBundle\Entity\pari 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set equipeparie
     *
     * @param \Event\EventBundle\Entity\equipe $equipeparie
     * @return pari
     */
    public function setEquipeparie(\Event\EventBundle\Entity\equipe $equipeparie = null)
    {
        $this->equipeparie = $equipeparie;

        return $this;
    }

    /**
     * Get equipeparie
     *
     * @return \Event\EventBundle\Entity\equipe 
     */
    public function getEquipeparie()
    {
        return $this->equipeparie;
    }

    /**
     * Set user
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $user
     * @return pari
     */
    public function setUser(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     */
    public function getUser()
    {
        return $this->user;
    }
}
