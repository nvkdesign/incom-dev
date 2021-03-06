<?php

namespace Event\EventBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * user
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Event\EventBundle\Entity\userRepository")
 */
class user
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Event\EventBundle\Entity\pari" , mappedBy="user")
     */
    private $listparis;

    /**
     * @var integer
     *
     * @ORM\Column(name="pointactuel", type="integer")
     */
    private $pointactuel;

    /**
     * @var integer
     *
     * @ORM\Column(name="pointdispo", type="integer")
     */
    private $pointdispo;


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
     * Set pointactuel
     *
     * @param integer $pointactuel
     * @return user
     */
    public function setPointactuel($pointactuel)
    {
        $this->pointactuel = $pointactuel;

        return $this;
    }

    /**
     * Get pointactuel
     *
     * @return integer 
     */
    public function getPointactuel()
    {
        return $this->pointactuel;
    }

    /**
     * Set pointdispo
     *
     * @param integer $pointdispo
     * @return user
     */
    public function setPointdispo($pointdispo)
    {
        $this->pointdispo = $pointdispo;

        return $this;
    }

    /**
     * Get pointdispo
     *
     * @return integer 
     */
    public function getPointdispo()
    {
        return $this->pointdispo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \Event\EventBundle\Entity\user $user
     * @return user
     */
    public function addUser(\Event\EventBundle\Entity\user $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Event\EventBundle\Entity\user $user
     */
    public function removeUser(\Event\EventBundle\Entity\user $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add listparis
     *
     * @param \Event\EventBundle\Entity\pari $listparis
     * @return user
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
     * Set nom
     *
     * @param string $nom
     * @return user
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
}
