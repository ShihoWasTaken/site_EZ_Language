<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EZFunction")
 * @ORM\HasLifecycleCallbacks()
 */
class EZFunction
{

    public function __construct()
    {
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="Name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="French_label", type="text")
     */
    private $french_label;

    /**
     * @ORM\Column(name="English_label", type="text")
     */
    private $english_label;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="EZFunctions")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(name="updatedAt", type="datetime")
     * 
     */
    private $updatedAt;

    /**
    * @ORM\PrePersist
    */
    public function prePersistEvent()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
    * @ORM\PreUpdate
    */
    public function preUpdateEvent()
    {
        $this->updatedAt = new \DateTime();
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
     *
     * @return EZFunction
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
     * Set frenchLabel
     *
     * @param string $frenchLabel
     *
     * @return EZFunction
     */
    public function setFrenchLabel($frenchLabel)
    {
        $this->french_label = $frenchLabel;

        return $this;
    }

    /**
     * Get frenchLabel
     *
     * @return string
     */
    public function getFrenchLabel()
    {
        return $this->french_label;
    }

    /**
     * Set englishLabel
     *
     * @param string $englishLabel
     *
     * @return EZFunction
     */
    public function setEnglishLabel($englishLabel)
    {
        $this->english_label = $englishLabel;

        return $this;
    }

    /**
     * Get englishLabel
     *
     * @return string
     */
    public function getEnglishLabel()
    {
        return $this->english_label;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return EZFunction
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

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return EZFunction
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return EZFunction
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
