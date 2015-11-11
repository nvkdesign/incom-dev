<?php

namespace Event\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * jeu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Event\EventBundle\Entity\jeuRepository")
 */
class jeu
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
     * @ORM\OneToMany(targetEntity="Event\EventBundle\Entity\equipe", mappedBy="jeu")
     *
     */
    private $listequipes;

    /**
     * @ORM\OneToMany(targetEntity="Event\EventBundle\Entity\event", mappedBy="jeu")
     *
     */
    private $listjeu;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    public function __construct()
    {
        $this->listequipes = new ArrayCollection();
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
     * @return jeu
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
     * @return jeu
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
     * Add listequipes
     *
     * @param \Event\EventBundle\Entity\equipe $listequipes
     * @return jeu
     */
    public function addListequipe(\Event\EventBundle\Entity\equipe $listequipes)
    {
        $this->listequipes[] = $listequipes;

        return $this;
    }

    /**
     * Remove listequipes
     *
     * @param \Event\EventBundle\Entity\equipe $listequipes
     */
    public function removeListequipe(\Event\EventBundle\Entity\equipe $listequipes)
    {
        $this->listequipes->removeElement($listequipes);
    }

    /**
     * Get listequipes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListequipes()
    {
        return $this->listequipes;
    }

    /**
     * Add listjeu
     *
     * @param \Event\EventBundle\Entity\event $listjeu
     * @return jeu
     */
    public function addListjeu(\Event\EventBundle\Entity\event $listjeu)
    {
        $this->listjeu[] = $listjeu;

        return $this;
    }

    /**
     * Remove listjeu
     *
     * @param \Event\EventBundle\Entity\event $listjeu
     */
    public function removeListjeu(\Event\EventBundle\Entity\event $listjeu)
    {
        $this->listjeu->removeElement($listjeu);
    }

    /**
     * Get listjeu
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListjeu()
    {
        return $this->listjeu;
    }

    /**
     * Transform to string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }
}
