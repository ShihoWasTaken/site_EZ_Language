<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EZFunction")
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
    * @ORM\OneToOne(targetEntity="Category")
    */
    private $category;

    /**
    * @ORM\OneToOne(targetEntity="User")
     */
    private $user;

    /**
     * @ORM\Column(name="LastUpdateDate", type="datetime")
     * */
    private $lastUpdateDate;

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateLastUpdateDate()
    {
        $date = date_create();
        date_timestamp_set($date, time());
        $this->lastUpdateDate = $date;
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
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     *
     * @return EZFunction
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }

    /**
     * Get lastUpdateDate
     *
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
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
