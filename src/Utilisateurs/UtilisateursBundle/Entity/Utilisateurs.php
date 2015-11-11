<?php

namespace Utilisateurs\UtilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $pays;

    /**
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateanniversaire;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pointsdispo;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pointsactuelle = '100';


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="user_image", fileNameProperty="imageName")
     *
     * @var File $imageFile
     *
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255, name="image_name", nullable=true)
     *
     * @var string $imageName
     */
    protected $imageName = 'default.jpg';

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime $updatedAt
     */
    protected $updatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
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
     * Set name
     *
     * @param string $name
     * @return Utilisateurs
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Utilisateurs
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set datefinpari
     *
     * @param \DateTime $datefinpari
     * @return Utilisateurs
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

    /**
     * Set dateanniversaire
     *
     * @param \DateTime $dateanniversaire
     * @return Utilisateurs
     */
    public function setDateanniversaire($dateanniversaire)
    {
        $this->dateanniversaire = $dateanniversaire;

        return $this;
    }

    /**
     * Get dateanniversaire
     *
     * @return \DateTime
     */
    public function getDateanniversaire()
    {
        return $this->dateanniversaire;
    }

    /**
     * Set pointsdispo
     *
     * @param integer $pointsdispo
     * @return Utilisateurs
     */
    public function setPointsdispo($pointsdispo)
    {
        $this->pointsdispo = $pointsdispo;

        return $this;
    }

    /**
     * Get pointsdispo
     *
     * @return integer
     */
    public function getPointsdispo()
    {
        return $this->pointsdispo;
    }

    /**
     * Set pointsactuelle
     *
     * @param integer $pointsactuelle
     * @return Utilisateurs
     */
    public function setPointsactuelle($pointsactuelle)
    {
        $this->pointsactuelle = $pointsactuelle;

        return $this;
    }

    /**
     * Get pointsactuelle
     *
     * @return integer
     */
    public function getPointsactuelle()
    {
        return $this->pointsactuelle;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Utilisateurs
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


}
