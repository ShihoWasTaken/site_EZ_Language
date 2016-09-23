<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="page")
 */
class Page
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
     * @ORM\Column(name="Name", type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(name="French_text", type="text")
     */
    private $french_text;

    /**
     * @ORM\Column(name="English_text", type="text")
     */
    private $english_test;

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
     * @return Page
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
     * Set frenchText
     *
     * @param string $frenchText
     *
     * @return Page
     */
    public function setFrenchText($frenchText)
    {
        $this->french_text = $frenchText;

        return $this;
    }

    /**
     * Get frenchText
     *
     * @return string
     */
    public function getFrenchText()
    {
        return $this->french_text;
    }

    /**
     * Set englishTest
     *
     * @param string $englishTest
     *
     * @return Page
     */
    public function setEnglishTest($englishTest)
    {
        $this->english_test = $englishTest;

        return $this;
    }

    /**
     * Get englishTest
     *
     * @return string
     */
    public function getEnglishTest()
    {
        return $this->english_test;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     *
     * @return Page
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Page
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
